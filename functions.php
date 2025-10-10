<?php
/**
 * Vibe Antenada - Configurações e Funções do Tema
 */

function vibe_antenada_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    register_nav_menus( array(
        'primary' => esc_html__( 'Menu Principal', 'vibe-antenada' ),
    ) );
}
add_action( 'after_setup_theme', 'vibe_antenada_setup' );

function vibe_antenada_scripts() {
    wp_enqueue_style( 'vibe-antenada-main', get_template_directory_uri() . '/src/css/output.css', array(), '1.0.0' );
    
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css', array(), '5.15.4' );

    wp_enqueue_script( 
        'vibe-antenada-script', 
        get_stylesheet_directory_uri() . '/src/js/main.js',
        array(), 
        '1.0.0', 
        true 
    );
    
    wp_enqueue_style( 'swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.1.4' );
    wp_enqueue_script( 'swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.1.4', true );

    wp_enqueue_script( 
        'vibe-antenada-carousel-script', 
        get_template_directory_uri() . '/src/js/carousel.js', 
        array('jquery', 'swiper-js'),
        '1.0.0', 
        true 
    );

    wp_enqueue_script( 
        'vibe-antenada-script-tabs', 
        get_stylesheet_directory_uri() . '/src/js/tabs.js',
        array(), 
        '1.0.0', 
        true 
    );
}
add_action( 'wp_enqueue_scripts', 'vibe_antenada_scripts' );