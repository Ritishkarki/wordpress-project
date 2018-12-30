<?php
/*
* Template Name: Home Page
*/
?>

<?php get_header(); ?>

<div class="row">
	<div class="col-md-12">
		<main role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
			<div class="row homepage row-eq-height">
				<div class="col-md-3">
					<?php if ( is_active_sidebar( 'sidebar-left' ) ) : ?>
						<div id="secondary" class="widget-area" role="complementary">
							<?php dynamic_sidebar( 'sidebar-left' ); ?>
						</div>
					<?php endif; ?>
				</div>
				<div class="col-md-6 no-padding">
					<!-- slider -->
					<?php get_template_part( 'part', 'slider' ); ?>
					<!-- <h1 class="homepage-headliner"> Latest posts </h1> -->
				</div>
				<div class="col-md-3">
					<?php if ( is_active_sidebar( 'sidebar-right' ) ) : ?>
						<div id="secondary" class="widget-area" role="complementary">
							<?php dynamic_sidebar( 'sidebar-right' ); ?>
						</div>
					<?php endif; ?>
				</div>
				<!-- recent posts loop -->
				<div class="col-md-12">
					<div class="row">
						<?php get_template_part( 'part', 'category-loop' ); ?>
					</div>
				</div>
			</div>
		</main>
	</div>
</div>

<?php get_footer(); ?>
