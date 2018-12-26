<?php
/*
* Template Name: Home Page
*/
?>

<?php get_header(); ?>

<div class="row">

	<div class="col-md-12">
		<main role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
			<div class="row homepage">
                <?php 
                    $the_query = new WP_Query( array(
                        'posts_per_page' => 6,
                    )); 
                ?>
				<div class="col-md-4">
					
				</div>
				<div class="col-md-8">
					<!-- slider -->
					<?php get_template_part( 'part', 'slider' ); ?>
					<h1 class="homepage-headliner"> Latest posts </h1>
					<!-- recent posts loop -->
					<div class="row">
						<?php if ( $the_query->have_posts() ) : ?>
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<article id="entry-<?php the_ID(); ?>" <?php post_class( 'col-md-6 col-sm-6 col-xs-12' ); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
									<a class="home-page-article" href="<?php the_permalink(); ?>">
										<?php if ( has_post_thumbnail() ) : ?>
											<div class="entry-featured">
												<?php the_post_thumbnail( 'post-thumbnail', array( 'itemprop' => 'image' ) ); ?>
											</div>
										<?php endif; ?>
										<div class="entry-content">
											<h4 class="article-title" itemprop="headline">
												<?php the_title(); ?>
											</h4>
											<h6>
												<i class="fa fa-clock-o" aria-hidden="true"></i> 
												<?php echo get_estimated_reading_time(get_the_content());?> by 
												<?php the_author();?>
											</h6>
											<?php the_excerpt(); ?> 
											<?php wp_link_pages(); ?>
										</div>
									</a>
								</article>

							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>

							<?php else : ?>
							<p><?php __('No News'); ?></p>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-md-4">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</main>
	</div>
</div>

<?php get_footer(); ?>
