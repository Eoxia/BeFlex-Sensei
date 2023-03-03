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
	register_block_style('sensei-lms/course-outline-module', [
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
			$sidebar .= '<a href="' . esc_url($profile_url) . '" class="profile-nav nav-courses"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome 6.3.0 by @fontawesome - https://fontawesome.com License Copyright 2023 Fonticons, Inc. --><path d="M96 0C43 0 0 43 0 96V416c0 53 43 96 96 96H384h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V384c17.7 0 32-14.3 32-32V32c0-17.7-14.3-32-32-32H384 96zm0 384H352v64H96c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16zm16 48H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg> ' . esc_html__('My courses', 'beflex') . '</a>';
		}

		$message_url = get_post_type_archive_link('sensei_message');
		if (!empty($message_url)) {
			$sidebar .= '<a href="' . esc_url($message_url) . '" class="profile-nav nav-messages"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome 6.3.0 by @fontawesome - https://fontawesome.com License Copyright 2023 Fonticons, Inc. --><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg> ' . esc_html__('My messages', 'beflex') . '</a>';
		}

		$sidebar .= '<a href="' . esc_url(wp_logout_url(home_url())) . '" class="profile-nav spacer"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome 6.3.0 by @fontawesome - https://fontawesome.com License Copyright 2023 Fonticons, Inc. --><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/></svg> ' . esc_html__('Logout', 'beflex') . '</a>';
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

	$render = '<span class="message-data message-date"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome 6.3.0 by @fontawesome - https://fontawesome.com License Copyright 2023 Fonticons, Inc. --><path d="M152 24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H64C28.7 64 0 92.7 0 128v16 48V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V192 144 128c0-35.3-28.7-64-64-64H344V24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H152V24zM48 192H400V448c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V192z"/></svg> ' . $date_day . '</span>';
	$render .= '<span class="message-data message-hour"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome 6.3.0 by @fontawesome - https://fontawesome.com License Copyright 2023 Fonticons, Inc. --><path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg> ' . $date_hour . '</span>';
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
