<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MusingsOfARover
 */

get_header();
?>
	<div class="content-wrap-wide">
	<main id="primary" class="site-main">

		<?php 
		// Remove the freaking Category: language
		add_filter( 'get_the_archive_title', function ( $title ) {
			if( is_category() ) {
				$title = single_cat_title( '', false );
			}
			return $title;
		});

		

		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			<div class="list-posts">

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content-archive');

			endwhile;

			// the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

	</div>
		<?php
			the_posts_pagination( array( 
				'prev_text' => '« Previous', 
				'next_text' => 'Next »',
			) );
		?>	
	</main><!-- #main -->
	</div>

<?php
get_footer();
