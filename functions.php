<?php

if (! function_exists('herobiz_setup')) {
    /**
     * Sets up theme defaults and registers support for various Wordpress features.
     * 
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails
     */
    function herobiz_setup() {
        /**
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Crafty Press, use a find and replace
         * to change 'herobiz' to the name of your theme in all the template files.
         */
        load_theme_textdomain('herobiz', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /**
         * Let Wordpress manage the document title.
         * By adding theme support, we declare that this theme does not use
         * a hard-coded HTML <title> tag in the document head, and expect Wordpress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /**
         * Enable support for Post Thumbnails on posts and pages.
         * 
         * @Link https://developer.wordpress.org/theme/functionality/featured-images-post-thumbnails
         */
        add_theme_support('post-thumbnails');

        // Setup the Wordpress core custom background features - The background color for the entire website.
        add_theme_support('custom-background', apply_filters('herobiz_custom_background_args', [
            'default-color' => 'ffffff',
            'default-image' => '',
        ]));

        /**
         * Switch default core markup for search form, comment form and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ]);

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');
        
        /**
         * Add support for core custom logo.
         */
        add_theme_support('custom-logo', [
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ]);

        /**
         * Add support for Custom Page Header.
         */
        add_theme_support('custom-header', [
            'flex-width' => true,
            'width' => 1600,
            'flex-height' => true,
            'height' => 450,
            'default-image'
        ]);

        /**
         * Add Post Type Support
         */
        add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

        register_nav_menus([
            'primary' => esc_html__('Primary Menu', 'herobiz'),
            'footer' => esc_html__('Footer Menu', 'herobiz'),
            'header_action' => esc_html__('Header Action Menu', 'herobiz'),
        ]);

        // Disable admin bar shown on top of side when in development
        add_filter('show_admin_bar', '__return_false');
    }
}
add_action('after_setup_theme', 'herobiz_setup');

if (! function_exists('herobiz_content_width')) {
    /**
     * Set the content width in pixels, based on the theme's design and stylesheets.
     * 
     * Priority 0 to make it available to lower priority callbacks.
     * 
     * @global int $content_width
     */
    function herobiz_content_width() {
        // This variable is intentd to be overruled from themes.
        // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
        // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
        $GLOBALS['content_width'] = apply_filters('herobiz_content_width', 1170);
    }
}
add_action('after_setup_theme', 'herobiz_content_width', 0);

if (! function_exists('herobiz_sidebar_widgets_init')) {
    /**
     * Register Sidebar widget area
     * This will enable widget block editor in the WP admin under Appearance
     * 
     * @since 1.0.0
     */
    function herobiz_sidebar_widgets_init() {
        // Default Sidebar
        register_sidebar([
            'name' => esc_html__('Sidebar', 'herobiz'),
            'id' => 'default-sidebar',
            'description' => esc_html__('Add widgets here.', 'herobiz'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>',
        ]);
    }
}
add_action('widgets_init', 'herobiz_sidebar_widgets_init');

if (! function_exists('herobiz_public_scripts')) {
    /**
     * Enqueue public scripts and styles
     */
    function herobiz_public_scripts() {
        wp_enqueue_style('bootstrap', get_theme_file_uri('/assets/vendor/bootstrap/css/bootstrap.min.css'), [], wp_rand(), 'all');
        wp_enqueue_style('bootstrap-icon', get_theme_file_uri('/assets/vendor/bootstrap-icons/bootstrap-icons.css'), [], wp_rand(), 'all');
        wp_enqueue_style('aos', get_theme_file_uri('/assets/vendor/aos/aos.css'), [], wp_rand(), 'all');
        wp_enqueue_style('glightbox', get_theme_file_uri('/assets/vendor/glightbox/css/glightbox.min.css'), [], wp_rand(), 'all');
        wp_enqueue_style('swiper', get_theme_file_uri('/assets/vendor/swiper/swiper-bundle.min.css'), [], wp_rand(), 'all');

        wp_enqueue_style('variable', get_theme_file_uri('/assets/css/variables.css'), [], wp_rand(), 'all');
        wp_enqueue_style('main', get_theme_file_uri('/assets/css/main.css'), [], wp_rand(), 'all');

        // scripts
        wp_enqueue_script('bootstrap', get_theme_file_uri('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js'), ['jquery'], wp_rand(), true);
        wp_enqueue_script('aos', get_theme_file_uri('/assets/vendor/aos/aos.js'), ['jquery'], wp_rand(), true);
        wp_enqueue_script('glightbox', get_theme_file_uri('assets/vendor/glightbox/js/glightbox.min.js'), ['jquery'], wp_rand(), true);
        wp_enqueue_script('isotope', get_theme_file_uri('/assets/vendor/isotope-layout/isotope.pkgd.min.js"'), ['jquery'], wp_rand(), true);
        wp_enqueue_script('swiper', get_theme_file_uri('/assets/vendor/swiper/swiper-bundle.min.js'), ['jquery'], wp_rand(), true);
        wp_enqueue_script('validate', get_theme_file_uri('/assets/vendor/php-email-form/validate.js'), ['jquery'], wp_rand(), true);

        wp_enqueue_script('main', get_theme_file_uri('/assets/js/main.js'), ['jquery'], wp_rand(), true);
    }
}
add_action('wp_enqueue_scripts', 'herobiz_public_scripts');

if (! function_exists('herobiz_admin_scripts')) {
    /**
     * Enqueue admin scripts and styles
     */
    function herobiz_admin_scripts() {

    }
}
add_action('admin_enqueue_scripts', 'herobiz_admin_scripts');
