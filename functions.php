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
         * Enable SEO support
        */
        add_theme_support('title-tag');
     
        /**
         * Add support for two custom navigation menus.
         */
        register_nav_menus( array(
            'primary'   => __( 'Primary Menu', 'carolinaspa' ),
            'social_media' => __('Social Media Menu', 'carolinaspa' )
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
    wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0', true);
}
add_action( 'wp_enqueue_scripts', 'carolinaspa_theme_scripts' );

/* 
 * Set bootstrap class nav-item to <li> of the primary menu,
 * you can find the name of the menu in register_nav_menus() located 
 * in add_action('after_setup_theme',$theme_name_function)
 * more info in https://developer.wordpress.org/reference/hooks/nav_menu_css_class/
 */
function carolinaspa_li_class($classes, $item, $args){
    if($args->theme_location == 'primary'){
        $classes[] = 'nav-item';
    }
    return $classes;
}
add_filter('nav_menu_css_class','carolinaspa_li_class', 1, 3);

/**  
 * Set bootstrap class nav-link to <a> of the primary menu,
 * you can find the name of the menu in register_nav_menus() located 
 * in add_action('after_setup_theme',$theme_name_function)
 * more info in https://developer.wordpress.org/reference/hooks/nav_menu_link_attributes/
 */
function carolinaspa_a_class($atts, $item, $args){
    if($args->theme_location == 'primary'){
        $atts['class'] = 'nav-link';
    }
    return $atts;
}
add_filter('nav_menu_link_attributes','carolinaspa_a_class', 10, 3);

/** Widgets Zone
 *  
 * In this section we are going to setup the widgets support to our theme
 * more info in -> https://developer.wordpress.org/reference/hooks/widgets_init/ 
 * 
 */
function carolinaspa_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Footer Widget 1', 'carolinaspa' ),
        'id'            => 'carolinaspa-footer-widget-1',
        'description'   => __( 'Aquí podrás ingresar información general de la empresa, bien puede ser una dirección o hablar acerca de la empresa, por ejemplo', 'carolinaspa' ),
        'before_widget' => '<div id="%1$s">', /* This line is created to wrap widgets with a singular and dinamyc id */
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="text-uppercase text-center pb-4">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer Widget 2', 'carolinaspa' ),
        'id'            => 'carolinaspa-footer-widget-2',
        'description'   => __( 'Aquí podrás ingresar información general de la empresa, bien puede ser una dirección o hablar acerca de la empresa, por ejemplo', 'carolinaspa' ),
        'before_widget' => '<div id="%1$s">', /* This line is created to wrap widgets with a singular and dinamyc id */
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="text-uppercase text-center pb-4">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer Widget 3', 'carolinaspa' ),
        'id'            => 'carolinaspa-footer-widget-3',
        'description'   => __( 'Aquí podrás ingresar información general de la empresa, bien puede ser una dirección o hablar acerca de la empresa, por ejemplo', 'carolinaspa' ),
        'before_widget' => '<div id="%1$s">', /* This line is created to wrap widgets with a singular and dinamyc id */
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="text-uppercase text-center pb-4">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'carolinaspa_widgets_init' );