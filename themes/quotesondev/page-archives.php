<?php
/**
 * The template for displaying all pages.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
				<div class="quote-authors" >
					<h3>Quote Authors</h3>
					<?php 
						$args = array('post_type' => 'post', 'numberposts' => '100');
						$news_posts = get_posts($args); 
						if (! empty($news_posts)) :
						 foreach($news_posts as $post) : setup_postdata($post); ?>
						<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title();?></a>
					<?php endforeach; wp_reset_postdata(); ?>
					<?php endif; ?>

					<!-- <h3>Categories</h3>	
						 -->
					<div class="archives-table">
						<ul class="archives-cat">

							<?php wp_list_categories(); ?>

						</ul>
					</div>
					<div class="archives-tags">
						<h3>Tags</h3>
						<?php 
						$args = array('post_type' => 'post', 'numberposts' => '100');
						$news_posts = get_posts($args); 
						if (! empty($news_posts)) :
							foreach($news_posts as $post) : setup_postdata($post); ?>
						<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_tags('', ', ');?></a>
						<?php endforeach; wp_reset_postdata(); ?>
						<?php endif; ?>
					</div>
					
				</div>
				<div id="archives-container">
					<div id="archives-authors"></div>
					<div id="archives-categories"></div>
					<div id="archives-tags"></div>

				</div>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
