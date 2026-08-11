<?php
/**
 * SIETESIETE — endpoint de envío del formulario de contacto.
 * Recibe el POST de contacto.html, valida (honeypot + tiempo de
 * llenado + Cloudflare Turnstile), y envía el correo real a la
 * casilla del estudio vía mail() de PHP.
 */

header('Content-Type: application/json; charset=utf-8');

$destino = 'hola@sietesiete.cl';

// La llave secreta de Turnstile NO se guarda en este archivo (ni en el
// repositorio). Se carga desde config.php, que debes crear en el servidor
// a partir de config.example.php y que está excluido de git.
$turnstileSecret = null;
if (file_exists(__DIR__ . '/config.php')) {
    require __DIR__ . '/config.php'; // debe definir $turnstileSecret
}

function responder($ok, $mensaje) {
    http_response_code($ok ? 200 : 400);
    echo json_encode(['ok' => $ok, 'mensaje' => $mensaje], JSON_UNESCAPED_UNICODE);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    responder(false, 'Método no permitido.');
}

// Honeypot: campo oculto que un visitante real nunca completa.
if (!empty($_POST['website'])) {
    // Simula éxito para no delatar el honeypot a los bots.
    responder(true, 'Mensaje enviado.');
}

// Tiempo mínimo de llenado: los bots suelen enviar el formulario en
// milisegundos. form_ts se fija con JS al cargar la página.
$formTs = (int) ($_POST['form_ts'] ?? 0);
if ($formTs > 0) {
    $elapsedMs = round(microtime(true) * 1000) - $formTs;
    if ($elapsedMs < 3000) {
        // Simula éxito, igual que con el honeypot, para no dar pistas a bots.
        responder(true, 'Mensaje enviado.');
    }
}

// Verificación de Cloudflare Turnstile (server-side, obligatoria).
function verificarTurnstile($token, $secret, $ip) {
    if ($token === '' || $secret === null || $secret === '') {
        return false;
    }
    $datos = [
        'secret'   => $secret,
        'response' => $token,
        'remoteip' => $ip,
    ];
    $respuesta = false;
    if (function_exists('curl_init')) {
        $ch = curl_init('https://challenges.cloudflare.com/turnstile/v0/siteverify');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($datos));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 8);
        $respuesta = curl_exec($ch);
        curl_close($ch);
    } else {
        $contexto = stream_context_create([
            'http' => [
                'method'  => 'POST',
                'header'  => 'Content-Type: application/x-www-form-urlencoded',
                'content' => http_build_query($datos),
                'timeout' => 8,
            ],
        ]);
        $respuesta = @file_get_contents('https://challenges.cloudflare.com/turnstile/v0/siteverify', false, $contexto);
    }
    if ($respuesta === false) {
        return false;
    }
    $json = json_decode($respuesta, true);
    return !empty($json['success']);
}

$turnstileToken = $_POST['cf-turnstile-response'] ?? '';
$ip = $_SERVER['REMOTE_ADDR'] ?? '';

if (!verificarTurnstile($turnstileToken, $turnstileSecret, $ip)) {
    responder(false, 'No pudimos verificar que eres humano. Recarga la página e intenta nuevamente.');
}

// Quita saltos de línea de campos usados en cabeceras del correo,
// para evitar inyección de cabeceras (header injection).
function limpiar_linea($valor) {
    return trim(str_replace(["\r", "\n"], '', (string) $valor));
}

$nombre   = limpiar_linea($_POST['nombre']   ?? '');
$email    = limpiar_linea($_POST['email']    ?? '');
$empresa  = limpiar_linea($_POST['empresa']  ?? '');
$proyecto = limpiar_linea($_POST['proyecto'] ?? '');
$mensaje  = trim($_POST['mensaje'] ?? '');

if ($nombre === '' || $mensaje === '') {
    responder(false, 'Nombre y mensaje son obligatorios.');
}

if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    responder(false, 'Ingresa un email válido.');
}

$asunto = 'Nuevo contacto desde sietesiete.cl — ' . $nombre;

$cuerpo  = "Nuevo mensaje desde el formulario de contacto de sietesiete.cl\n\n";
$cuerpo .= "Nombre: {$nombre}\n";
$cuerpo .= "Email: {$email}\n";
$cuerpo .= "Empresa: " . ($empresa !== '' ? $empresa : '—') . "\n";
$cuerpo .= "Tipo de proyecto: " . ($proyecto !== '' ? $proyecto : '—') . "\n\n";
$cuerpo .= "Mensaje:\n{$mensaje}\n";

$cabeceras   = [];
$cabeceras[] = 'MIME-Version: 1.0';
$cabeceras[] = 'Content-Type: text/plain; charset=UTF-8';
$cabeceras[] = 'From: SIETESIETE Web <no-reply@sietesiete.cl>';
$cabeceras[] = 'Reply-To: ' . $nombre . ' <' . $email . '>';
$cabeceras[] = 'X-Mailer: PHP/' . phpversion();

$enviado = mail($destino, $asunto, $cuerpo, implode("\r\n", $cabeceras));

if ($enviado) {
    responder(true, 'Mensaje enviado.');
} else {
    responder(false, 'No se pudo enviar el mensaje. Intenta nuevamente o escribe directo a ' . $destino . '.');
}
