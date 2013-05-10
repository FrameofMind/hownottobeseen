<?php
/*
Template Name: Home Page
*/

/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package hownottobeseen
 */

get_header(); ?>



	<div id="primary" class="content-area home-page">
		
		<?php while ( have_posts() ) : the_post(); ?>
		
		<aside class="featured-section">
					<h1>Featured People</h1>
					<ul>
						<?php
							$do_not_duplicate = null;
							$args = array(
								'post_type' => 'person_page',
								'category_name' => 'featured-people-section',
								'showposts' => 10,
								'order' => 'ASC',
								'orderby' => 'title'
							);
							$featuredpeople_query = new WP_Query( $args );
							while ( $featuredpeople_query->have_posts() ) : $featuredpeople_query->the_post();
						?>
					
					
						<li>
							
							<a class="title-link" href="<?php the_permalink(); ?>">
								<h2><?php the_title(); ?></h2>
								<div class="masked-image-wrapper">
									<div class="image-mask"></div>
									<?php the_post_thumbnail(); ?>
								</div>
							</a>
						</li>
						
						<?php
							endwhile;
							wp_reset_postdata();
						?>
						
					</ul>
				</aside><!--END Featured Section-->
		
		
		
		<div id="content" class="site-content main-content" role="main">
		
			<article class="site-introduction">
				<h1><?php the_title(); ?></h1>
					
				<?php the_content(); ?>
			</article><!--END Site Introduction-->
			
			<article class="featured-article">
				<h1 class="section-head">Featured Review</h1>
				
				<?php
					$do_not_duplicate = null;
					$args = array(
						'post_type' => 'title_page',
						'category_name' => 'featured-review',
						'showposts' => 1,
					);
					$featuredpeople_query = new WP_Query( $args );
					while ( $featuredpeople_query->have_posts() ) : $featuredpeople_query->the_post();
				?>
				
				<header class="article-header">
					<a class="title-link" href="<?php the_permalink(); ?>">
						<h1><?php the_title(); ?></h1>
						<?php the_post_thumbnail(); ?>
					</a>
				</header>
					<?php the_field( 'long_excerpt' ); ?>
					
					<a class="title-link" href="<?php the_permalink(); ?>">Read more...</a>
				
				<?php
					endwhile;
					wp_reset_postdata();
				?>
			
			</article><!--END Featured Article-->

		<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
		
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>