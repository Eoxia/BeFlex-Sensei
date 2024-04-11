<?php
/**
 * Content-course.php template file
 *
 * responsible for content on archive like pages. Only shows the course excerpt.
 *
 * For single course content please see single-course.php
 *
 * @author      Automattic
 * @package     Sensei
 * @category    Templates
 * @version     3.13.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<li <?php post_class( Sensei_Course::get_course_loop_content_class() ); ?> >

	<?php
	/**
	 * This action runs before the sensei course content. It runs inside the sensei
	 * content-course.php template.
	 *
	 * @since 1.9
	 *
	 * @param integer $course_id
	 */
	do_action( 'sensei_course_content_before', get_the_ID() );
	?>

	<section class="course-content">

		<section class="entry">
			<?php $course_thumb = Sensei()->course->course_image( absint( get_the_ID() ), '600', '300', true ); ?>
			<?php if ( ! empty( $course_thumb ) ) : ?>
				<div class="course-thumbnail">
					<?php echo $course_thumb; ?>
				</div>
			<?php endif; ?>

			<div class="course-content-container">
				<?php $terms_list = get_the_term_list( get_the_ID(), 'course-category', '', ' ', '' ); ?>
				<?php if ( ! empty( $terms_list ) ) : ?>
					<div class="course-tax">
						<?php echo $terms_list; ?>
					</div>
				<?php endif; ?>

				<h2 class="course-title">
					<a href="<?php echo esc_url( get_permalink( absint( get_the_ID() ) ) ); ?>">
						<?php echo esc_html( get_the_title() ); ?>
					</a>
				</h2>

				<div class="course-meta">
					<?php
					$lesson_count = Sensei()->course->course_lesson_count( get_the_ID() );
					if ( ! empty( $lesson_count ) ) :
						?>
						<div class="course-meta-lessons">
							<?php
							echo sprintf(
								'<i class="fa-solid fa-list-check"></i> %1$s %2$s',
								esc_html( $lesson_count ),
								esc_html__( 'lessons', 'beflex' )
							);
							?>
						</div>
					<?php
					endif;

					$lesson_time = beflex_get_course_length( get_the_ID() );

					if ( ! empty( $lesson_time ) ) :
						?>
						<div class="course-meta-time">
							<?php
							echo sprintf(
								'<i class="fa-regular fa-clock"></i> %1$s %2$s',
								esc_html( $lesson_time ),
								esc_html__( 'min', 'beflex' )
							);
							?>
						</div>
					<?php
					endif;
					?>
				</div>
			</div>

			<?php
			$completed        = count( Sensei()->course->get_completed_lesson_ids( get_the_ID(), get_current_user_id() ) );
			$total_lessons    = Sensei()->course->course_lesson_count( get_the_ID() );
			$percentage       = Sensei_Utils::quotient_as_absolute_rounded_percentage( $completed, $total_lessons, 2 );
			$completion_class = sprintf(' progress-%s', ! empty( esc_attr( $percentage ) ) ? esc_attr( $percentage ) : '0' );

			?>
			<div class="course-completion <?php echo esc_attr( $completion_class ); ?>">
				<div class="course-progress-bar" style="width: <?php echo esc_attr( $percentage ); ?>%"></div>
			</div>
		</section> <!-- section .entry -->

	</section> <!-- section .course-content -->

	<?php
	/**
	 * Fires after the course block in the content-course.php file.
	 *
	 * @since 1.9
	 *
	 * @param integer $course_id
	 *
	 * @hooked  Sensei()->course->the_course_free_lesson_preview - 20
	 */
	do_action( 'sensei_course_content_after', get_the_ID() );
	?>


</li>
