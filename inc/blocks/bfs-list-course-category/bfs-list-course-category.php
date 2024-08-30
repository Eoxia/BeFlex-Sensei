<?php
/**
 * list-course-category
 *
 * @author Eoxia <contact@eoxia.com>
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @since 4.0.0
 * @package beflex-child
 *
 */

if ( ! defined( 'BFS_LIST_COURSE_CATEGORY_DIR' ) ) {
    define( 'BFS_LIST_COURSE_CATEGORY_DIR', dirname(__DIR__, 1) . '/bfs-list-course-category' );
}
if ( ! defined( 'BFS_LIST_COURSE_CATEGORY_URL' ) ) {
    define( 'BFS_LIST_COURSE_CATEGORY_URL', get_template_directory_uri() . '/inc/blocks/bfs-list-course-category' );
}

/**
 * Generate block
 *
 * @return void
 */
function bfs_list_course_category_register_acf_blocks() {
    wp_register_style( 'block-bfs-list-course-category-style', BFS_LIST_COURSE_CATEGORY_URL . '/assets/css/style.min.css' );
    register_block_type( BFS_LIST_COURSE_CATEGORY_DIR . '/assets/json/' );
}
add_action( 'init', 'bfs_list_course_category_register_acf_blocks', 5 );

/**
 * Load Json fields
 *
 * @param array $paths Json path
 *
 * @return array $paths Json path
 */
function bfs_list_course_category_load_json( $paths ) {
    $paths[] = BFS_LIST_COURSE_CATEGORY_DIR . '/assets/json';
    return $paths;
}
add_filter( 'acf/settings/load_json', 'bfs_list_course_category_load_json' );
