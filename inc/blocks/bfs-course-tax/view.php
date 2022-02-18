<?php
/**
 * View of BFS Course tax
 *
 * @author Eoxia <contact@eoxia.com>
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @since 2.0.0
 * @package beflex-sensei
 *
 */

// That block only works with courses custom post types.
if ( 'course' != get_post_type( get_the_ID() ) ) {
	if ( is_admin() ) {
		$class = 'notice notice-warning';
		$message = __( 'Use this block only in CPT Course', 'beflex-sensei' );
		printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) );
	}

	return;
}

$classes = '';
if ( !empty( $block['className'] ) ) :
	$classes .= sprintf( ' %s', $block['className'] );
endif;

echo '<pre>'; print_r( get_the_term_list( get_the_ID(), 'course-category', '', ', ', '' ) ); echo '</pre>';


?>

<div class="bfs-course-tax <?php echo esc_attr( $classes ); ?>">
Coucou
</div>
