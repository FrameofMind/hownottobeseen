<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package hownottobeseen
 */
?>
	<div id="secondary" class="widget-area featured-items" role="complementary">
		
		<h1>Featured</h1>
			
		
				<ul>
					<?php
						$do_not_duplicate = null;
						$args = array(
							'post_type' => 'title_page', 'person_page',
							'category_name' => 'featured-items',
							'showposts' => 5,
							'order' => 'ASC',
							'orderby' => 'none'
						);
						$featured_query = new WP_Query( $args );
						while ( $featured_query->have_posts() ) : $featured_query->the_post();
						$do_not_duplicate = $post->ID;
					?>
						<li>
							<a class="title-link" href="<?php the_permalink(); ?>">
								<h2><?php the_title(); ?></h2>
								<?php the_post_thumbnail(); ?>
							</a>
						</li>
					<?php
						endwhile;
						wp_reset_postdata();
					?>
				</ul>
		
		
		
		
		
		
		
		
		
	</div><!-- #secondary -->
