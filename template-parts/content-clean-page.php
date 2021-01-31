<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package m-media-snippet-theme
 */

?>

<article id="post-<?php the_ID();?>" class="entry-content clean-page">


		<?php
the_content();

?>


</article><!-- #post-<?php the_ID();?> -->
