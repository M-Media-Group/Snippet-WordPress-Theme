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
        $font_families[] = 'Roboto:300,400,500,500i,700,900';

        $query_args = array(
            'family' => urlencode(implode('|', $font_families)),
            'subset' => urlencode('latin,latin-ext'),
            'display' => 'swap',
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

    wp_enqueue_script('m-media-snippet-theme-unblur-header', get_template_directory_uri() . '/js/unblur-header.js', array(), '20151215', true);

    wp_enqueue_script('m-media-snippet-theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'm_media_snippet_theme_scripts');

/**
 * Remove default WooCommerce styles
 */
add_filter('woocommerce_enqueue_styles', 'm_media_snippet_theme_dequeue_styles');
function m_media_snippet_theme_dequeue_styles($enqueue_styles)
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

function m_media_snippet_theme_filter_nav_menu($menu, $args)
{
    if (is_page_template('page_full-screen.php')) {
        $menu = null;
    }

    return $menu;
}
add_filter('wp_nav_menu', 'm_media_snippet_theme_filter_nav_menu', 10, 2);

/**
 * Add "… Continued" to the excerpt
 */
add_filter('excerpt_more', function () {
    return '&hellip; <a href="' . get_permalink() . '">' . __('continue reading', 'm-media-snippet-theme') . '</a>';
});

// Exclude pingbacks from comment count
function m_media_snippet_theme_comment_count($count)
{
    global $id;
    $comment_count = 0;
    $comments = get_approved_comments($id);
    foreach ($comments as $comment) {
        if ($comment->comment_type === 'comment') {
            $comment_count++;
        }
    }
    return $comment_count;
}
add_filter('get_comments_number', 'm_media_snippet_theme_comment_count', 0);

function m_media_snippet_theme_import_files()
{
    return array(
        array(
            'import_file_name' => 'Simple Demo',
            // 'categories' => array('Category 1', 'Category 2'),
            'import_file_url' => 'http://www.your_domain.com/ocdi/demo-content.xml',
            // 'import_widget_file_url' => 'http://www.your_domain.com/ocdi/widgets.json',
            // 'import_customizer_file_url' => 'http://www.your_domain.com/ocdi/customizer.dat',
            // 'import_redux' => array(
            //     array(
            //         'file_url' => 'http://www.your_domain.com/ocdi/redux.json',
            //         'option_name' => 'redux_option_name',
            //     ),
            // ),
            'import_preview_image_url' => 'https://mmedia-storage-bucket.s3.eu-west-3.amazonaws.com/files/1/7DrUPFKx1JZmOHnt5s9viCwkpOH70tJp5fk8UpNP.png',
            // 'import_notice' => __('After you import this demo, you will have to setup the slider separately.', 'your-textdomain'),
            // 'preview_url' => 'http://www.your_domain.com/my-demo-1',
        ),
        array(
            'import_file_name' => 'Elementor Demo',
            // 'categories' => array('Category 1', 'Category 2'),
            'import_file_url' => 'http://www.your_domain.com/ocdi/demo-content.xml',
            // 'import_widget_file_url' => 'http://www.your_domain.com/ocdi/widgets.json',
            // 'import_customizer_file_url' => 'http://www.your_domain.com/ocdi/customizer.dat',
            // 'import_redux' => array(
            //     array(
            //         'file_url' => 'http://www.your_domain.com/ocdi/redux.json',
            //         'option_name' => 'redux_option_name',
            //     ),
            // ),
            'import_preview_image_url' => 'https://mmedia-storage-bucket.s3.eu-west-3.amazonaws.com/files/1/YbSzU3efj6RMvXjwWROHMkkRgv2Ansh97zFuCJBu.png',
            'import_notice' => __('After you import this demo, you will have to install and activate Elementor.', 'm-media-snippet-theme'),
            // 'preview_url' => 'http://www.your_domain.com/my-demo-1',
        ),
        array(
            'import_file_name' => 'WordPress Unit Test',
            // 'categories' => array('Category 1', 'Category 2'),
            'import_file_url' => 'https://raw.githubusercontent.com/WPTT/theme-unit-test/master/themeunittestdata.wordpress.xml',
            // 'import_widget_file_url' => 'http://www.your_domain.com/ocdi/widgets.json',
            // 'import_customizer_file_url' => 'http://www.your_domain.com/ocdi/customizer.dat',
            // 'import_redux' => array(
            //     array(
            //         'file_url' => 'http://www.your_domain.com/ocdi/redux.json',
            //         'option_name' => 'redux_option_name',
            //     ),
            // ),
            'import_preview_image_url' => 'https://mmedia-storage-bucket.s3.eu-west-3.amazonaws.com/files/1/Zm5xUnhwn5frZ0LBLx5Al7VwTH2OhD4wvo8ty2Xu.png',
            'import_notice' => __('This imports the default testing pages and posts from the WordPress Theme testers. Beware - over 140 pieces of content here!', 'm-media-snippet-theme'),
            // 'preview_url' => 'http://www.your_domain.com/my-demo-1',
        ),
    );
}
add_filter('pt-ocdi/import_files', 'm_media_snippet_theme_import_files');

/**
 * Register the required plugins for this theme.
 *
 *  <snip />
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function m_media_snippet_theme_register_required_plugins()
{
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        // This is an example of how to include a plugin from an arbitrary external source in your theme.
        array(
            'name' => 'M Media Support plugin', // The plugin name.
            'slug' => 'mmedia-wp-plugin', // The plugin slug (typically the folder name).
            'source' => 'https://github.com/M-Media-Group/mmedia-wp-plugin/archive/1.7.3.zip', // The plugin source.
            'required' => false, // If false, the plugin is only 'recommended' instead of required.
            'external_url' => 'https://blog.mmediagroup.fr/post/m-media-wordpress-plugin/', // If set, overrides default API URL and points to an external URL.
        ),

        // This is an example of how to include a plugin from a GitHub repository in your theme.
        // This presumes that the plugin code is based in the root of the GitHub repository
        // and not in a subdirectory ('/src') of the repository.
        array(
            'name' => 'Theme Updater (via GitHub)',
            'slug' => 'github-updater',
            'source' => 'https://github.com/afragen/github-updater/releases/download/9.9.8/github-updater-9.9.8.zip',
            'required' => true,
        ),

        // This is an example of how to include a plugin from the WordPress Plugin Repository.
        array(
            'name' => 'Google Site Kit',
            'slug' => 'google-site-kit',
            'required' => false,
        ),

        array(
            'name' => 'Maps by Cartes.io',
            'slug' => 'cartes',
            'required' => false,
        ),

        array(
            'name' => 'Demo posts and pages',
            'slug' => 'one-click-demo-import',
            'required' => false,
        ),

        // This is an example of the use of 'is_callable' functionality. A user could - for instance -
        // have WPSEO installed *or* WPSEO Premium. The slug would in that last case be different, i.e.
        // 'wordpress-seo-premium'.
        // By setting 'is_callable' to either a function from that plugin or a class method
        // `array( 'class', 'method' )` similar to how you hook in to actions and filters, TGMPA can still
        // recognize the plugin as being installed.
        array(
            'name' => 'WordPress SEO by Yoast',
            'slug' => 'wordpress-seo',
            'is_callable' => 'wpseo_init',
        ),
    );

    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id' => 'm-media-snippet-theme', // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '', // Default absolute path to bundled plugins.
        'menu' => 'tgmpa-install-plugins', // Menu slug.
        'has_notices' => true, // Show admin notices or not.
        'dismissable' => true, // If false, a user cannot dismiss the nag message.
        'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => true, // Automatically activate plugins after installation or not.
        'message' => '', // Message to output right before the plugins table.

        /*
    'strings'      => array(
    'page_title'                      => __( 'Install Required Plugins', 'm-media-snippet-theme' ),
    'menu_title'                      => __( 'Install Plugins', 'm-media-snippet-theme' ),
    /* translators: %s: plugin name. * /
    'installing'                      => __( 'Installing Plugin: %s', 'm-media-snippet-theme' ),
    /* translators: %s: plugin name. * /
    'updating'                        => __( 'Updating Plugin: %s', 'm-media-snippet-theme' ),
    'oops'                            => __( 'Something went wrong with the plugin API.', 'm-media-snippet-theme' ),
    'notice_can_install_required'     => _n_noop(
    /* translators: 1: plugin name(s). * /
    'This theme requires the following plugin: %1$s.',
    'This theme requires the following plugins: %1$s.',
    'm-media-snippet-theme'
    ),
    'notice_can_install_recommended'  => _n_noop(
    /* translators: 1: plugin name(s). * /
    'This theme recommends the following plugin: %1$s.',
    'This theme recommends the following plugins: %1$s.',
    'm-media-snippet-theme'
    ),
    'notice_ask_to_update'            => _n_noop(
    /* translators: 1: plugin name(s). * /
    'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
    'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
    'm-media-snippet-theme'
    ),
    'notice_ask_to_update_maybe'      => _n_noop(
    /* translators: 1: plugin name(s). * /
    'There is an update available for: %1$s.',
    'There are updates available for the following plugins: %1$s.',
    'm-media-snippet-theme'
    ),
    'notice_can_activate_required'    => _n_noop(
    /* translators: 1: plugin name(s). * /
    'The following required plugin is currently inactive: %1$s.',
    'The following required plugins are currently inactive: %1$s.',
    'm-media-snippet-theme'
    ),
    'notice_can_activate_recommended' => _n_noop(
    /* translators: 1: plugin name(s). * /
    'The following recommended plugin is currently inactive: %1$s.',
    'The following recommended plugins are currently inactive: %1$s.',
    'm-media-snippet-theme'
    ),
    'install_link'                    => _n_noop(
    'Begin installing plugin',
    'Begin installing plugins',
    'm-media-snippet-theme'
    ),
    'update_link'                     => _n_noop(
    'Begin updating plugin',
    'Begin updating plugins',
    'm-media-snippet-theme'
    ),
    'activate_link'                   => _n_noop(
    'Begin activating plugin',
    'Begin activating plugins',
    'm-media-snippet-theme'
    ),
    'return'                          => __( 'Return to Required Plugins Installer', 'm-media-snippet-theme' ),
    'plugin_activated'                => __( 'Plugin activated successfully.', 'm-media-snippet-theme' ),
    'activated_successfully'          => __( 'The following plugin was activated successfully:', 'm-media-snippet-theme' ),
    /* translators: 1: plugin name. * /
    'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'm-media-snippet-theme' ),
    /* translators: 1: plugin name. * /
    'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'm-media-snippet-theme' ),
    /* translators: 1: dashboard link. * /
    'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'm-media-snippet-theme' ),
    'dismiss'                         => __( 'Dismiss this notice', 'm-media-snippet-theme' ),
    'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'm-media-snippet-theme' ),
    'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'm-media-snippet-theme' ),

    'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
    ),
     */
    );

    tgmpa($plugins, $config);
}
add_action('tgmpa_register', 'm_media_snippet_theme_register_required_plugins');

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

/**
 * TGMP Plugin Dependancy check
 */
require get_template_directory() . '/class-tgm-plugin-activation.php';
