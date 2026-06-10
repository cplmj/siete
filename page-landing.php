<?php
/*
Template Name: Landing sietesiete
*/
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>sietesiete — dirección de arte &amp; branding</title>
<?php wp_head(); ?>
</head>
<body class="ss-landing">

<!-- ============================================================
     NAVBAR
============================================================ -->
<nav class="ss-nav" id="ss-nav" aria-label="Navegación principal">
  <div class="ss-nav__inner">
    <a href="#hero" class="ss-nav__logo" aria-label="sietesiete — inicio">sietesiete</a>
    <button class="ss-nav__burger" id="ss-burger" aria-label="Abrir menú" aria-expanded="false" aria-controls="ss-nav-menu">
      <span></span><span></span>
    </button>
    <ul class="ss-nav__links" id="ss-nav-menu" role="list">
      <li><a href="#servicios">Servicios</a></li>
      <li><a href="#portafolio">Portafolio</a></li>
      <li><a href="#proceso">Proceso</a></li>
      <li><a href="#sobre-mi">Sobre mí</a></li>
    </ul>
    <a href="#contacto" class="ss-btn ss-btn--cta">Hablemos</a>
  </div>
</nav>

<!-- ============================================================
     HERO
============================================================ -->
<section class="ss-hero" id="hero" aria-labelledby="hero-headline">
  <div class="ss-hero__bg-grid" aria-hidden="true"></div>
  <div class="ss-hero__inner">
    <div class="ss-hero__eyebrow">
      <span class="ss-hero__line" aria-hidden="true"></span>
      <span>Estudio de branding</span>
    </div>
    <h1 class="ss-hero__headline" id="hero-headline">
      <span class="ss-hero__headline-main">La marca que<br>mereces existir.</span>
      <span class="ss-hero__accent-dot" aria-hidden="true">·</span>
    </h1>
    <p class="ss-hero__sub">
      Dirección de arte y diseño gráfico con criterio propio.<br>
      Branding para pymes, personas y empresas que quieren diferenciarse de verdad.
    </p>
    <div class="ss-hero__actions">
      <a href="#portafolio" class="ss-btn ss-btn--primary">Ver portafolio</a>
      <a href="#contacto" class="ss-btn ss-btn--ghost">Trabajemos juntos</a>
    </div>
    <div class="ss-hero__scroll-hint" aria-hidden="true">
      <span class="ss-hero__scroll-line"></span>
      <span class="ss-hero__scroll-label">scroll</span>
    </div>
  </div>
  <div class="ss-hero__marquee" aria-hidden="true">
    <div class="ss-hero__marquee-track">
      <span>BRANDING</span><span aria-hidden="true">—</span>
      <span>IDENTIDAD VISUAL</span><span aria-hidden="true">—</span>
      <span>NAMING</span><span aria-hidden="true">—</span>
      <span>DIRECCIÓN DE ARTE</span><span aria-hidden="true">—</span>
      <span>BRANDING</span><span aria-hidden="true">—</span>
      <span>IDENTIDAD VISUAL</span><span aria-hidden="true">—</span>
      <span>NAMING</span><span aria-hidden="true">—</span>
      <span>DIRECCIÓN DE ARTE</span><span aria-hidden="true">—</span>
    </div>
  </div>
</section>

<!-- ============================================================
     SERVICIOS
