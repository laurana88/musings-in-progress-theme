<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MusingsOfARover
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php 
		if( is_single() ) {
			get_template_part( 'template-parts/related-posts' );
		}
		dynamic_sidebar( 'sidebar-1' );
	?>
</aside><!-- #secondary -->
