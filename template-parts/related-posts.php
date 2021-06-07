<?php
/**
 * Template part for displaying related posts
 *
 *  
 * @package MusingsOfARover
 */

?>

<div class="related-posts-section">
	<h6 class="laura-fontunderland">Related Posts</h6>
	<div class="list-posts">

	<?php
	// Get the primary category
	$post_category = get_primary_taxonomy_term();
	// Build our category based custom query arguments
	$custom_query_args = array(
		'posts_per_page' => 3, // Number of related posts to display
		'post__not_in' => array(get_the_ID()), // Ensure that the current post is not displayed
		'orderby' => 'rand', // Randomize the results
		'category_name' => $post_category['slug'], // Select posts in the same categories as the current post
	);
	// Initiate the custom query
	$custom_query = new WP_Query( $custom_query_args );

	// Run the loop and output data for the results
	if ( $custom_query->have_posts() ) : ?>
		<?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
			<article class="laura-relative" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
					<?php
						the_post_thumbnail(
							'blogindex-size',
							array(
								'alt' => the_title_attribute(
									array(
										'echo' => false,
									)
								),
							)
						);
					?>
				</a>
				<header class="list-posts-header">
					<?php
						the_title( '<h2 class="entry-title"><a class="alt-link2" href="' . esc_url( get_permalink() ) . '" rel="bookmark"><span class="text-highlight-white">', '</span></a></h2>' );
					?>
				</header><!-- .entry-header -->
			</article><!-- #post-<?php the_ID(); ?> -->
		<?php endwhile;
	endif;
	// Reset postdata
	wp_reset_postdata();
	?>
	</div>
</div>
