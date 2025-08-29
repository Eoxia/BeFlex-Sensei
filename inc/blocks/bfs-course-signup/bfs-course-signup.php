<?php
/**
 * course-signup
 *
 * @author Eoxia <contact@eoxia.com>
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @since 4.0.0
 * @package beflex-child
 *
 */

if ( ! defined( 'BFS_COURSE_SIGNUP_DIR' ) ) {
    define( 'BFS_COURSE_SIGNUP_DIR', dirname(__DIR__, 1) . '/bfs-course-signup' );
}
if ( ! defined( 'BFS_COURSE_SIGNUP_URL' ) ) {
    define( 'BFS_COURSE_SIGNUP_URL', get_template_directory_uri() . '/inc/blocks/bfs-course-signup' );
}

/**
 * Generate block
 *
 * @return void
 */
function bfs_course_signup_register_acf_blocks() {
    wp_register_style( 'block-bfs-course-signup-style', BFS_COURSE_SIGNUP_URL . '/assets/css/style.min.css' );
//    wp_register_script( 'block-bfs-course-signup-script', BFS_COURSE_SIGNUP_URL . '/assets/js/bfs-course-signup.js', array('jquery'), '', true );
    register_block_type( BFS_COURSE_SIGNUP_DIR . '/assets/json/' );
}
add_action( 'init', 'bfs_course_signup_register_acf_blocks', 5 );

/**
 * Load Json fields
 *
 * @param array $paths Json path
 *
 * @return array $paths Json path
 */
function bfs_course_signup_load_json( $paths ) {
    $paths[] = BFS_COURSE_SIGNUP_DIR . '/assets/json';
    return $paths;
}
add_filter( 'acf/settings/load_json', 'bfs_course_signup_load_json' );
