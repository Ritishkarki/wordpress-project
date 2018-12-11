				</div><!-- /site-content -->

				<footer id="footer">

					<?php if ( is_active_sidebar( 'footer-widgets') ) : ?>
						<?php
							$attributes = sprintf( 'data-auto="%s" data-speed="%s"',
								esc_attr( get_theme_mod( 'instagram_auto', 1 ) ),
								esc_attr( get_theme_mod( 'instagram_speed', 300 ) )
							);
						?>
						<div class="row">
							<div class="col-md-12">
								<div class="footer-widget-area" <?php echo $attributes; ?>>
									<?php dynamic_sidebar( 'footer-widgets' ); ?>
								</div>
							</div>
						</div>
					<?php endif; ?>

					<div class="site-bar group">
						<nav class="nav">
							<?php wp_nav_menu( array(
								'theme_location' => 'footer_menu',
								'container'      => '',
								'menu_id'        => '',
								'menu_class'     => 'navigation',
								'depth'          => 1
							) ); ?>
						</nav>

						<div class="site-tools">
							<?php if ( get_theme_mod( 'footer_socials', 1 ) == 1 ) {
								get_template_part( 'part', 'social-icons' );
							} ?>
						</div><!-- /site-tools -->
					</div><!-- /site-bar -->
					</div><!-- /site-logo -->
				</footer><!-- /footer -->
			</div><!-- /col-md-12 -->
		</div><!-- /row -->
	</div><!-- /container -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
