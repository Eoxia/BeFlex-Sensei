<?php
/**
 * The sidebar containing the main widget area
 *
 * @author    Eoxia <contact@eoxia.com>
 * @copyright (c) 2006-2019 Eoxia <contact@eoxia.com>
 * @license   AGPLv3 <https://spdx.org/licenses/AGPL-3.0-or-later.html>
 * @package   beflex
 * @since     3.0.0
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

/** Change Sensei Wrapper */
global $woothemes_sensei;
global $sensei;
$sensei = Sensei();

/** Actions */
remove_action( 'sensei_before_main_content', array( $woothemes_sensei->frontend, 'sensei_output_content_wrapper' ), 10 );
remove_action( 'sensei_after_main_content', array( $woothemes_sensei->frontend, 'sensei_output_content_wrapper_end' ), 10 );

remove_action( 'sensei_course_content_inside_before', array( 'Sensei_Templates', 'the_title' ), 5 );
remove_action( 'sensei_course_content_inside_before', array( $sensei->course, 'the_course_meta' ) );
remove_action( 'sensei_course_content_inside_before', array( $sensei->course, 'course_image' ), 30 );

remove_action( 'sensei_single_course_content_inside_before', array( 'Sensei_Course', 'the_title' ), 10 );
remove_action( 'sensei_single_course_content_inside_before', array( $sensei->course, 'course_image' ), 20 );




function my_theme_wrapper_start() {
    echo '<main id="primary" class="content-area" role="main">';
}
add_action('sensei_before_main_content', 'my_theme_wrapper_start', 10);

function my_theme_wrapper_end() {
    echo '</main><!-- #primary -->';
    get_sidebar( 'sensei' );
}
add_action('sensei_after_main_content', 'my_theme_wrapper_end', 10);

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

/** Remove actions for loop courses template */


/**
 * Change template of loop courses
 *
 * @param  int $post_id Post ID.
 *
 * @return void
 */
function beflex_loop_course_template( $post_id ) {
    get_template_part( 'sensei/loop-course', 'content', array( 'post_id' => $post_id ) );
}
add_action( 'sensei_course_content_inside_before', 'beflex_loop_course_template', 11 );

/** Action for single course template */
function beflex_single_course_header() {
    get_template_part( 'sensei/single-course', 'header', array( 'post_id' => get_the_ID() ) );
}
add_action( 'sensei_single_course_content_inside_before', 'beflex_single_course_header', 10 );

function beflex_single_course_meta() {
    get_template_part( 'sensei/single-course', 'meta', array( 'post_id' => get_the_ID() ) );
}
add_action( 'sensei_single_course_content_inside_before', 'beflex_single_course_meta', 11 );

/**
 * Returns the HTML tag for title in course listing.
 *
 * @param  string $tag HTML Tag of the title.
 * @return string $tag HTML Tag of the title.
 */
function beflex_loop_course_title_tag($tag) {
    return 'h2';
}
add_filter( 'sensei_the_title_html_tag', 'beflex_loop_course_title_tag' );

