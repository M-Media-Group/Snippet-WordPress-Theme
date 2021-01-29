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
		<a href="<?php echo esc_url(__('https://mmediagroup.fr/', 'm-media-snippet-theme')); ?>"><?php
/* translators: %s: CMS name, i.e. WordPress. */
printf(esc_html__('Proudly powered by %s', 'm-media-snippet-theme'), 'M Media');
?></a>
		<span class="sep"> | </span>
		<?php
/* translators: 1: Theme name, 2: Theme author. */
printf(esc_html__('Theme: %s', 'm-media-snippet-theme'), '<a href="https://github.com/M-Media-Group/">Snippet</a>');
?>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer();?>

</body>
</html>