============================================================ -->
<section class="ss-servicios" id="servicios" aria-labelledby="servicios-title">
  <div class="ss-container">
    <header class="ss-section-header">
      <span class="ss-section-num" aria-hidden="true">01</span>
      <h2 class="ss-section-title" id="servicios-title">Servicios</h2>
    </header>

    <div class="ss-servicios__grid">

      <article class="ss-servicio" data-index="01">
        <div class="ss-servicio__num" aria-hidden="true">01</div>
        <h3 class="ss-servicio__title">Branding desde cero</h3>
        <p class="ss-servicio__desc">
          Construcción completa de marca para nuevos proyectos o empresas que necesitan
          reinventarse. Estrategia, concepto, sistema visual, tono de voz.
        </p>
        <div class="ss-servicio__tag">Fundacional</div>
      </article>

      <article class="ss-servicio" data-index="02">
        <div class="ss-servicio__num" aria-hidden="true">02</div>
        <h3 class="ss-servicio__title">Identidad visual</h3>
        <p class="ss-servicio__desc">
          Logotipo, paleta, tipografía, iconografía, fotografía y todos los elementos
          que hacen coherente una marca en cada punto de contacto.
        </p>
        <div class="ss-servicio__tag">Sistema</div>
      </article>

      <article class="ss-servicio" data-index="03">
        <div class="ss-servicio__num" aria-hidden="true">03</div>
        <h3 class="ss-servicio__title">Naming</h3>
        <p class="ss-servicio__desc">
          Creación del nombre de marca con criterio estratégico y estético.
          Un nombre que sea distintivo, pronunciable y registrable.
        </p>
        <div class="ss-servicio__tag">Estrategia</div>
      </article>

      <article class="ss-servicio" data-index="04">
        <div class="ss-servicio__num" aria-hidden="true">04</div>
        <h3 class="ss-servicio__title">Aplicaciones de marca</h3>
        <p class="ss-servicio__desc">
          Papelería, packaging, señalética, piezas digitales, redes sociales.
          La identidad llevada a todos los formatos que necesitas.
        </p>
        <div class="ss-servicio__tag">Producción</div>
      </article>

    </div>
  </div>
</section>

<!-- ============================================================
     PORTAFOLIO
============================================================ -->
<section class="ss-portafolio" id="portafolio" aria-labelledby="portafolio-title">
  <div class="ss-container">
    <header class="ss-section-header ss-section-header--light">
      <span class="ss-section-num" aria-hidden="true">02</span>
      <h2 class="ss-section-title" id="portafolio-title">Portafolio</h2>
    </header>

    <div class="ss-portafolio__grid">

      <article class="ss-proyecto ss-proyecto--wide" tabindex="0" aria-label="Proyecto Marca Fuerte">
        <div class="ss-proyecto__img" role="img" aria-label="Imagen del proyecto Marca Fuerte"></div>
        <div class="ss-proyecto__info">
          <span class="ss-proyecto__cat">Branding</span>
          <h3 class="ss-proyecto__title">Marca Fuerte</h3>
        </div>
      </article>

      <article class="ss-proyecto" tabindex="0" aria-label="Proyecto Concepto Puro">
        <div class="ss-proyecto__img" role="img" aria-label="Imagen del proyecto Concepto Puro"></div>
        <div class="ss-proyecto__info">
          <span class="ss-proyecto__cat">Identidad visual</span>
          <h3 class="ss-proyecto__title">Concepto Puro</h3>
        </div>
      </article>

      <article class="ss-proyecto" tabindex="0" aria-label="Proyecto Nombre Propio">
        <div class="ss-proyecto__img" role="img" aria-label="Imagen del proyecto Nombre Propio"></div>
        <div class="ss-proyecto__info">
          <span class="ss-proyecto__cat">Naming</span>
          <h3 class="ss-proyecto__title">Nombre Propio</h3>
        </div>
      </article>

      <article class="ss-proyecto ss-proyecto--tall" tabindex="0" aria-label="Proyecto Sistema Completo">
        <div class="ss-proyecto__img" role="img" aria-label="Imagen del proyecto Sistema Completo"></div>
        <div class="ss-proyecto__info">
          <span class="ss-proyecto__cat">Sistema</span>
          <h3 class="ss-proyecto__title">Sistema Completo</h3>
        </div>
      </article>

      <article class="ss-proyecto" tabindex="0" aria-label="Proyecto Aplicaciones">
        <div class="ss-proyecto__img" role="img" aria-label="Imagen del proyecto Aplicaciones de marca"></div>
        <div class="ss-proyecto__info">
          <span class="ss-proyecto__cat">Aplicaciones</span>
          <h3 class="ss-proyecto__title">Aplicaciones</h3>
        </div>
      </article>

    </div>

    <div class="ss-portafolio__footer">
      <a href="#contacto" class="ss-btn ss-btn--outline">¿Hablamos de tu proyecto?</a>
    </div>
  </div>
