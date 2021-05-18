<?php
/**
 * Displays the menu icon and modal
 *
 */

?>

<div id="mobile-menu" class="menu-modal">

	<div class="menu-modal-inner">

		<div class="menu-wrapper">

			<div class="menu-top">

				<button class="close-nav-toggle">
					<span class="toggle-text">Close Menu</span>
					<svg class="svg-icon" aria-hidden="true" role="img" focusable="false" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><polygon fill="" fill-rule="evenodd" points="6.852 7.649 .399 1.195 1.445 .149 7.899 6.602 14.352 .149 15.399 1.195 8.945 7.649 15.399 14.102 14.352 15.149 7.899 8.695 1.445 15.149 .399 14.102"></polygon></svg>
				</button><!-- .nav-toggle -->

                <!-- Modal Menu on Mobile -->
				<nav class="mobile-menu" aria-label="mobile-menu" role="navigation">

					<ul class="modal-menu reset-list-style">

						<?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'menu-3',
                                    'menu_id'        => 'mobile-menu',
                                    'container'      => '',
									'items_wrap'     => '%3$s',
                                )
                            );

						?>

					</ul>

				</nav>

				<!-- Modal Menu on Desktop -->
				<nav class="expanded-menu" aria-label="expanded-menu" role="navigation">
					<ul class="modal-menu reset-list-style">
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-2',
									'menu_id'        => 'expanded-menu',
									'container'      => '',
									'items_wrap'     => '%3$s',
								)
							);

						?>
					</ul>
				</nav>

			</div><!-- .menu-top -->

            <div class="menu-bottom">
                <?php
                // // Output the mobile menu
                get_template_part( 'template-parts/social-menu' );
                ?>

			</div><!-- .menu-bottom -->

		</div><!-- .menu-wrapper -->
	</div><!-- .menu-modal-inner-->

</div><!-- .menu-modal -->
