<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package m-media-snippet-theme
 */

get_header();?>

<main id="primary" class="content-area">

			<?php if (have_posts()): ?>

			<header class="archive-header">
				<h1 class="archive-title">
				<?php
/* translators: %s: Category title. */
printf(__('%s', 'm-media-snippet-theme'), single_cat_title('', false));
?>
				</h1>

				<?php
// Show an optional term description.
$term_description = term_description();
if (!empty($term_description)):
    printf('<div class="taxonomy-description">%s</div>', $term_description);
endif;
?>
            <hr>
			</header><!-- .archive-header -->
				<?php
// Start the Loop.
while (have_posts()):
    the_post();

    /*
     * Include the post format-specific template for the content. If you want
     * to use this in a child theme, then include a file called content-___.php
     * (where ___ is the post format) and that will be used instead.
     */
    get_template_part('template-parts/content', get_post_type());

endwhile;
// Previous/next page navigation.
the_posts_navigation();

else:
    // If no content, include the "No posts found" template.
    get_template_part('template-parts/content', get_post_type());

endif;
?>

	</main><!-- #primary -->
<?php
get_footer();
