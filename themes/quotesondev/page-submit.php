<?php
/**
 * The template for displaying all pages.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="admin-submit-quote">
				<h3>Submit a Quote</h3>
				<?php if (current_user_can('administrator')) : ?>
					<h5>Author of Quote</h5>
						<input type="text" name="title" placeholder="Author">
					<h5>Quote</h5>
						<textarea name="quote-content" placeholder="Quote Content"></textarea>
					<h5>Where did you find this quote?(eg. book name)</h5>
						<textarea name="source-content" placeholder="Source"></textarea>
					<h5>Provide the URL of the quote source, if available.</h5>
						<textarea name="source-url" placeholder="Source URL"></textarea>
					<button id="quick-add-button">Submit Quote</button>
					<?php else : ?>
						<p class="not-logged-in">Sorry, you must be logged in to submit a quote!</p>
				<?php endif; ?>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
