<?php
/**
 * m-media-snippet-theme Theme Customizer
 *
 * @package m-media-snippet-theme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function m_media_snippet_theme_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    // Removing header_image since its not actually implemented
    $wp_customize->remove_control("header_image");
    $wp_customize->remove_section("colors");

    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial('blogname', array(
            'selector' => '.site-title a',
            'render_callback' => 'm_media_snippet_theme_customize_partial_blogname',
        ));
        $wp_customize->selective_refresh->add_partial('blogdescription', array(
            'selector' => '.site-description',
            'render_callback' => 'm_media_snippet_theme_customize_partial_blogdescription',
        ));
    }
}
add_action('customize_register', 'm_media_snippet_theme_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function m_media_snippet_theme_customize_partial_blogname()
{
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function m_media_snippet_theme_customize_partial_blogdescription()
{
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function m_media_snippet_theme_customize_preview_js()
{
    wp_enqueue_script('m-media-snippet-theme-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'm_media_snippet_theme_customize_preview_js');
