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
