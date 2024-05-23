<?php
/**
 * login
 *
 * @author Eoxia <contact@eoxia.com>
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @since 4.0.0
 * @package beflex-child
 *
 */

if ( ! defined( 'BFS_LOGIN_DIR' ) ) {
    define( 'BFS_LOGIN_DIR', dirname(__DIR__, 1) . '/bfs-login' );
}
if ( ! defined( 'BFS_LOGIN_URL' ) ) {
    define( 'BFS_LOGIN_URL', get_stylesheet_directory_uri() . '/inc/blocks/bfs-login' );
}

/**
 * Generate block
 *
 * @return void
 */
function bfs_login_register_acf_blocks() {
    wp_register_style( 'block-bfs-login-style', BFS_LOGIN_URL . '/assets/css/style.min.css' );
    wp_register_script( 'block-bfs-login-script', BFS_LOGIN_URL . '/assets/js/bfs-login.js', array('jquery'), '', true );
    register_block_type( BFS_LOGIN_DIR . '/assets/json/' );
}
add_action( 'init', 'bfs_login_register_acf_blocks', 5 );

/**
 * Load Json fields
 *
 * @param array $paths Json path
 *
 * @return array $paths Json path
 */
function bfs_login_load_json( $paths ) {
    $paths[] = BFS_LOGIN_DIR . '/assets/json';
    return $paths;
}
add_filter( 'acf/settings/load_json', 'bfs_login_load_json' );
    