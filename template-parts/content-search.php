<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MusingsOfARover
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

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

	<header class="entry-header">
		<div class="entry-taxonomies">
			<?php musingsofarover_entry_footer(); ?>
		</div><!-- .entry-footer -->

		<?php the_title( sprintf( '<h2 class="entry-title"><a class="alt-link2" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->

</article><!-- #post-<?php the_ID(); ?> -->
