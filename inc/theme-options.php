<?php

/**
 * Set up a WP-Admin page for managing turning on and off theme features.
 */
function m_media_snippet_theme_add_options_page()
{
    add_theme_page(
        'Theme Options',
        'Theme Options',
        'manage_options',
        'm-media-snippet-theme-options',
        'm_media_snippet_theme_options_page'
    );

    // Call register settings function
    add_action('admin_init', 'm_media_snippet_theme_options');
}
add_action('admin_menu', 'm_media_snippet_theme_add_options_page');

/**
 * Register settings for the WP-Admin page.
 */
function m_media_snippet_theme_options()
{
    register_setting('m-media-snippet-theme-options', 'm-media-snippet-theme-wp-block-styles', array('default' => 1));
    register_setting('m-media-snippet-theme-options', 'm-media-snippet-theme-dark-mode', array('default' => 1));
    register_setting('m-media-snippet-theme-options', 'm-media-snippet-theme-responsive-embeds', array('default' => 1));
}

/**
 * Build the WP-Admin settings page.
 */
function m_media_snippet_theme_options_page()
{?>
	<div class="wrap">
	<h1><?php _e('Snippet Theme Options', 'm-media-snippet-theme');?></h1>
	<form method="post" action="options.php">
		<?php settings_fields('m-media-snippet-theme-options');?>
		<?php do_settings_sections('m-media-snippet-theme-options');?>

			<table class="form-table">

				<tr valign="top">
					<td>
						<label>
							<input name="m-media-snippet-theme-dark-mode" type="checkbox" value="1" <?php checked('1', get_option('m-media-snippet-theme-dark-mode'));?> />
							<?php _e('Enable a dark theme style.', 'm-media-snippet-theme');?>
							(<a href="https://developer.wordpress.org/block-editor/developers/themes/theme-support/#dark-backgrounds"><code>dark-editor-style</code></a>)
						</label>
					</td>
				</tr>
				<tr valign="top">
					<td>
						<label>
							<input name="m-media-snippet-theme-wp-block-styles" type="checkbox" value="1" <?php checked('1', get_option('m-media-snippet-theme-wp-block-styles'));?> />
							<?php _e('Enable core block styles on the front end.', 'm-media-snippet-theme');?>
							(<a href="https://developer.wordpress.org/block-editor/developers/themes/theme-support/#default-block-styles"><code>wp-block-styles</code></a>)
						</label>
					</td>
				</tr>
				<tr valign="top">
					<td>
						<label>
							<input name="m-media-snippet-theme-responsive-embeds" type="checkbox" value="1" <?php checked('1', get_option('m-media-snippet-theme-responsive-embeds'));?> />
							<?php _e('Enable responsive embedded content.', 'm-media-snippet-theme');?>
							(<a href="https://developer.wordpress.org/block-editor/developers/themes/theme-support/#responsive-embedded-content"><code>responsive-embeds</code></a>)
						</label>
					</td>
				</tr>
			</table>

		<?php submit_button();?>
	</form>
	</div>
<?php }

/**
 * Enable dark mode in the editor if m-media-snippet-theme-dark-mode setting is active.
 */
function m_media_snippet_theme_enable_dark_mode()
{
    if (get_option('m-media-snippet-theme-dark-mode') == 1) {

        // Add support for editor styles.
        add_theme_support('editor-styles');
        add_editor_style('style-editor-dark.css');

        // Add support for dark styles.
        add_theme_support('dark-editor-style');
    }
}
// add_action('after_setup_theme', 'm_media_snippet_theme_enable_dark_mode');

/**
 * Enable dark mode on the front end if m-media-snippet-theme-dark-mode setting is active.
 */
function m_media_snippet_theme_enable_dark_mode_frontend_styles()
{
    if (get_option('m-media-snippet-theme-dark-mode') == 1) {
        wp_enqueue_style('m-media-snippet-themedark-style', get_template_directory_uri() . '/css/dark-mode.css');
    }
}
add_action('wp_enqueue_scripts', 'm_media_snippet_theme_enable_dark_mode_frontend_styles');

/**
 * Enable core block styles support if the m-media-snippet-theme-wp-block-styles setting is active.
 */
function m_media_snippet_theme_enable_wp_block_styles()
{

    if (get_option('m-media-snippet-theme-wp-block-styles', 1) == 1) {

        // Adding support for core block visual styles.
        add_theme_support('wp-block-styles');
    }
}
add_action('after_setup_theme', 'm_media_snippet_theme_enable_wp_block_styles');

/**
 * Enable responsive embedded content if the m-media-snippet-theme-responsive-embeds setting is active.
 */
function m_media_snippet_theme_enable_responsive_embeds()
{

    if (get_option('m-media-snippet-theme-responsive-embeds', 1) == 1) {

        // Adding support for responsive embedded content.
        add_theme_support('responsive-embeds');
    }
}
add_action('after_setup_theme', 'm_media_snippet_theme_enable_responsive_embeds');