<?php
/**
 * Query loop block, Thumbnail in background
 */

return array(
	'title'      => esc_html__( 'Call To Action - Background', 'beflex' ),
	'blockTypes' => array( 'core/query' ),
	'categories' => array( 'query' ),
	'keywords'   => array( 'beflex', 'query' ),
	'content'    => '<!-- wp:query {"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","categoryIds":[],"tagIds":[],"order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"displayLayout":{"type":"flex","columns":2}} -->
					<div class="wp-block-query"><!-- wp:post-template -->
					<!-- wp:cover {"overlayColor":"black","align":"center","className":"query-background"} -->
					<div class="wp-block-cover aligncenter query-background"><span aria-hidden="true" class="has-black-background-color has-background-dim-100 wp-block-cover__gradient-background has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:post-featured-image {"align":"wide"} /-->

					<!-- wp:post-title {"textAlign":"center","isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}}} /-->

					<!-- wp:post-excerpt {"textAlign":"center","moreText":"Lire la suite","className":"wp-button"} /--></div></div>
					<!-- /wp:cover -->
					<!-- /wp:post-template --></div>
					<!-- /wp:query -->',
);
