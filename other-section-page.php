<?php
/*
Template Name: Other Section Page
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

	<div id="primary" class="content-area section-page">
		
				<aside class="featured-section">
					<h1>Featured Other</h1>
					<ul>
						<?php
							$do_not_duplicate = null;
							$args = array(
								'post_type' => 'title_page',
								'category_name' => 'featured-other-section',
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
								<?php the_post_thumbnail(); ?>
							</a>
							<div class="teaser"<?php the_excerpt(); ?></div>
						</li>
						
						<?php
							endwhile;
							wp_reset_postdata();
						?>
						
					</ul>
				</aside><!--END Featured Section-->
		
		
		
		<div id="content" class="site-content main-content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>				
			
				
				
				
				
				
				
				
				<article class="section-introduction">
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</article><!--END Section Introduction-->
				
				
				
				
				<section class="section-index">
					<h1><?php the_title(); ?></h1>
					<ul>
						<?php
							$do_not_duplicate = null;
							$args = array(
								'post_type' => 'title_page',
								'category_name' => 'other',
								'showposts' => 100,
								'order' => 'ASC',
								'orderby' => 'title'
							);
							$peopleindex_query = new WP_Query( $args );
							while ( $peopleindex_query->have_posts() ) : $peopleindex_query->the_post();
						?>
							<li>
								<a class="title-link" href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</li>
						<?php
							endwhile;
							wp_reset_postdata(); // end section-index loop
						?>
					</ul>
				</section><!--END Section Index-->

				

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
		
		
		
	</div><!-- #primary -->


<?php get_footer(); ?>
