<?php
/**
 * Image and content with background
 */
return array(
	'title'      => esc_html__('Image and content with background', 'beflex'),
	'categories' => array('design'),
	'keywords'   => array( 'beflex', 'design' ),
	'content'    => '<!-- wp:media-text {"mediaType":"image","mediaWidth":60,"verticalAlignment":"center","imageFill":false,"backgroundColor":"caribbean"} -->
					<div class="wp-block-media-text alignwide is-stacked-on-mobile is-vertically-aligned-center has-caribbean-background-color has-background" style="grid-template-columns:60% auto"><figure class="wp-block-media-text__media"><img src="' . esc_url( get_theme_file_uri( 'assets/images/paysage.jpg' ) ) . '" alt=""/></figure><div class="wp-block-media-text__content"><!-- wp:heading -->
					<h2>Title</h2>
					<!-- /wp:heading -->

					<!-- wp:paragraph -->
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ligula mi, dictum vel scelerisque.</p>
					<!-- /wp:paragraph -->

					<!-- wp:buttons -->
					<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"galaxy"} -->
					<div class="wp-block-button"><a class="wp-block-button__link has-galaxy-background-color has-background">Button link</a></div>
					<!-- /wp:button --></div>
					<!-- /wp:buttons --></div></div>
					<!-- /wp:media-text -->',
);
