<?php
/**
 * Template part for displaying posts in a grid for archives
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MusingsOfARover
 */

?>

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
