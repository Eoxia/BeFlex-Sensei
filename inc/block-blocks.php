<?php
/**
 * Blocks added to theme
 *
 * @package Beflex
 * @since 4.0.0
 */

function beflex_acf_blocks_init() {
	require get_template_directory() . '/inc/blocks/bfs-course-tax/bfs-course-tax.php';
	require get_template_directory() . '/inc/blocks/bfs-course-lessons/bfs-course-lessons.php';
	require get_template_directory() . '/inc/blocks/bfs-course-time/bfs-course-time.php';
	require get_template_directory() . '/inc/blocks/bfs-course-completion/bfs-course-completion.php';
	require get_template_directory() . '/inc/blocks/bfs-login/bfs-login.php';
	require get_template_directory() . '/inc/blocks/bfs-course-signup/bfs-course-signup.php';
}
add_action( 'acf/init', 'beflex_acf_blocks_init' );

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
