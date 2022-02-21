<?php
/**
 * Display time length of a Sensei course
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
			'name'            => 'bfs_course_time',
			'title'           => esc_html__( 'Course time', 'beflex-child' ),
			'description'     => esc_html__( 'Display time length of a course', 'beflex-child' ),
			'category'        => 'beflex',
			'mode'            => 'preview',
			'icon'            => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M232 120C232 106.7 242.7 96 256 96C269.3 96 280 106.7 280 120V243.2L365.3 300C376.3 307.4 379.3 322.3 371.1 333.3C364.6 344.3 349.7 347.3 338.7 339.1L242.7 275.1C236 271.5 232 264 232 255.1L232 120zM256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0zM48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48C141.1 48 48 141.1 48 256z"/></svg>',
			'keywords'        => array( 'beflex', 'sensei', 'bfs', 'block', 'time', 'length', 'course' ),
			'render_callback' => 'bfs_course_time_render_callback',
			'enqueue_assets'  => function() {
				wp_enqueue_style( 'block-bfs-course-time-style', get_stylesheet_directory_uri() . '/inc/blocks/bfs-course-time/assets/css/style.min.css' );
//				wp_enqueue_script( 'block-bfs-course-time-script', get_stylesheet_directory_uri() . '/inc/blocks/bfs-course-time/assets/js/bf-process.js', array('jquery'), '', true );
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
function bfs_course_time_render_callback( $block, $content = '', $is_preview = false, $post_id = 0 ) {
	include get_template_directory() . '/inc/blocks/bfs-course-time/view.php';
}
