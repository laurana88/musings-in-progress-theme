<?php
/**
* Template Name: Affiliate
* Template Post Type: post
* This is my single post template to handle posts with affiliates.
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

					//low res image - loads first
					// $featured_image = get_post_thumbnail_id();
					// $size = 'small-featured';
					// $imageurl = wp_get_attachment_image_src( $featured_image, $size);
					// $alt = get_post_meta($featured_image, '_wp_attachment_image_alt', true);
					// ?>
					<!-- <img src=" -->
					<?php 
					// echo $imageurl[0]; 
					?>
					<!-- " class="low-res" width="50" height="33" alt=" -->
					<?php 
					// echo $alt; 
					?>
					<!-- "/> -->

					<?php

					//high res image - loads second
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
            <p class="affiliate2"><i>This post contains affiliate links.
                If you click one of these links, I may earn a commission at no extra cost to you.
                Thank you!</i></p>
            <hr class="laurahraffiliate">
		<?php

		get_template_part( 'template-parts/content', get_post_type() );
		

		// the_post_navigation(
		// 	array(
		// 		'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'musingsofarover' ) . '</span> <span class="nav-title">%title</span>',
		// 		'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'musingsofarover' ) . '</span> <span class="nav-title">%title</span>',
		// 	)
		// );

		?>
		<div class="affiliate"><p><i>Some of the links in this post are affiliate links. If you buy something through these thinks, I may earn a commission from the sale (at no extra cost to you!). As an Amazon Associate I earn from qualifying purchases. Thank you for reading along!
		</i></p></div>
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
