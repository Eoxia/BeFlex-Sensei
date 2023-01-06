<?php
/**
 * Display percentage of completion of a Sensei course
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
			'name'            => 'bfs_course_completion',
			'title'           => esc_html__( 'Course completion', 'beflex-child' ),
			'description'     => esc_html__( 'Display completion length of a course', 'beflex-child' ),
			'category'        => 'beflex',
			'mode'            => 'preview',
			'icon'            => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M464 64C490.5 64 512 85.49 512 112V176C512 202.5 490.5 224 464 224H48C21.49 224 0 202.5 0 176V112C0 85.49 21.49 64 48 64H464zM448 128H320V160H448V128zM464 288C490.5 288 512 309.5 512 336V400C512 426.5 490.5 448 464 448H48C21.49 448 0 426.5 0 400V336C0 309.5 21.49 288 48 288H464zM192 352V384H448V352H192z"/></svg>',
			'keywords'        => array( 'beflex', 'sensei', 'bfs', 'block', 'time', 'completion', 'course' ),
			'render_callback' => 'bfs_course_completion_render_callback',
			'enqueue_assets'  => function() {
				wp_enqueue_style( 'block-bfs-course-completion-style', get_template_directory_uri() . '/inc/blocks/bfs-course-completion/assets/css/style.min.css' );
//				wp_enqueue_script( 'block-bfs-course-completion-script', get_template_directory_uri() . '/inc/blocks/bfs-course-completion/assets/js/bf-process.js', array('jquery'), '', true );
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
function bfs_course_completion_render_callback( $block, $content = '', $is_preview = false, $post_id = 0 ) {
	include get_template_directory() . '/inc/blocks/bfs-course-completion/view.php';
}