</section>

<!-- ============================================================
     PROCESO
============================================================ -->
<section class="ss-proceso" id="proceso" aria-labelledby="proceso-title">
  <div class="ss-container">
    <header class="ss-section-header">
      <span class="ss-section-num" aria-hidden="true">03</span>
      <h2 class="ss-section-title" id="proceso-title">Proceso</h2>
    </header>

    <div class="ss-proceso__steps">

      <div class="ss-paso" data-step="1">
        <div class="ss-paso__connector" aria-hidden="true"></div>
        <div class="ss-paso__num" aria-hidden="true">01</div>
        <div class="ss-paso__body">
          <h3 class="ss-paso__title">Descubrimiento</h3>
          <p class="ss-paso__desc">
            Escucho, pregunto y analizo. Entender tu negocio, tu público y tu contexto
            competitivo es la única forma de crear algo relevante.
          </p>
        </div>
      </div>

      <div class="ss-paso" data-step="2">
        <div class="ss-paso__connector" aria-hidden="true"></div>
        <div class="ss-paso__num" aria-hidden="true">02</div>
        <div class="ss-paso__body">
          <h3 class="ss-paso__title">Concepto</h3>
          <p class="ss-paso__desc">
            Construyo el territorio de marca: qué dice, cómo lo dice y cómo se ve.
            Una dirección estratégica antes de dibujar una sola línea.
          </p>
        </div>
      </div>

      <div class="ss-paso" data-step="3">
        <div class="ss-paso__connector" aria-hidden="true"></div>
        <div class="ss-paso__num" aria-hidden="true">03</div>
        <div class="ss-paso__body">
          <h3 class="ss-paso__title">Desarrollo</h3>
          <p class="ss-paso__desc">
            Diseño el sistema visual completo con iteraciones y feedback estructurado.
            Cada decisión tiene un por qué.
          </p>
        </div>
      </div>

      <div class="ss-paso" data-step="4">
        <div class="ss-paso__num" aria-hidden="true">04</div>
        <div class="ss-paso__body">
          <h3 class="ss-paso__title">Entrega</h3>
          <p class="ss-paso__desc">
            Manual de marca completo, archivos maestros y todo lo que necesitas
            para usar tu identidad con autonomía.
          </p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ============================================================
     SOBRE MÍ
============================================================ -->
<section class="ss-sobre" id="sobre-mi" aria-labelledby="sobre-title">
  <div class="ss-container">
    <div class="ss-sobre__layout">

      <div class="ss-sobre__img-wrap">
        <div class="ss-sobre__img" role="img" aria-label="Foto de perfil"></div>
        <div class="ss-sobre__img-frame" aria-hidden="true"></div>
      </div>

      <div class="ss-sobre__text">
        <header class="ss-section-header">
          <span class="ss-section-num" aria-hidden="true">04</span>
          <h2 class="ss-section-title" id="sobre-title">Sobre mí</h2>
        </header>
        <p class="ss-sobre__bio">
          Soy diseñador gráfico y director de arte especializado en branding. Llevo más
          de una década construyendo marcas con criterio propio: no sigo modas, construyo
          sistemas visuales que perduran.
        </p>
        <p class="ss-sobre__bio">
          He trabajado con pymes, personas naturales y grandes empresas en distintos
          sectores. Cada proyecto es una oportunidad de hacer algo honesto y relevante.
        </p>
        <div class="ss-sobre__stats">
          <div class="ss-stat">
            <span class="ss-stat__num">+80</span>
            <span class="ss-stat__label">marcas creadas</span>
          </div>
          <div class="ss-stat">
            <span class="ss-stat__num">10+</span>
            <span class="ss-stat__label">años de experiencia</span>
          </div>
          <div class="ss-stat">
            <span class="ss-stat__num">3</span>
            <span class="ss-stat__label">países</span>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ============================================================
     CONTACTO
