<?php
/**
 * Query loop block, Standard design with button
 */

return array(
	'title'      => esc_html__( 'Call To Action - Standard', 'beflex' ),
	'blockTypes' => array( 'core/query' ),
	'categories' => array( 'query' ),
	'keywords'   => array( 'beflex', 'query' ),
	'content'    => '<!-- wp:query {"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","categoryIds":[],"tagIds":[],"order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"displayLayout":{"type":"flex","columns":2}} -->
					<div class="wp-block-query"><!-- wp:post-template -->
					<!-- wp:post-featured-image {"isLink":true,"align":"wide"} /-->

					<!-- wp:post-title {"isLink":true} /-->

					<!-- wp:post-excerpt {"moreText":"Lire la suite","className":"wp-button"} /-->
					<!-- /wp:post-template --></div>
					<!-- /wp:query -->',
);
