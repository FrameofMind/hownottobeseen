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
				<h1>Featured Works</h1>
				<ul>
					<?php if( get_field( 'related_pages' ) ): ?>
						<?php while( has_sub_field( 'related_pages' ) ): ?>
							<li>
								<a class="title-link" href="<?php the_sub_field( 'page_link' ); ?>">
									<h2><?php the_sub_field( 'page_title' ); ?></h2>
									<div class="masked-image-wrapper">
										<div class="image-mask"></div>
										<img src="<?php the_sub_field( 'page_image' ); ?>" alt="works tab" />
									</div>
								</a>
							</li>
						<?php endwhile; ?>
					<?php endif; // end of repeater loop. ?>
				</ul>
		</aside>
		
		
		
		<div id="content" class="site-content main-content" role="main">
		
			<header class="article-header">
				<h1><?php the_title(); ?></h1>
				<?php the_post_thumbnail(); ?>
			</header>
			
			<ul class="vital-statistics">
				<li><strong>Date of Birth:</strong> <?php the_field( 'date_of_birth' ); ?></li>
				<li><strong>Most Famous For:</strong> <?php the_field( 'most_famous_for' ); ?></li>
			</ul>
					
			<h2>My Thoughts</h2>
			<?php get_template_part( 'content' ); ?>
			
			<h2>Strengths</h2>
				<?php the_field( 'strengths' ); ?>
					
			<h2>Weaknesses</h2>
				<?php the_field( 'weaknesses' ); ?>
			
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
						
				<?php if( get_field('filmography') ): ?>
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
				<?php endif; // end of filmography repeater loop. ?>
				</table><!-- .filmography -->
			

		<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
		
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>