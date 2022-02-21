<?php
/**
 * Display taxonomies of a Sensei course
 *
 * @author Eoxia <contact@eoxia.com>
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @since 3.0.0
 * @package beflex-child
 *
 */

if ( function_exists( 'acf_register_block_type' ) ) {
	acf_register_block_type(
		array(
			'name'            => 'bfs_course_tax',
			'title'           => esc_html__( 'Course categories', 'beflex-child' ),
			'description'     => esc_html__( 'Display categories associated to a course', 'beflex-child' ),
			'category'        => 'beflex',
			'mode'            => 'preview',
			'icon'            => '<svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="true" focusable="false"><path d="M20 4H4v1.5h16V4zm-2 9h-3c-1.1 0-2 .9-2 2v3c0 1.1.9 2 2 2h3c1.1 0 2-.9 2-2v-3c0-1.1-.9-2-2-2zm.5 5c0 .3-.2.5-.5.5h-3c-.3 0-.5-.2-.5-.5v-3c0-.3.2-.5.5-.5h3c.3 0 .5.2.5.5v3zM4 9.5h9V8H4v1.5zM9 13H6c-1.1 0-2 .9-2 2v3c0 1.1.9 2 2 2h3c1.1 0 2-.9 2-2v-3c0-1.1-.9-2-2-2zm.5 5c0 .3-.2.5-.5.5H6c-.3 0-.5-.2-.5-.5v-3c0-.3.2-.5.5-.5h3c.3 0 .5.2.5.5v3z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>',
			'keywords'        => array( 'beflex', 'sensei', 'bfs', 'block', 'categories', 'taxonomies', 'course' ),
			'render_callback' => 'bfs_course_tax_render_callback',
			'enqueue_assets'  => function() {
				wp_enqueue_style( 'block-bfs-course-tax-style', get_stylesheet_directory_uri() . '/inc/blocks/bfs-course-tax/assets/css/style.min.css' );
//				wp_enqueue_script( 'block-bf-process-script', get_stylesheet_directory_uri() . '/inc/blocks/bf-process/assets/js/bf-process.js', array('jquery'), '', true );
			}
		)
	);
}


/**
 * Diaporama Block Callback Function.
 *
 * @param   array  $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool   $is_preview True during AJAX preview.
 * @param   int    $post_id The post ID this block is saved to.
 */
function bfs_course_tax_render_callback( $block, $content = '', $is_preview = false, $post_id = 0 ) {
	include get_template_directory() . '/inc/blocks/bfs-course-tax/view.php';
}
