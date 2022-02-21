<?php
/**
 * Display lessons of a Sensei course
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
			'name'            => 'bfs_course_lessons',
			'title'           => esc_html__( 'Course lessons', 'beflex-child' ),
			'description'     => esc_html__( 'Display lessons associated to a course', 'beflex-child' ),
			'category'        => 'beflex',
			'mode'            => 'preview',
			'icon'            => '<svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="true" focusable="false"><path d="M4 4v1.5h16V4H4zm8 8.5h8V11h-8v1.5zM4 20h16v-1.5H4V20zm4-8c0-1.1-.9-2-2-2s-2 .9-2 2 .9 2 2 2 2-.9 2-2z"></path></svg>',
			'keywords'        => array( 'beflex', 'sensei', 'bfs', 'block', 'lessons', 'count', 'course' ),
			'render_callback' => 'bfs_course_lessons_render_callback',
			'enqueue_assets'  => function() {
				wp_enqueue_style( 'block-bfs-course-lessons-style', get_stylesheet_directory_uri() . '/inc/blocks/bfs-course-lessons/assets/css/style.min.css' );
//				wp_enqueue_script( 'block-bfs-course-lessons-script', get_stylesheet_directory_uri() . '/inc/blocks/bf-process/assets/js/bf-process.js', array('jquery'), '', true );
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
function bfs_course_lessons_render_callback( $block, $content = '', $is_preview = false, $post_id = 0 ) {
	include get_template_directory() . '/inc/blocks/bfs-course-lessons/view.php';
}
