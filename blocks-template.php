<?php
/**
 * Template Name: Blocks
 * description:Page template with only blocks displaying
 */

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<main id="primary" class="site-main">
	<?php
	get_template_part( 'template-parts/content', 'page' );

endwhile; // End of the loop.
?>

</main><!-- #main -->

<?php
get_footer();
