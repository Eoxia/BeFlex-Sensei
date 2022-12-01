<?php
/**
 * Query loop block, Standard design for courses post type
 */

return array(
	'title'       => esc_html__( 'Sensei course grid', 'beflex' ),
	'blockTypes'  => array( 'core/query' ),
	'categories'  => array( 'query' ),
	'keywords'    => array( 'beflex', 'query', 'sensei' ),
	'description' => 'course-list-element',
	'content'     => '<!-- wp:query {"queryId":28,"query":{"perPage":3,"pages":0,"offset":0,"postType":"course","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"displayLayout":{"type":"flex","columns":3},"className":"query-course"} -->
					<div class="wp-block-query query-course wp-block-sensei-lms-course-list"><!-- wp:post-template -->
					<!-- wp:group {"align":"wide","style":{"border":{"width":"1px","style":"solid","color":"#c5c5c5"}}} -->
					<div class="wp-block-group alignwide has-border-color" style="border-color:#c5c5c5;border-style:solid;border-width:1px"><!-- wp:post-featured-image {"isLink":true,"align":"wide"} /-->

					<!-- wp:group {"style":{"spacing":{"padding":{"top":"0em","right":"1em","bottom":"0em","left":"1em"}}}} -->
					<div class="wp-block-group" style="padding-top:0em;padding-right:1em;padding-bottom:0em;padding-left:1em"><!-- wp:sensei-lms/course-categories {"options":{}} -->
					<div class="wp-block-sensei-lms-course-categories"></div>
					<!-- /wp:sensei-lms/course-categories -->

					<!-- wp:post-title {"level":3,"isLink":true,"style":{"typography":{"fontSize":"18px"},"elements":{"link":{"color":{"text":"var:preset|color|black"}}},"spacing":{"margin":{"top":"0.2em","right":"0em","bottom":"0em","left":"0em"}}}} /--></div>
					<!-- /wp:group -->

					<!-- wp:group {"style":{"spacing":{"padding":{"right":"1em","left":"1em"}}},"layout":{"type":"flex","allowOrientation":false}} -->
					<div class="wp-block-group" style="padding-right:1em;padding-left:1em"><!-- wp:acf/bfs-course-lessons {"name":"acf/bfs-course-lessons","data":{},"mode":"preview"} /-->

					<!-- wp:acf/bfs-course-time {"name":"acf/bfs-course-time","mode":"preview"} /--></div>
					<!-- /wp:group -->

					<!-- wp:sensei-lms/course-progress {"customBarColor":"#1be184","defaultBarColor":"primary","height":10,"borderRadius":0} /--></div>
					<!-- /wp:group -->
					<!-- /wp:post-template -->
					<!-- wp:query-pagination {"paginationArrow":"arrow","align":"wide","layout":{"type":"flex","justifyContent":"center"}} -->
					<!-- wp:query-pagination-previous {"label":"","fontSize":"small"} /-->

					<!-- wp:query-pagination-numbers /-->

					<!-- wp:query-pagination-next {"label":" ","fontSize":"small"} /-->
					<!-- /wp:query-pagination --></div>
					<!-- /wp:query -->',
);
