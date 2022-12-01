<?php
/**
 * View of BFS Course time
 *
 * @author Eoxia <contact@eoxia.com>
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @since 2.0.0
 * @package beflex-sensei
 *
 */

// That block only works with courses custom post types.
if ( is_admin() ) :
	esc_html_e( 'Display course time', 'beflex' );
	return;
endif;

if ( 'course' != get_post_type( get_the_ID() ) ) :
	return;
endif;

$classes = 'bfs-course-time';
if ( !empty( $block['className'] ) ) :
	$classes .= sprintf( ' %s', $block['className'] );
endif;
if ( !empty( $block['align'] ) ) :
	$classes .= sprintf( ' align%s', $block['align'] );
endif;

$lesson_time = beflex_get_course_length( get_the_ID() );

if ( ! empty( $lesson_time ) ) :
	?>
	<div class="<?php echo esc_attr( $classes ); ?>">
		<?php
		echo sprintf(
			'<img src="%1$s" class="bfs-course-lessons__icon" /> <span>%2$s %3$s</span>',
			esc_url( get_stylesheet_directory_uri() . '/inc/blocks/bfs-course-time/assets/images/clock-regular.svg' ),
			esc_html( $lesson_time ),
			esc_html__( 'min', 'beflex' )
		);
		?>
	</div>
<?php
endif;
