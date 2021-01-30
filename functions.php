<?php
/**
 * m-media-snippet-theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package m-media-snippet-theme
 */

if (!function_exists('m_media_snippet_theme_setup')):
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function m_media_snippet_theme_setup()
{
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on m-media-snippet-theme, use a find and replace
         * to change 'm-media-snippet-theme' to the name of your theme in all the template files.
         */
        load_theme_textdomain('m-media-snippet-theme', get_template_directory() . '/languages');

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
            'menu-1' => esc_html__('Primary', 'm-media-snippet-theme'),
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
        // add_theme_support('custom-background', apply_filters('_s_custom_background_args', array(
        //     'default-color' => 'ffffff',
        //     'default-image' => '',
        // )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        // Add support for full and wide align images.
        add_theme_support('align-wide');

        // Add support for a custom color scheme.
        add_theme_support('editor-color-palette', array(
            array(
                'name' => __('Accent', 'm-media-snippet-theme'),
                'slug' => 'accent',
                'color' => '#eb4647',
            ),
            array(
                'name' => __('Secondary', 'm-media-snippet-theme'),
                'slug' => 'secondary',
                'color' => '#246eb9',
            ),
            array(
                'name' => __('Very Light Gray', 'm-media-snippet-theme'),
                'slug' => 'very-light-gray',
                'color' => '#999',
            ),
            array(
                'name' => __('Very Dark Gray', 'm-media-snippet-theme'),
                'slug' => 'very-dark-gray',
                'color' => '#333',
            ),
        ));

        add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');

/* set default theme colors */
        $background_color = 'f9f9f9';
        $text = '#0f0f0f';
        $accent = '#eb4647';
        $secondary = '#246eb9';
        $borders = '#eb4647';

// set_theme_mod('background_color', $background_color);
        // set_theme_mod('cover_template_overlay_background_color', '#' . $background_color);
        set_theme_mod(
            'accent_accessible_colors',
            array(
                'content' => array(
//          'text' => $text,
                    'accent' => $accent,
                    'secondary' => $secondary,
//          'borders' => $borders,
                    //          'background' => '#' . $background_color,
                ),
                'header-footer' => array(
                    'text' => '#fff',
                    'secondary' => '#' . $background_color,
                    'accent' => '#fff',
                    'background' => $secondary,
                ),
            )
        );

        //  Some blocks can provide padding controls in the editor for users
        add_theme_support('custom-spacing');

        // Disable custom font sizes
        add_theme_support('disable-custom-font-sizes');
        // add_theme_support('custom-line-height');

        add_theme_support('custom-units', 'rem', 'em', 'px');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ));

        add_theme_support('editor-font-sizes', array(
            array(
                'name' => esc_attr__('H6', 'm-media-snippet-theme'),
                'size' => 15,
                'slug' => 'small',
            ),
            array(
                'name' => esc_attr__('Regular', 'm-media-snippet-theme'),
                'size' => 19,
                'slug' => 'regular',
            ),
            array(
                'name' => esc_attr__('H5', 'm-media-snippet-theme'),
                'size' => 24,
                'slug' => 'big',
            ),
            array(
                'name' => esc_attr__('H4', 'm-media-snippet-theme'),
                'size' => 30,
                'slug' => 'bigger',
            ),
            array(
                'name' => esc_attr__('H3', 'm-media-snippet-theme'),
                'size' => 36,
                'slug' => 'large',
            ),
            array(
                'name' => esc_attr__('H2', 'm-media-snippet-theme'),
                'size' => 42,
                'slug' => 'larger',
            ),
            array(
                'name' => esc_attr__('H1', 'm-media-snippet-theme'),
                'size' => 50,
                'slug' => 'huge',
            ),
        ));
    }
endif;
add_action('after_setup_theme', 'm_media_snippet_theme_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function m_media_snippet_theme_content_width()
{
    $GLOBALS['content_width'] = apply_filters('m_media_snippet_theme_content_width', 630);
}
add_action('after_setup_theme', 'm_media_snippet_theme_content_width', 0);

/**
 * Register Google Fonts
 */
function m_media_snippet_theme_fonts_url()
{
    $fonts_url = '';

    /*
     *Translators: If there are characters in your language that are not
     * supported by Noto Serif, translate this to 'off'. Do not translate
     * into your own language.
     */
    $roboto = esc_html_x('on', 'Roboto font: on or off', 'm-media-snippet-theme');

    if ('off' !== $roboto) {
        $font_families = array();
        $font_families[] = 'Roboto:400,500,500i,700,900';

        $query_args = array(
            'family' => urlencode(implode('|', $font_families)),
            'subset' => urlencode('latin,latin-ext'),
        );

        $fonts_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css');
    }

    return $fonts_url;

}

/**
 * Enqueue scripts and styles.
 */
function m_media_snippet_theme_scripts()
{
    wp_enqueue_style('snippetbase-style', get_stylesheet_uri());

    wp_enqueue_style('m-media-snippet-themeblocks-style', get_template_directory_uri() . '/css/blocks.css');

    wp_enqueue_style('m-media-snippet-snippet-css', get_template_directory_uri() . '/css/snippet.css');

    wp_enqueue_style('m-media-snippet-theme-fonts', m_media_snippet_theme_fonts_url());

    wp_enqueue_script('m-media-snippet-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);

    wp_enqueue_script('m-media-snippet-theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'm_media_snippet_theme_scripts');

/**
 * Remove default WooCommerce styles
 */
add_filter('woocommerce_enqueue_styles', 'jk_dequeue_styles');
function jk_dequeue_styles($enqueue_styles)
{
    unset($enqueue_styles['woocommerce-general']); // Remove the gloss
    // unset($enqueue_styles['woocommerce-layout']); // Remove the layout
    // unset($enqueue_styles['woocommerce-smallscreen']); // Remove the smallscreen optimisation
    return $enqueue_styles;
}

remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_before_main_content', 'm_media_snippet_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'm_media_snippet_theme_wrapper_end', 10);

function m_media_snippet_theme_wrapper_start()
{
    echo '<main id="main" class="site-main container" role="main">';
}

function m_media_snippet_theme_wrapper_end()
{
    echo '</main>';
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Theme Settings
 */
require get_template_directory() . '/inc/theme-options.php';
