<?php
/*
 * Template Name: With Sidebar
 * description:Page template with sidebar
 */

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<div class="page-header-wrapper" >
		<?php
		if ( has_post_thumbnail() ) {
			?>
				<div class="header-image-present" >
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
			<?php
		} 
	?>
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
	</div>
	<?php
	if ( has_post_thumbnail() ) {
		?></div><?php
	}
	?>
	<div class="content-sidebar-wrap" >
	<main id="primary" class="site-main">

	<?php
	get_template_part( 'template-parts/content', 'page' );

endwhile; // End of the loop.
?>

</main><!-- #main -->
<?php
get_sidebar();
?>
	</div>
<?php
get_footer();
