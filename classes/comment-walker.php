<?php
/**
 * Custom comment walker for this theme.
 *
 */

if ( ! class_exists( 'Musings_Walker_Comment' ) ) {
	/**
	 * CUSTOM COMMENT WALKER
	 * A custom walker for comments
	 */
	class Musings_Walker_Comment extends Walker_Comment {

		/**
		 * Outputs a comment in the HTML5 format.
		 *
		 * @see wp_list_comments()
		 * @see https://developer.wordpress.org/reference/functions/get_comment_author_url/
		 * @see https://developer.wordpress.org/reference/functions/get_comment_author/
		 * @see https://developer.wordpress.org/reference/functions/get_comment_reply_link/
		 * @see https://developer.wordpress.org/reference/functions/get_edit_comment_link/
		 *
		 * @param WP_Comment $comment Comment to display.
		 * @param int        $depth   Depth of the current comment.
		 * @param array      $args    An array of arguments.
		 */
		protected function html5_comment( $comment, $depth, $args ) {

			$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';

			?>
			<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent' : '', $comment ); ?>>
				<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
					<header class="comment-header">
						<div class="comment-author">
							<?php
							$comment_author     = get_comment_author( $comment );

							printf(
								'<span>%1$s</span>',
								esc_html( $comment_author ),
								__( 'says:', 'musings' )
							);
							?>
						</div><!-- .comment-author -->

						<div class="comment-date">
                            <?php
							$comment_date    = get_comment_date( 'F j, Y', $comment );

							printf(
								'<time datetime="%1$s" title="%1$s">%1$s</time>',
								esc_html( $comment_date ),
								__( 'says:', 'musings' )
							);  
							?>
						</div><!-- .comment-date -->

					</header><!-- .comment-meta -->

					<div class="comment-content entry-content">

						<?php

						comment_text();

						if ( '0' === $comment->comment_approved ) {
							?>
							<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'musings' ); ?></p>
							<?php
						}

						?>

					</div><!-- .comment-content -->

					<?php

					$comment_reply_link = get_comment_reply_link(
						array_merge(
							$args,
							array(
								'add_below' => 'div-comment',
								'depth'     => $depth,
								'max_depth' => $args['max_depth'],
								'before'    => '<span class="comment-reply">',
								'after'     => '</span>',
							)
						)
					);

					if ( $comment_reply_link ) {
						?>

						<footer class="comment-footer-meta">

							<?php
							if ( $comment_reply_link ) {
								echo $comment_reply_link; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Link is escaped in https://developer.wordpress.org/reference/functions/get_comment_reply_link/
							}
							?>

						</footer>

						<?php
					}
					?>

				</article><!-- .comment-body -->

			<?php
		}
	}
}
