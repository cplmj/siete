<?php
/**
 * Snippet para functions.php
 * Encola landing.css y landing.js SOLO en la plantilla "Landing sietesiete".
 * Añadir dentro del archivo functions.php del tema activo (o tema hijo).
 */
function sietesiete_landing_assets() {
    if ( ! is_page_template( 'page-landing.php' ) ) {
        return;
    }

    wp_enqueue_style(
        'ss-landing-css',
        get_template_directory_uri() . '/landing.css',
        [],
        '1.0.0'
    );

    wp_enqueue_script(
        'ss-landing-js',
        get_template_directory_uri() . '/landing.js',
        [],
        '1.0.0',
        true   // cargar en footer
    );
}
add_action( 'wp_enqueue_scripts', 'sietesiete_landing_assets' );
