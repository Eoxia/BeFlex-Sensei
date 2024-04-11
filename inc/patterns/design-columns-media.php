<?php
/**
 * Three columns with media
 */
return array(
	'title'      => esc_html__('Columns width rounded media and text', 'beflex'),
	'categories' => array('design'),
	'keywords'   => array( 'beflex', 'design' ),
	'content'    => '<!-- wp:columns -->
					<div class="wp-block-columns"><!-- wp:column -->
					<div class="wp-block-column"><!-- wp:heading {"textAlign":"center"} -->
					<h2 class="has-text-align-center">Title</h2>
					<!-- /wp:heading -->

					<!-- wp:image {"align":"center","sizeSlug":"thumbnail","linkDestination":"none","className":"is-style-rounded"} -->
					<div class="wp-block-image is-style-rounded"><figure class="aligncenter size-thumbnail"><img src="' . esc_url( get_theme_file_uri( 'assets/images/thumbnail.jpg' ) ) . '" alt=""/></figure></div>
					<!-- /wp:image -->

					<!-- wp:paragraph {"align":"center"} -->
					<p class="has-text-align-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ligula mi, dictum vel scelerisque.</p>
					<!-- /wp:paragraph -->

					<!-- wp:buttons {"contentJustification":"center"} -->
					<div class="wp-block-buttons is-content-justification-center"><!-- wp:button -->
					<div class="wp-block-button"><a class="wp-block-button__link">Button link</a></div>
					<!-- /wp:button --></div>
					<!-- /wp:buttons --></div>
					<!-- /wp:column -->

					<!-- wp:column -->
					<div class="wp-block-column"><!-- wp:heading {"textAlign":"center"} -->
					<h2 class="has-text-align-center">Title</h2>
					<!-- /wp:heading -->

					<!-- wp:image {"align":"center","sizeSlug":"thumbnail","linkDestination":"none","className":"is-style-rounded"} -->
					<div class="wp-block-image is-style-rounded"><figure class="aligncenter size-thumbnail"><img src="' . esc_url( get_theme_file_uri( 'assets/images/thumbnail.jpg' ) ) . '" alt=""/></figure></div>
					<!-- /wp:image -->

					<!-- wp:paragraph {"align":"center"} -->
					<p class="has-text-align-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ligula mi, dictum vel scelerisque.</p>
					<!-- /wp:paragraph -->

					<!-- wp:buttons {"contentJustification":"center"} -->
					<div class="wp-block-buttons is-content-justification-center"><!-- wp:button -->
					<div class="wp-block-button"><a class="wp-block-button__link">Button link</a></div>
					<!-- /wp:button --></div>
					<!-- /wp:buttons --></div>
					<!-- /wp:column -->

					<!-- wp:column -->
					<div class="wp-block-column"><!-- wp:heading {"textAlign":"center"} -->
					<h2 class="has-text-align-center">Title</h2>
					<!-- /wp:heading -->

					<!-- wp:image {"align":"center","sizeSlug":"thumbnail","linkDestination":"none","className":"is-style-rounded"} -->
					<div class="wp-block-image is-style-rounded"><figure class="aligncenter size-thumbnail"><img src="' . esc_url( get_theme_file_uri( 'assets/images/thumbnail.jpg' ) ) . '" alt=""/></figure></div>
					<!-- /wp:image -->

					<!-- wp:paragraph {"align":"center"} -->
					<p class="has-text-align-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ligula mi, dictum vel scelerisque.</p>
					<!-- /wp:paragraph -->

					<!-- wp:buttons {"contentJustification":"center"} -->
					<div class="wp-block-buttons is-content-justification-center"><!-- wp:button -->
					<div class="wp-block-button"><a class="wp-block-button__link">Button link</a></div>
					<!-- /wp:button --></div>
					<!-- /wp:buttons --></div>
					<!-- /wp:column --></div>
					<!-- /wp:columns -->',
);
