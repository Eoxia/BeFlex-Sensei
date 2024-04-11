<?php
/**
 * block TEMP
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
			'name'            => 'bfs_course_signup',
			'title'           => esc_html__( 'Sensei Course signup', 'beflex' ),
			'description'     => esc_html__( 'Display button to take course', 'beflex' ),
			'category'        => 'beflex',
			'mode'            => 'preview',
			'icon'            => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M366.2 256H400C461.9 256 512 306.1 512 368C512 388.9 498.6 406.7 480 413.3V464C480 490.5 458.5 512 432 512H80C53.49 512 32 490.5 32 464V413.3C13.36 406.7 0 388.9 0 368C0 306.1 50.14 256 112 256H145.8C175.7 256 200 231.7 200 201.8C200 184.3 190.8 168.5 180.1 154.8C167.5 138.5 160 118.1 160 96C160 42.98 202.1 0 256 0C309 0 352 42.98 352 96C352 118.1 344.5 138.5 331.9 154.8C321.2 168.5 312 184.3 312 201.8C312 231.7 336.3 256 366.2 256zM416 416H96V448H416V416z"/></svg>',
			'keywords'        => array( 'beflex', 'sensei', 'bfs', 'block', 'course', 'take', 'signup' ),
			'render_callback' => 'bfs_course_signup_render_callback',
			'enqueue_assets'  => function() {
//				wp_enqueue_style( 'block-bfs-course-signup-style', get_template_directory_uri() . '/inc/blocks/bfs-course-signup/assets/css/style.min.css' );
//				wp_enqueue_script( 'block-bfs-course-signup-script', get_template_directory_uri() . '/inc/blocks/bfs-course-signup/assets/js/bf-login.js', array('jquery'), '', true );
			}
		)
	);
}


/**
 * Login Block Callback Function.
 *
 * @param   array  $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool   $is_preview True during AJAX preview.
 * @param   int    $post_id The post ID this block is saved to.
 */
function bfs_course_signup_render_callback( $block, $content = '', $is_preview = false, $post_id = 0 ) {
	include get_template_directory() . '/inc/blocks/bfs-course-signup/view.php';
}
