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
	esc_html_e( 'Display course time', 'beflex-child' );
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
			'<i class="fa-regular fa-clock"></i> %1$s %2$s',
			esc_html( $lesson_time ),
			esc_html__( 'min', 'beflex-child' )
		);
		?>
	</div>
<?php
endif;
