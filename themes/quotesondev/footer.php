<?php
/**
 * The template for displaying the footer.
 *
 * @package QOD_Starter_Theme
 */

?>

			</div><!-- #content -->

			<footer id="colophon" class="site-footer" role="contentinfo">
				<nav id="site-navigation" class="main-navigation" role="navigation">
					
					<div class="about"><a href="http://localhost:3000/project5-quotes-on-dev/wordpress/about/" rel="bookmark">About</a></div>
					<div class="archives"><a href="http://localhost:3000/project5-quotes-on-dev/wordpress/archives/" rel="bookmark">Archives</a></div>
					<div class="submit"><a href="http://localhost:3000/project5-quotes-on-dev/wordpress/submit/" rel="bookmark">Submit a Quote</a></div>																				
					<div class="header-search"><?php get_search_form();?></div>
				</nav><!-- #site-navigation -->
				<div class="site-info">
					<a href="<?php echo esc_url( 'https://wordpress.org/' ); ?>"><?php printf( esc_html( 'Brought to you by %s' ), 'Gazsix' ); ?></a>
				</div><!-- .site-info -->
			</footer><!-- #colophon -->
		</div><!-- #page -->

		<?php wp_footer(); ?>

	</body>
</html>
