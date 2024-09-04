<?php
/**
 * Blocks added to theme
 *
 * @package Beflex
 * @since 4.0.0
 */

if ( class_exists( 'Sensei_Main', true ) ) {
	require get_template_directory() . '/inc/blocks/bfs-course-signup/bfs-course-signup.php';
	require get_template_directory() . '/inc/blocks/bfs-course-tax/bfs-course-tax.php';
	require get_template_directory() . '/inc/blocks/bfs-course-lesson/bfs-course-lesson.php';
	require get_template_directory() . '/inc/blocks/bfs-course-time/bfs-course-time.php';
	require get_template_directory() . '/inc/blocks/bfs-login/bfs-login.php';
	require get_template_directory() . '/inc/blocks/bfs-list-course-category/bfs-list-course-category.php';
}

/**
 * Create custom block category
 * @param $block_categories
 * @param $editor_context
 * @return mixed
 */
function beflex_create_block_category( $block_categories, $editor_context ) {
	if ( ! empty( $editor_context->post ) ) {
		array_unshift(
			$block_categories,
			array(
				'slug'  => 'beflex',
				'title' => __( 'Beflex', 'custom-plugin' ),
				'icon'  => 'admin-appearance',
			)
		);
	}
	return $block_categories;
}

add_filter( 'block_categories_all', 'beflex_create_block_category', 10, 2 );
