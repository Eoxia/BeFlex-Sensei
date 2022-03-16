<?php
/**
 * Functions of sensei plugin
 *
 * @author    Eoxia <contact@eoxia.com>
 * @copyright (c) 2006-2019 Eoxia <contact@eoxia.com>
 * @license   AGPLv3 <https://spdx.org/licenses/AGPL-3.0-or-later.html>
 * @package   beflex
 * @since     3.0.0
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */


/**
 * Add custom style to Sensei block Course outline
 */
function beflex_add_course_outline_style() {
	register_block_style('sensei-lms/course-outline', [
		'name' => 'beflex',
		'label' => __('Beflex style', 'beflex'),
	]);
}
add_action( 'init', 'beflex_add_course_outline_style' );

/**
* Returns the calculation of all lesson times
*
* @param  int $course_id     Course ID.
* @return int $course_length Calculated course time.
*/
function beflex_get_course_length( $course_id ) {
	if ( empty( $course_id ) ) {
		return 0;
	}

	global $sensei;
	$sensei = Sensei();
	$course_length = (int) 0;
	$lesson_list   = $sensei->course->course_lessons( $course_id );

	if ( ! empty( $lesson_list ) ) :
		foreach( $lesson_list as $lesson ) :
			$lesson_length = get_post_meta( $lesson->ID, '_lesson_length', true );
			$course_length = (int) $course_length + intval( $lesson_length, 10 );
		endforeach;
	endif;

	return $course_length;
}

/**
 * Filter the number of columns on the course archive page.
 *
 * @since 1.9.0
 * @param int $number_of_columns default 1
 */
add_filter( 'sensei_course_loop_number_of_columns', function() {
	return 3;
}, 9 );

/**
 * Generate profile sidebar
 *
 * @return array
 */
function bfs_profile_sidebar() {
	$sidebar = '<div class="profile-sidebar"><div class="profile-sidebar-content">';

	if ( is_user_logged_in() ) {
		$profile_url = Sensei()->learner_profiles->get_permalink(get_current_user_id());
		if (!empty($profile_url)) {
			$sidebar .= '<a href="' . esc_url($profile_url) . '" class="profile-nav nav-courses"><i class="fa-solid fa-book"></i> ' . esc_html__('My courses', 'beflex-child') . '</a>';
		}

		$message_url = get_post_type_archive_link('sensei_message');
		if (!empty($message_url)) {
			$sidebar .= '<a href="' . esc_url($message_url) . '" class="profile-nav nav-messages"><i class="fa-solid fa-envelope"></i> ' . esc_html__('My messages', 'beflex-child') . '</a>';
		}

		$sidebar .= '<a href="' . esc_url(wp_logout_url(home_url())) . '" class="profile-nav spacer"><i class="fa-solid fa-right-from-bracket"></i> ' . esc_html__('Logout', 'beflex-child') . '</a>';
	}

	$sidebar .= '</div></div>';

	return $sidebar;
}

/**
 * Add classes to profile pages
 *
 * @param $classes
 * @return array|mixed
 */
function bfs_add_profile_body_classes( $classes ) {
	if ( 'message' == is_post_type_archive() || is_singular( 'sensei_message' ) ) {
		return array_merge( $classes, array( 'learner-archive-message' ) );
	}
	return $classes;
}
add_filter( 'body_class', 'bfs_add_profile_body_classes', 10 );

/**
 * Get last update of a conversation
 *
 * @param $message_id
 * @return string|void
 */
function get_message_last_update( $message_id ) {
	if ( empty( $message_id ) ) {
		return;
	}

	$comments = get_comments( array(
		'post_id' => get_the_ID(),
		'number'  => 1
	) );
	if ( ! empty( $comments ) ) {
		$date_day  = get_comment_date( 'd/m/Y', $comments[0]->comment_ID );
		$date_hour = get_comment_date( 'h:i', $comments[0]->comment_ID );
	}
	else {
		$date_day  = get_the_modified_date( 'd/m/Y', $message_id );
		$date_hour = get_the_modified_date( 'h:i', $message_id );
	}

	$render = '<span class="message-data message-date"><i class="fa-regular fa-calendar"></i> ' . $date_day . '</span>';
	$render .= '<span class="message-data message-hour"><i class="fa-regular fa-clock"></i> ' . $date_hour . '</span>';
	return $render;
}
