<?php
/**
 * course-time
 *
 * @author Eoxia <contact@eoxia.com>
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @since 4.0.0
 * @package beflex-child
 *
 */

if ( ! defined( 'BFS_COURSE_TIME_DIR' ) ) {
    define( 'BFS_COURSE_TIME_DIR', dirname(__DIR__, 1) . '/bfs-course-time' );
}
if ( ! defined( 'BFS_COURSE_TIME_URL' ) ) {
    define( 'BFS_COURSE_TIME_URL', get_template_directory_uri() . '/inc/blocks/bfs-course-time' );
}

/**
 * Generate block
 *
 * @return void
 */
function bfs_course_time_register_acf_blocks() {
    wp_register_style( 'block-bfs-course-time-style', BFS_COURSE_TIME_URL . '/assets/css/style.min.css' );
    wp_register_script( 'block-bfs-course-time-script', BFS_COURSE_TIME_URL . '/assets/js/bfs-course-time.js', array('jquery'), '', true );
    register_block_type( BFS_COURSE_TIME_DIR . '/assets/json/' );
}
add_action( 'init', 'bfs_course_time_register_acf_blocks', 5 );

/**
 * Load Json fields
 *
 * @param array $paths Json path
 *
 * @return array $paths Json path
 */
function bfs_course_time_load_json( $paths ) {
    $paths[] = BFS_COURSE_TIME_DIR . '/assets/json';
    return $paths;
}
add_filter( 'acf/settings/load_json', 'bfs_course_time_load_json' );
