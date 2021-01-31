<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package m-media-snippet-theme
 */

;?>

<footer id="colophon" class="site-footer">
	<div class="site-info">
		&copy;
		<?php
echo date_i18n(
    /* translators: Copyright date format, see https://www.php.net/manual/datetime.format.php */
    _x('Y', 'copyright date format', 'm-media-snippet-theme')
);
?>
		<a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name');?></a>
<?php if (get_option('m-media-snippet-theme-attribute-theme-author') == 1) {
    ?>
		<span class="sep"> | </span>
		<?php
/* translators: 1: Theme name, 2: Theme author. */
    printf(esc_html__('Theme: %s', 'm-media-snippet-theme'), '<a href="https://github.com/M-Media-Group/Snippet-WordPress-Theme">Snippet by M Media</a>');
}?>
		<span class="sep"> | </span>
<?php echo get_the_privacy_policy_link(); ?>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer();?>

</body>
</html>
