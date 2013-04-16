<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package hownottobeseen
 */
?>
	<div id="secondary" class="widget-area featured-items" role="complementary">
		
		<h1>Featured</h1>
			
		<?php
			$posts = get_posts(array(
				'numberposts' => -1,
				'category' => 3,
			));
		?>
	
		<?php while ( have_posts() ) : the_post(); ?>
		
			<?php if( get_field('featured_links') ): ?>
				<?php while( has_sub_field('featured_links') ): ?>
				
				<ul>
					<li>
						<a class="title-link" href="<?php the_sub_field('page_link'); ?>">
							<h2><?php the_sub_field('page_title'); ?></h2>
							<img src="<?php the_sub_field('page_image'); ?>" alt="works tab" />
						</a>
					</li>
				</ul>
				
				<?php endwhile; ?>
			<?php endif; // end of repeater loop. ?>
		
		<?php endwhile; // end of the loop. ?>
		
		
		
		
		
		
		
		
		
		
	</div><!-- #secondary -->
