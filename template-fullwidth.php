<?php
/*
* Template Name: Fullwidth Page
*/
?>

<?php get_header(); ?>

<div class="row row-eq-height">
	<div class="col-md-8 col-md-offset-2">
		<main id="content" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
			<div class="row">
				<div class="col-md-12">

					<?php while ( have_posts() ) : the_post(); ?>
						<article id="entry-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
							<h2 class="entry-title" itemprop="headline">
								<?php the_title(); ?>
							</h2>

							<?php if ( has_post_thumbnail() ) : ?>
								<div class="entry-featured">
									<a class="ci-lightbox" href="<?php echo esc_url( olsen_light_get_image_src( get_post_thumbnail_id(), 'large' ) ); ?>">
										<?php the_post_thumbnail( 'post-thumbnail', array( 'itemprop' => 'image' ) ); ?>
									</a>
								</div>
							<?php endif; ?>

							<div class="entry-content">
								<?php the_content(); ?>
								<?php wp_link_pages(); ?>
							</div>

							<div class="entry-utils group">
								<?php get_template_part( 'part', 'social-sharing' ); ?>
							</div>

							<h4 class="share-thoughts"> Share your thoughts in the comment below </h4>
							<?php echo do_shortcode ('[gs-fb-comments]'); ?>

						</article>
					<?php endwhile; ?>

				</div>
			</div>
		</main>
	</div>
</div>

<?php get_footer(); ?>
