<?php
/* Theme Setup */
if ( ! function_exists( 'carolinaspa_theme_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which runs
     * before the init hook. The init hook is too late for some features, such as indicating
     * support post thumbnails.
     */
    function carolinaspa_theme_setup() {
     
        /**
         * Make theme available for translation.
         * Translations can be placed in the /languages/ directory.
         */
        load_theme_textdomain( 'carolinaspa_theme_setup', get_template_directory() . '/languages' );
     
        /**
         * Enable support for post thumbnails and featured images.
         */
        add_theme_support( 'post-thumbnails' );
     
        /**
         * Add support for two custom navigation menus.
         */
        register_nav_menus( array(
            'primary'   => __( 'Primary Menu', 'carolinaspa' ),
            'secondary' => __('Secondary Menu', 'carolinaspa' )
        ) );
     
        /**
         * Enable support for the following post formats:
         * aside, gallery, quote, image, and video
         */
        add_theme_support( 'post-formats', array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );
    }
endif; // carolinaspa_theme_setup
add_action( 'after_setup_theme', 'carolinaspa_theme_setup' );

/**
 * Proper way to enqueue scripts and styles
 */
function carolinaspa_theme_scripts() {
    /* Styles */
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', false, '4.5.0');
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', false, '4.7.0');
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Italianno&family=Lato:wght@400;700;900&family=Raleway:wght@400;700;900&display=swap', array(), '1.0' );
    wp_enqueue_style('style', get_stylesheet_uri(), array('bootstrap-css','font-awesome') );

    /* Scripts */
    wp_enqueue_script('jquery');
    wp_enqueue_script('popper', get_template_directory_uri() . '/js/popper.min.js', array('jquery'), '2.4.0', true);
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('popper'), '4.5.3', true);
    wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array(''), '1.0', true);
}
add_action( 'wp_enqueue_scripts', 'carolinaspa_theme_scripts' );