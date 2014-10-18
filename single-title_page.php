<?php
/**
 * The Template for displaying all Title Page type posts.
 *
 * @package hownottobeseen
 */

get_header(); ?>



	<div id="primary" class="content-area person-page">
		
		<?php while ( have_posts() ) : the_post(); ?>
		
		<aside class="featured-works">
				<?php if( get_field( 'related_people' ) ): ?>	
				<h1>Related People</h1>
				<ul>
						<?php while( has_sub_field( 'related_people' ) ): ?>
							<?php
							$post_object = get_sub_field('page_link');

								if( $post_object ): 
									// override $post
									$post = $post_object;
									setup_postdata( $post );
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
							<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
							<?php endif; ?>
						<?php endwhile; ?>
					<?php endif; // end of repeater loop. ?>
				</ul>
				
				<?php if( get_field( 'related_titles' ) ): ?>	
				<h1>Related Titles</h1>
				<ul>
						<?php while( has_sub_field( 'related_titles' ) ): ?>
							<?php
							$post_object = get_sub_field('page_link');

								if( $post_object ): 
									// override $post
									$post = $post_object;
									setup_postdata( $post );
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
							<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
							<?php endif; ?>
						<?php endwhile; ?>
					<?php endif; // end of repeater loop. ?>
				</ul>
				
				<?php if( !get_field( 'related_titles' ) ): ?>
				<h1>Other Titles</h1>
				<ul>
						<?php
							$do_not_duplicate = null;
							$args = array(
								'post_type' => 'title_page',
								'showposts' => 5,
								/*'order' => 'ASC',
								'orderby' => 'title'*/
								'orderby' => 'rand'
							);
							$othertitles_query = new WP_Query( $args );
							while ( $othertitles_query->have_posts() ) : $othertitles_query->the_post();
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
				<?php endif; // end of repeater loop. ?>
		</aside>
				
		
		
		
		<div id="content" class="site-content main-content" role="main">
		
			<header class="article-header">
				<h1><?php the_title(); ?></h1>
				<?php the_post_thumbnail(); ?>
			</header>
			
			<ul class="vital-statistics">
				<?php if( get_field( 'year' ) ): ?>
				<li><strong>Year:</strong> <?php the_field( 'year' ); ?></li>
				<?php endif; // end of repeater loop. ?>
				
				<?php if( get_field( 'people' ) ): ?>
				<li class="cast-list"><strong>Cast:</strong>
					<?php while( has_sub_field( 'people' ) ): ?>
						<span><?php the_sub_field( 'person' ); ?></span>
						<span class="spacer">&nbsp;/&nbsp;</span>
					<?php endwhile; ?>
				</li>
				<?php endif; // end of repeater loop. ?>
			</ul>
			
			<?php get_template_part( 'content' ); ?>
			
			
			
			
			

		<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
		
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>