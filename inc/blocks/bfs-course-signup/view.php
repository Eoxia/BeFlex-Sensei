<?php
/**
 * View of BFS Course signup
 *
 * @author Eoxia <contact@eoxia.com>
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @since 2.0.0
 * @package beflex-sensei
 *
 */

// That block only works with courses custom post types.
if ( is_admin() ) :
	esc_html_e( 'Display course signup button', 'beflex-child' );
	return;
endif;

if ( 'course' != get_post_type( get_the_ID() ) ) :
	return;
endif;

if ( Sensei()->course->is_user_enrolled( get_the_ID(), get_current_user_id() ) ) :
	global $post;
	$lesson_url = Sensei()->course->alter_redirect_url_after_enrolment( '', $post );
	if ( ! empty( $lesson_url ) ) :
		echo '<div class="sensei-block-wrapper"><a href="' . esc_url( $lesson_url ) . '" class="wp-block-button__link has-white-color has-galaxy-background-color has-text-color has-background">' . esc_html__( 'Start course', 'beflex-child' ) . '</a></div>';
	endif;
else :
	$content = '<button class="wp-block-button__link has-white-color has-galaxy-background-color has-text-color has-background">' . esc_html__( 'Take course', 'beflex-child' ) . '</button>';
	echo Sensei()->blocks->course->take_course->render_take_course_block( '', $content );
endif;

