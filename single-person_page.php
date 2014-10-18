<?php
/**
 * The Template for displaying all Person Page type posts.
 *
 * @package hownottobeseen
 */

get_header(); ?>



	<div id="primary" class="content-area person-page">
		
		<?php while ( have_posts() ) : the_post(); ?>
		
		<aside class="featured-works">
				<?php if( get_field( 'related_titles' ) ): ?>	
				<h1>Featured Works</h1>
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
				
				<?php if( !get_field( 'related_titles' ) ): ?>
				<h1>Other People</h1>
				<ul>
						<?php
							$do_not_duplicate = null;
							$args = array(
								'post_type' => 'person_page',
								'showposts' => 5,
								/*'order' => 'ASC',
								'orderby' => 'title'*/
								'orderby' => 'rand'
							);
							$otherpeople_query = new WP_Query( $args );
							while ( $otherpeople_query->have_posts() ) : $otherpeople_query->the_post();
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
				<?php if( get_field('date_of_birth') ): ?>
					<li><strong>Date of Birth:</strong> <?php the_field( 'date_of_birth' ); ?></li>
				<?php endif; // end of repeater loop. ?>
				<?php if( get_field('most_famous_for') ): ?>
					<li><strong>Most Famous For:</strong> <?php the_field( 'most_famous_for' ); ?></li>
				<?php endif; // end of repeater loop. ?>
			</ul>
			
			<?php if( get_the_content() ): ?>
			<h2>My Thoughts</h2>
				<?php get_template_part( 'content' ); ?>
			<?php endif; // end of repeater loop. ?>
			
			<?php if( get_field('strengths') ): ?>
			<h2>Strengths</h2>
				<?php the_field( 'strengths' ); ?>
			<?php endif; // end of repeater loop. ?>
					
			<?php if( get_field('weaknesses') ): ?>
			<h2>Weaknesses</h2>
				<?php the_field( 'weaknesses' ); ?>
			<?php endif; // end of repeater loop. ?>
			
			<?php if( get_field('filmography') ): ?>
			<h2>Filmography</h2>
				<table class="filmography">
						<tr>
							<th>Year</th>
							<th>Medium</th>
							<th>Title</th>
							<th>My Rating</th>
							<th>Character</th>
							<th>Role Type</th>
						</tr>
					<?php while( has_sub_field('filmography') ): ?>
						<tr>
							<td class="year"><?php the_sub_field('year'); ?></td>
							<td class="medium"><?php the_sub_field('medium'); ?></td>
							<td class="title"><?php the_sub_field('title'); ?></td>
							<td class="rating"><?php the_sub_field('my_rating'); ?></td>
							<td class="character"><?php the_sub_field('character'); ?></td>
							<td class="role"><?php the_sub_field('role_type'); ?></td>
						</tr>
					<?php endwhile; ?>
				</table><!-- .filmography -->
			<?php endif; // end of filmography repeater loop. ?>

		<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
		
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>