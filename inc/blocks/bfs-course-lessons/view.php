<?php
/**
 * View of BFS Course lessons
 *
 * @author Eoxia <contact@eoxia.com>
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @since 2.0.0
 * @package beflex-sensei
 *
 */

// That block only works with courses custom post types.
if ( is_admin() ) :
	esc_html_e( 'Display course lessons', 'beflex-child' );
	return;
endif;

if ( 'course' != get_post_type( get_the_ID() ) ) :
	return;
endif;

$classes = 'bfs-course-lessons';
if ( !empty( $block['className'] ) ) :
	$classes .= sprintf( ' %s', $block['className'] );
endif;
if ( !empty( $block['align'] ) ) :
	$classes .= sprintf( ' align%s', $block['align'] );
endif;

$lesson_count = Sensei()->course->course_lesson_count( get_the_ID() );

if ( ! empty( $lesson_count ) ) :
	?>
	<div class="<?php echo esc_attr( $classes ); ?>">
		<?php
		echo sprintf(
			'<i class="fa-solid fa-list-check"></i> %1$s %2$s',
			esc_html( $lesson_count ),
			esc_html__( 'lessons', 'beflex-child' )
		);
		?>
	</div>
	<?php
endif;
