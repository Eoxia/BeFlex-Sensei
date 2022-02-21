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
