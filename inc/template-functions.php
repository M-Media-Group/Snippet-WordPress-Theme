<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package m-media-snippet-theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function m_media_snippet_theme_body_classes($classes)
{
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    return $classes;
}
add_filter('body_class', 'm_media_snippet_theme_body_classes');

/**
 * Generate custom search form
 *
 * @param string $form Form HTML.
 * @return string Modified form HTML.
 */
function m_media_snippet_theme_search_form($form)
{
    return '<form role="search" method="get" class="search-form row" action="' . home_url(' / ') . '">
    <label class="ten columns">
        <span class="screen-reader-text">' . _x('Search for:', 'label') . '</span>
        <input type="search" class="search-field"
            placeholder="' . esc_attr_x('Search …', 'placeholder') . '"
            value="' . get_search_query() . '" name="s"
            title="' . esc_attr_x('Search for:', 'label') . '" />
    </label>
    <input type="submit" class="search-submit button button-primary two columns"
        value="' . esc_attr_x('Search', 'submit button') . '" />
</form>';
}
add_filter('get_search_form', 'm_media_snippet_theme_search_form');

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function m_media_snippet_theme_pingback_header()
{
    if (is_singular() && pings_open()) {
        echo '<link rel="pingback" href="', esc_url(get_bloginfo('pingback_url')), '">';
    }
}
add_action('wp_head', 'm_media_snippet_theme_pingback_header');