============================================================ -->
<section class="ss-contacto" id="contacto" aria-labelledby="contacto-title">
  <div class="ss-container">
    <div class="ss-contacto__layout">

      <div class="ss-contacto__intro">
        <header class="ss-section-header">
          <span class="ss-section-num" aria-hidden="true">05</span>
          <h2 class="ss-section-title" id="contacto-title">Hablemos</h2>
        </header>
        <p class="ss-contacto__desc">
          Si tienes un proyecto en mente o quieres mejorar tu marca actual,
          cuéntame. Respondo en menos de 24 horas.
        </p>
        <div class="ss-contacto__social">
          <a href="#" class="ss-social-link" aria-label="Instagram de sietesiete">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg>
            Instagram
          </a>
          <a href="#" class="ss-social-link" aria-label="Behance de sietesiete">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M2 6h8c2 0 4 1 4 3s-2 3-4 3H2V6z"/><path d="M2 12h9c2.5 0 5 1.2 5 3.5S13.5 19 11 19H2v-7z"/><path d="M16 8h6M17 11.5c0-2.5 2-4 4-3.5"/></svg>
            Behance
          </a>
          <a href="#" class="ss-social-link" aria-label="LinkedIn de sietesiete">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="3"/><path d="M7 10v7M7 7v.01M11 10v7M11 13c0-1.7 1.3-3 3-3s3 1.3 3 3v4"/></svg>
            LinkedIn
          </a>
        </div>
      </div>

      <form class="ss-form" id="ss-contact-form" novalidate aria-label="Formulario de contacto">
        <div class="ss-form__field">
          <label for="ss-nombre" class="ss-form__label">Nombre <span aria-label="requerido">*</span></label>
          <input type="text" id="ss-nombre" name="nombre" class="ss-form__input" required autocomplete="name" placeholder="Tu nombre">
          <span class="ss-form__error" id="ss-nombre-error" role="alert" aria-live="polite"></span>
        </div>
        <div class="ss-form__field">
          <label for="ss-empresa" class="ss-form__label">Empresa / Proyecto</label>
          <input type="text" id="ss-empresa" name="empresa" class="ss-form__input" autocomplete="organization" placeholder="Nombre de tu empresa o proyecto">
        </div>
        <div class="ss-form__field">
          <label for="ss-mensaje" class="ss-form__label">Mensaje <span aria-label="requerido">*</span></label>
          <textarea id="ss-mensaje" name="mensaje" class="ss-form__textarea" required rows="5" placeholder="Cuéntame sobre tu proyecto"></textarea>
          <span class="ss-form__error" id="ss-mensaje-error" role="alert" aria-live="polite"></span>
        </div>
        <button type="submit" class="ss-btn ss-btn--primary ss-btn--full" id="ss-submit">
          <span class="ss-btn__label">Enviar mensaje</span>
          <span class="ss-btn__loader" aria-hidden="true"></span>
        </button>
        <p class="ss-form__success" id="ss-form-success" aria-live="polite" role="status"></p>
      </form>

    </div>
  </div>
</section>

<!-- ============================================================
     FOOTER
============================================================ -->
<footer class="ss-footer" role="contentinfo">
  <div class="ss-container">
    <div class="ss-footer__inner">
      <span class="ss-footer__logo">sietesiete</span>
      <span class="ss-footer__copy">© 2025</span>
      <a href="#hero" class="ss-footer__back" aria-label="Volver al inicio">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M12 19V5M5 12l7-7 7 7"/></svg>
      </a>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
