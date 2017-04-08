<?php
/**
 * gh-test functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gh-test
 */

if (!function_exists('gh_test_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function gh_test_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on gh-test, use a find and replace
         * to change 'gh-test' to the name of your theme in all the template files.
         */
        load_theme_textdomain('gh-test', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'gh-test'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('gh_test_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');
    }
endif;
add_action('after_setup_theme', 'gh_test_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gh_test_content_width()
{
    $GLOBALS['content_width'] = apply_filters('gh_test_content_width', 640);
}

add_action('after_setup_theme', 'gh_test_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gh_test_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'gh-test'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'gh-test'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'gh_test_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function site_resources()
{
    wp_enqueue_style('owl.carousel.min', get_stylesheet_directory_uri() . '/css/owl.carousel.min.css');
    wp_enqueue_style('owl.theme.default.min', get_stylesheet_directory_uri() . '/css/owl.theme.default.min.css');
    wp_enqueue_style('main', get_stylesheet_directory_uri() . '/css/main.css');
    wp_enqueue_script('main', get_stylesheet_directory_uri() . '/js/main.js');
    wp_register_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.1', true);
    wp_enqueue_script('main');
    wp_register_script('owl.carousel.min', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '1.1', true);
    wp_enqueue_script('owl.carousel.min');
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js');
    wp_enqueue_script('jquery');
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-2.2.4.min.js');
    wp_enqueue_script('jquery');
    wp_register_script('jquery', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');
    wp_enqueue_script('jquery');
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900');
    wp_enqueue_script('jquery3', 'http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', NULL, 1.0);
    wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', NULL, 1.0);


}

add_action('wp_enqueue_scripts', 'site_resources');

function gh_test_scripts()
{
    wp_enqueue_style('gh-test-style', get_stylesheet_uri());

    wp_enqueue_script('gh-test-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);

    wp_enqueue_script('gh-test-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'gh_test_scripts');


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/* Theme setup */
add_action('after_setup_theme', 'wpt_setup');
if (!function_exists('wpt_setup')):
    function wpt_setup()
    {
        register_nav_menu('primary', __('Primary navigation', 'wptuts'));
    } endif;

function wpt_register_js()
{
    wp_register_script('jquery.bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery');
    wp_enqueue_script('jquery.bootstrap.min');
}

add_action('init', 'wpt_register_js');
function wpt_register_css()
{
    wp_register_style('bootstrap.min', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap.min');
}

add_action('wp_enqueue_scripts', 'wpt_register_css');

// Register custom navigation walker
require_once('wp_bootstrap_navwalker.php');

//Custom logo
add_theme_support('custom-logo');

function ajy_setup()
{

    add_theme_support('custom-logo', array(
        'height' => 100,
        'width' => 400,
        'flex-width' => true,
    ));

}

add_action('after_setup_theme', 'ajy_setup');


function ajy_the_custom_logo()
{

    if (function_exists('the_custom_logo')) {
        the_custom_logo();
    }

}


function htgh_customize_register($wp_customize)
{


//Advanced Options

    $wp_customize->add_section(
        'advanced_options',
        array(
            'title' => 'Advanced Options',
            'priority' => 1
        )
    );

//Header background

    $wp_customize->add_setting('contact_bg');
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize, 'contact_bg', array(
                'label' => 'Contact Us Background Image',
                'section' => 'advanced_options',
                'settings' => 'contact_bg',
                'priority' => 1
            )
        )
    );

//"Home" Link

    $wp_customize->add_setting('home-link', array(
        'default' => '#',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'home-link', array(
        'label' => __('Home link', 'Ajy'),
        'section' => 'advanced_options',
        'settings' => 'home-link',

    )));

/// Contact us background

    $wp_customize->add_setting('contact_bg');
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize, 'contact_bg', array(
                'label' => 'Contact Us Background Image',
                'section' => 'advanced_options',
                'settings' => 'contact_bg',
                'priority' => 4
            )
        )
    );

    //Slider customization

    //Slider

    $wp_customize->add_section('site_slider', array(
        'title' => __('Slider content', 'Ajy'),
        'priority' => 3,
    ));

    $wp_customize->add_setting('site_slider_item1_image', array(
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'site_slider_item1_image', array(
        'label' => __('Slide #1 Image', 'Ajy'),
        'section' => 'site_slider',
        'settings' => 'site_slider_item1_image',

    )));

    $wp_customize->add_setting('site_slider_item2_image', array(
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'site_slider_item2_image', array(
        'label' => __('Slide #2 Image', 'Ajy'),
        'section' => 'site_slider',
        'settings' => 'site_slider_item2_image',

    )));

    $wp_customize->add_setting('site_slider_item3_image', array(
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'site_slider_item3_image', array(
        'label' => __('Slide #3 Image', 'Ajy'),
        'section' => 'site_slider',
        'settings' => 'site_slider_item3_image',

    )));

    $wp_customize->add_setting('site_slider_item4_image', array(
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'site_slider_item4_image', array(
        'label' => __('Slide #4 Image', 'Ajy'),
        'section' => 'site_slider',
        'settings' => 'site_slider_item4_image',

    )));

    // IMG for section "Why Us"

    $wp_customize->add_section('why-us', array(
        'title' => __('"Why Us" Section', 'Ajy'),
        'priority' => 4,
    ));

    $wp_customize->add_setting('why_image', array(
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'why_image', array(
        'label' => __('Section Image', 'Ajy'),
        'section' => 'why-us',
        'settings' => 'why_image',

    )));

    //IMG for section "Welcome"

    $wp_customize->add_section('welcome', array(
        'title' => __('"Welcome here" Section ', 'Ajy'),
        'priority' => 4,
    ));

    $wp_customize->add_setting('welcome_image', array(
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'welcome_image', array(
        'label' => __('Section Image', 'Ajy'),
        'section' => 'welcome',
        'settings' => 'welcome_image',

    )));

    //Carousel

    $wp_customize->add_section('slider', array(
        'title' => __('"Welcome here" Section ', 'Ajy'),
        'priority' => 4,
    ));

    $wp_customize->add_setting('welcome_image', array(
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'welcome_image', array(
        'label' => __('Section Image', 'Ajy'),
        'section' => 'welcome',
        'settings' => 'welcome_image',

    )));

    //Contact us

    $wp_customize->add_section(
        'contact_us',
        array(
            'title' => '"Contact Us" Section',
            'priority' => 6
        )
    );

    $wp_customize->add_setting('phone', array(
        'default' => '#',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'phone', array(
        'label' => __('Phone Number', 'Ajy'),
        'section' => 'contact_us',
        'settings' => 'phone',

    )));

    $wp_customize->add_setting('location', array(
        'default' => '#',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'location', array(
        'label' => __('Location', 'Ajy'),
        'section' => 'contact_us',
        'settings' => 'location',

    )));

}

add_action('customize_register', 'htgh_customize_register');

add_action( 'init', 'create_post_type' );
function create_post_type() {
    register_post_type( 'offers',
        array(
            'labels' => array(
                'name' => __( 'Offers' ),
                'singular_name' => __( 'Offer' )
            ),
            'public' => true,
            'has_archive' => false,
        )
    );

    register_post_type( 'works',
        array(
            'labels' => array(
                'name' => __( 'Works' ),
                'singular_name' => __( 'Work' )
            ),
            'public' => true,
            'has_archive' => true,
        )
    );

    register_post_type( 'contact',
        array(
            'labels' => array(
                'name' => __( 'Contact form' ),
                'singular_name' => __( 'Contact Form' )
            ),
            'public' => true,
            'has_archive' => false,
        )
    );
}

