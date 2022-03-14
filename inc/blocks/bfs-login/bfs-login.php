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
            'name'            => 'bfs_login',
            'title'           => esc_html__( 'Sensei login navigation', 'beflex-child' ),
            'description'     => esc_html__( 'Display login and profile link', 'beflex-child' ),
            'category'        => 'beflex',
            'mode'            => 'preview',
            'icon'            => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M416 32h-64c-17.67 0-32 14.33-32 32s14.33 32 32 32h64c17.67 0 32 14.33 32 32v256c0 17.67-14.33 32-32 32h-64c-17.67 0-32 14.33-32 32s14.33 32 32 32h64c53.02 0 96-42.98 96-96V128C512 74.98 469 32 416 32zM342.6 233.4l-128-128c-12.51-12.51-32.76-12.49-45.25 0c-12.5 12.5-12.5 32.75 0 45.25L242.8 224H32C14.31 224 0 238.3 0 256s14.31 32 32 32h210.8l-73.38 73.38c-12.5 12.5-12.5 32.75 0 45.25s32.75 12.5 45.25 0l128-128C355.1 266.1 355.1 245.9 342.6 233.4z"/></svg>',
            'keywords'        => array( 'beflex', 'sensei', 'bfs', 'block', 'time', 'length', 'course' ),
            'render_callback' => 'bfs_login_render_callback',
            'enqueue_assets'  => function() {
                wp_enqueue_style( 'block-bfs-login-style', get_stylesheet_directory_uri() . '/inc/blocks/bfs-login/assets/css/style.min.css' );
//				wp_enqueue_script( 'block-bfs-login-script', get_stylesheet_directory_uri() . '/inc/blocks/bfs-login/assets/js/bf-login.js', array('jquery'), '', true );
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
function bfs_login_render_callback( $block, $content = '', $is_preview = false, $post_id = 0 ) {
    include get_template_directory() . '/inc/blocks/bfs-login/view.php';
}
