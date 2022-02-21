<?php
/**
 * Query loop block, Standard design for courses post type
 */

return array(
	'title'      => esc_html__( 'Sensei course grid', 'beflex' ),
	'blockTypes' => array( 'core/query' ),
	'categories' => array( 'query' ),
	'keywords'   => array( 'beflex', 'query', 'sensei' ),
	'content'    => '<!-- wp:query {"queryId":28,"query":{"perPage":3,"pages":0,"offset":0,"postType":"course","categoryIds":[],"tagIds":[],"order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"displayLayout":{"type":"flex","columns":3}} -->
					<div class="wp-block-query"><!-- wp:post-template -->
					<!-- wp:group {"align":"wide","style":{"border":{"width":"1px","style":"solid","color":"#c5c5c5"}}} -->
					<div class="wp-block-group alignwide has-border-color" style="border-color:#c5c5c5;border-style:solid;border-width:1px"><!-- wp:post-featured-image {"isLink":true,"align":"wide"} /-->

					<!-- wp:group {"style":{"spacing":{"padding":{"top":"0em","right":"1em","bottom":"0em","left":"1em"}}}} -->
					<div class="wp-block-group" style="padding-top:0em;padding-right:1em;padding-bottom:0em;padding-left:1em"><!-- wp:acf/bfs-course-tax {"id":"block_620f754cd4688","name":"acf/bfs-course-tax","mode":"preview"} /-->

					<!-- wp:post-title {"level":3,"isLink":true,"style":{"typography":{"fontSize":"18px"},"elements":{"link":{"color":{"text":"var:preset|color|black"}}},"spacing":{"margin":{"top":"0.2em","right":"0em","bottom":"0em","left":"0em"}}}} /--></div>
					<!-- /wp:group -->

					<!-- wp:group {"style":{"spacing":{"padding":{"right":"1em","left":"1em"}}},"layout":{"type":"flex","allowOrientation":false}} -->
					<div class="wp-block-group" style="padding-right:1em;padding-left:1em"><!-- wp:acf/bfs-course-lessons {"id":"block_62135d026ee1c","name":"acf/bfs-course-lessons","align":"","mode":"preview"} /-->

					<!-- wp:acf/bfs-course-time {"id":"block_6213647fe09d6","name":"acf/bfs-course-time","align":"","mode":"preview"} /--></div>
					<!-- /wp:group -->

					<!-- wp:acf/bfs-course-completion {"id":"block_62136adee5fc0","name":"acf/bfs-course-completion","data":{},"align":"","mode":"preview"} /--></div>
					<!-- /wp:group -->
					<!-- /wp:post-template --></div>
					<!-- /wp:query -->',
);
