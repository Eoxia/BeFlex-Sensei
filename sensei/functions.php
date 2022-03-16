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

/**
 * Add notice to Sensei register form
 */
function beflex_add_register_form_description() {
	echo '<p style="color: red;"><i><strong>' . __( 'Your informations can no longer be modified', 'beflex' ) . '</strong></i></p>';
}
add_action( 'sensei_register_form_start', 'beflex_add_register_form_description', 10 );

/**
 * Add fields to Sensei register form
 */
function beflex_add_register_name_fields() {
	$first_name = ( ! empty( $_POST['first_name'] ) ) ? trim( $_POST['first_name'] ) : '';
	$last_name  = ( ! empty( $_POST['last_name'] ) ) ? trim( $_POST['last_name'] ) : '';
	?>
	<div class="col2-set">
		<p class="form-row form-row-wide">
			<label for="last_name"><?php esc_html_e( 'Last name', 'beflex' ); ?> <span class="required">*</span></label>
			<input type="text" name="last_name" id="last_name" class="input-text input" value="<?php echo esc_attr( wp_unslash( $first_name ) ); // phpcs:ignore WordPress.Security.NonceVerification ?>" size="25" />
		</p>
		<p class="form-row form-row-wide">
			<label for="first_name"><?php esc_html_e( 'First name', 'beflex' ); ?> <span class="required">*</span></label>
			<input type="text" name="first_name" id="first_name" class="input-text input" value="<?php echo esc_attr( wp_unslash( $last_name ) ); // phpcs:ignore WordPress.Security.NonceVerification ?>" size="25" />
		</p>
	</div>
	<?php
}
add_action( 'sensei_register_form_fields', 'beflex_add_register_name_fields', 10 );

/**
 * Register Firstname and Lastname of a user
 */
add_action( 'user_register', 'myplugin_user_register' );
function myplugin_user_register( $user_id ) {
	// check the for the sensei specific registration requests.
	// phpcs:ignore WordPress.Security.NonceVerification -- We are just checking whether to return here.
	if ( ! isset( $_POST['sensei_reg_username'] ) && ! isset( $_POST['sensei_reg_email'] ) && ! isset( $_POST['sensei_reg_password'] ) ) {
		// exit if this is not a sensei registration request.
		return;
	}

	if ( ! empty( $_POST['first_name'] ) ) {
		update_user_meta( $user_id, 'first_name', trim( $_POST['first_name'] ) );
		update_user_meta( $user_id, 'last_name', trim( $_POST['last_name'] ) );
	}
}
