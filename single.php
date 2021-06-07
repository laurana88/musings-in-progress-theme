<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package MusingsOfARover
 */

get_header();
?>

	<?php
	while ( have_posts() ) :
		the_post();

		?>
		<div class="post-header-wrapper" >
			<header class="entry-header">
				<div class="entry-taxonomies">
					<?php musingsofarover_entry_footer(); ?>
				</div><!-- .entry-taxonomies -->
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); 
				the_excerpt();
				?>
				<span class="updated-date"><?php printf( __( 'Updated in %s', 'textdomain' ), get_the_modified_date() ); ?></span>
			</header><!-- .entry-header -->
			<div class="post-featured-image">
				<picture>
					<?php 
					the_post_thumbnail('small-featured', array(
						'class' => 'low-res'
					)); 
					the_post_thumbnail( 'large', array(
						'class' => 'high-res',
						'onload' => 'this.classList.add("image-loaded")'
					));
					?>
				</picture>
			</div> <!-- .post-featured-image-->
		</div><!-- .post-header-wrapper-->
		<div class="content-sidebar-wrap">
		<main id="primary" class="site-main">
		<?php

		get_template_part( 'template-parts/content', get_post_type() );
		

		// the_post_navigation(
		// 	array(
		// 		'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'musingsofarover' ) . '</span> <span class="nav-title">%title</span>',
		// 		'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'musingsofarover' ) . '</span> <span class="nav-title">%title</span>',
		// 	)
		// );

		?>
		</main><!-- #main -->
		<?php
			get_sidebar();
		?>
		</div> <!-- #content sidebar wrap -->
		<div class="desktop-related-posts">
		<?php
			get_template_part( 'template-parts/related-posts' );
		?>
			</div> <!-- #desktop related posts -->
		<?php

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

		endwhile; // End of the loop.

get_footer();
