<?php get_header(); ?>

<div class="row">

	<div class="col-md-8">
		<main id="content" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
			<div class="row">
				<div class="col-md-12">

					<?php while ( have_posts() ) : the_post(); ?>
						<article id="entry-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">

							<div class="entry-meta entry-meta-top">
								<p class="entry-categories">
									<?php the_category( ', ' ); ?>
								</p>
							</div>

							<h2 class="entry-title" itemprop="headline">
								<?php the_title(); ?>
							</h2>

							<div class="entry-meta entry-meta-bottom">
								<time class="entry-date" itemprop="datePublished" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
								<span> by <?php the_author();?> </span>
								<a href="<?php echo esc_url( get_comments_link() ); ?>" class="entry-comments-no "><?php comments_number(); ?></a>
							</div>

							<?php if ( has_post_thumbnail() ) : ?>
								<div class="entry-featured">
									<a class="ci-lightbox" href="<?php echo esc_url( olsen_light_get_image_src( get_post_thumbnail_id(), 'large' ) ); ?>">
										<?php the_post_thumbnail( 'post-thumbnail', array( 'itemprop' => 'image' ) ); ?>
									</a>
								</div>
							<?php endif; ?>


							<div class="entry-content" itemprop="text">
								<?php the_content(); ?>
								<?php wp_link_pages(); ?>
							</div>

							<div class="entry-tags">
								<?php the_tags( '', '' ); ?>
							</div>

							<div class="entry-utils group">
								<?php get_template_part( 'part', 'social-sharing' ); ?>
							</div>

							<div id="paging" class="group">
								<?php
									$prev_post = get_previous_post();
									$next_post = get_next_post();
									?>
								<?php if( ! empty( $next_post ) ): ?>
									<a href="<?php echo esc_url( get_permalink( $next_post ) ); ?>" class="paging-standard paging-older"><?php esc_html_e( 'Previous Post', 'olsen-light' ); ?></a>
								<?php endif; ?>
								<?php if( ! empty( $prev_post ) ): ?>
									<a href="<?php echo esc_url( get_permalink( $prev_post ) ); ?>" class="paging-standard paging-newer"><?php esc_html_e( 'Next Post', 'olsen-light' ); ?></a>
								<?php endif; ?>
							</div>
							<?php 
							global $wp;
							$url = home_url( $wp->request );
							?>
							<?php get_template_part( 'part', 'related' ); ?>
							<?php echo do_shortcode('[wpdevart_facebook_comment curent_url="http://developers.facebook.com/docs/plugins/comments/" order_type="social" title_text="Facebook Comment" title_text_color="#000000" title_text_font_size="22" title_text_font_famely="monospace" title_text_position="left" width="100%" bg_color="#d4d4d4" animation_effect="random" count_of_comments="3" ]'); ?>
						</article>
					<?php endwhile; ?>
				</div>
			</div>
		</main>
	</div>

	<div class="col-md-4">
		<?php get_sidebar(); ?>
	</div>

</div><!-- /row -->

<?php get_footer(); ?>
