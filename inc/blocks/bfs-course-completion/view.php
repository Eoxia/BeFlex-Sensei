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
	esc_html_e( 'Display course completion', 'beflex' );
	return;
endif;

if ( 'course' != get_post_type( get_the_ID() ) ) :
	return;
endif;

$classes = 'bfs-course-completion';
if ( !empty( $block['className'] ) ) :
	$classes .= sprintf( ' %s', $block['className'] );
endif;
if ( !empty( $block['align'] ) ) :
	$classes .= sprintf( ' align%s', $block['align'] );
endif;

$completed     = count( Sensei()->course->get_completed_lesson_ids( get_the_ID(), get_current_user_id() ) );
$total_lessons = Sensei()->course->course_lesson_count( get_the_ID() );
$percentage    = Sensei_Utils::quotient_as_absolute_rounded_percentage( $completed, $total_lessons, 2 );
$classes .= sprintf(' progress-%s', ! empty( esc_attr( $percentage ) ) ? esc_attr( $percentage ) : '0' );

?>
<div class="<?php echo esc_attr( $classes ); ?>">
	<div class="bfs-course-completion__progress-bar" style="width: <?php echo esc_attr( $percentage ); ?>%"></div>
</div>

