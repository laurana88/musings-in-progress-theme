<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
		if ( have_posts() ) :

				?>
				<header>
					<h1 class="page-title"><?php single_post_title(); ?></h1>
				</header>
				<?php

			?>
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
				// get_template_part( 'template-parts/content', get_post_type() );
				get_template_part( 'template-parts/content-archive' );

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
