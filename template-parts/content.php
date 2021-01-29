<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package m-media-snippet-theme
 */

;?>

<article id="post-<?php the_ID();?>" <?php post_class();?>>
<?php
if (is_singular()):
    if (has_post_thumbnail()):
        echo '<header class="entry-header u-fullscreen-width">';
        ?>
							<div class="wp-block-cover alignfull has-background-dim" style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>);background-position:94% 30%;min-height:500px"><div class="wp-block-cover__inner-container">

							<?php the_title('<h1 class="entry-title u-center-text">', '</h1>');
        if ('post' === get_post_type()):
            echo '<div class="entry-meta u-center-text">';
            m_media_snippet_theme_posted_on();
            echo '</div>';
        endif;?>

					</div></div>
					<?php
    else:
        echo '<header class="entry-header">';
        the_title('<h1 class="entry-title">', '</h1>');
        if ('post' === get_post_type()): ?>
						<div class="entry-meta">
						<?php m_media_snippet_theme_posted_on();?>
						</div><!-- .entry-meta -->
						<?php
    endif;
endif;
else:
?><header class="entry-header"><?php
the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
if (has_post_thumbnail()):
    the_post_thumbnail();
endif;
if ('post' === get_post_type()): ?>
<div class="entry-meta">
<?php m_media_snippet_theme_posted_on();?>
</div><!-- .entry-meta -->
<?php
endif;
endif;
?>
</header><!-- .entry-header -->

<div class="entry-content">
<?php
if (is_singular()) {
    the_content(sprintf(
        wp_kses(
/* translators: %s: Name of current post. Only visible to screen readers */
            __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'm-media-snippet-theme'),
            array(
                'span' => array(
                    'class' => array(),
                ),
            )
        ),
        get_the_title()
    ));
} else {
    the_excerpt(); // Echo the excerpt directly.
    $excerpt = get_the_excerpt(); // Store the excerpt in $excerpt.

// Retrieve the "raw" exceprt - this has not passed any filters etc,
    // and instead comes directly from the database.
    $post = get_post();
    echo $post->post_excerpt;
}

wp_link_pages(array(
    'before' => '<div class="page-links">' . esc_html__('Pages:', 'm-media-snippet-theme'),
    'after' => '</div>',
));
?>
</div><!-- .entry-content -->

<footer class="entry-footer">
<?php m_media_snippet_theme_entry_footer();?>
</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID();?> -->
