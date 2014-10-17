<?php
/**
 * The Template for displaying all Section Page type posts.
 *
 * @package hownottobeseen
 */

get_header(); ?>

	<div id="primary" class="content-area section-page">
		
				<aside class="featured-section">
					<h1>Featured <?php the_title(); ?></h1>
					<ul>
						<?php
							$section_title = get_field('child_page_type_slug');
							$content_category = get_the_title();
							$category_slug = get_category_by_slug($content_category);
							$category_id = $category_slug->term_id;
							$do_not_duplicate = null;
							$args = array(
								'post_type' => $section_title,
								'category__and' => array( 18, $category_id ),
								/*'tax_query' => array(
									array(
										'taxonomy' => 'category',
										'field' => 'slug',
										'terms' => array( $content_category, 'featured')
									)
								),8?
								/*'content_type' => 'people',
								'tag' => 'people',*/
								/*'category_name' => 'featured',*/
								/*'tag' => 'featured',*/
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
							$section_title = get_field('child_page_type_slug');
							$content_category = get_the_title();
							$do_not_duplicate = null;
							$args = array(
								'post_type' => $section_title,
								'category_name' => $content_category,
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
