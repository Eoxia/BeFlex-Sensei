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
/** Main Wrapper */
remove_action( 'sensei_before_main_content', array( $woothemes_sensei->frontend, 'sensei_output_content_wrapper' ), 10 );
remove_action( 'sensei_after_main_content', array( $woothemes_sensei->frontend, 'sensei_output_content_wrapper_end' ), 10 );
/** Course */
remove_action( 'sensei_archive_before_course_loop', array( 'Sensei_Course', 'archive_header' ), 10 );
remove_action( 'sensei_course_content_inside_before', array( 'Sensei_Templates', 'the_title' ), 5 );
remove_action( 'sensei_course_content_inside_before', array( $sensei->course, 'the_course_meta' ) );
remove_action( 'sensei_course_content_inside_before', array( $sensei->course, 'course_image' ), 30 );
remove_action( 'sensei_single_course_content_inside_before', array( 'Sensei_Course', 'the_title' ), 10 );
remove_action( 'sensei_single_course_content_inside_before', array( $sensei->course, 'course_image' ), 20 );
/** Lesson */
remove_action( 'sensei_single_lesson_content_inside_before', array( 'Sensei_Lesson', 'the_title' ), 15 );
/** Module */
remove_action( 'sensei_taxonomy_module_content_inside_before', array( $sensei->lesson, 'the_archive_header' ), 20 );
/** Quizz*/
remove_action( 'sensei_single_quiz_content_inside_before', array( 'Sensei_Quiz', 'the_title' ), 20 );
/** Learner page */
remove_action( 'sensei_learner_profile_info', array( $sensei->learner_profiles, 'learner_profile_courses_heading' ), 30 );
/** Messages page */
remove_action( 'sensei_archive_before_message_loop', array( 'Sensei_Messages', 'the_archive_header' ) );
remove_action( 'sensei_content_message_before', array( 'Sensei_Messages', 'the_message_sender' ), 20 );
remove_action( 'sensei_single_message_content_inside_before', array( 'Sensei_Messages', 'the_title' ), 20 );
remove_action( 'sensei_single_message_content_inside_before', array( 'Sensei_Messages', 'the_message_sent_by_title' ), 40 );
// Course results.
remove_action( 'sensei_course_results_content_inside_before', array( $sensei->course, 'course_image' ), 10 );

/**
 * Load theme actions
 */
function beflex_load_theme_actions() {
	// Actions.
	// Main wrapper.
	add_action('sensei_before_main_content', 'beflex_theme_wrapper_start', 10);
	add_action('sensei_after_main_content', 'beflex_theme_wrapper_end', 10);
	// Course.
	add_action( 'beflex_header_page_after', 'beflex_single_course_meta', 10 );
	add_action( 'beflex_header_page_after', 'beflex_single_lesson_meta', 10 );
	add_action( 'beflex_header_page_inside_after', 'beflex_single_course_excerpt' );
	add_action( 'sensei_course_content_inside_before', 'beflex_loop_course_template', 11 );
	// Lesson.
	add_action( 'beflex_header_page_inside_before', 'beflex_single_lesson_backlink', 10 );
	// Profile.
	add_action( 'beflex_header_page_inside_before', 'beflex_profile_header_learner', 10 );
	// Message.
	add_action( 'sensei_content_message_after', array( 'Sensei_Messages', 'the_message_sender' ), 10, 1 );
	add_action( 'beflex_page_header_title', 'beflex_single_message_title', 10, 2 );
	add_action( 'beflex_header_page_inside_before', 'beflex_single_message_backlink', 10 );
	// Teacher page.
	add_action( 'sensei_teacher_archive_course_loop_before', 'beflex_add_bio_to_admin_author_page', 9 ); // Function in main functions.php.
	// Course results.
	add_action( 'beflex_header_page_inside_before', 'beflex_course_results_header', 10 );

	// Filters.
	// Course.
	add_filter( 'sensei_the_title_html_tag', 'beflex_loop_course_title_tag' );
	add_filter( 'beflex_callto_data_type', 'beflex_call_to_action_courses', 10, 3 );
	add_filter( 'beflex_callto_bloc', 'beflex_call_to_action_atts_course', 10, 2 );
	// Lesson.
	add_filter( 'register_post_type_args', 'beflex_sensei_lesson_filter_post_type_args', 10, 2 );
	// Module.
	add_filter( 'sensei_breadcrumb_output', 'beflex_delete_module_breadcrumb_link', 10, 2 );

}
add_action( 'after_setup_theme', 'beflex_load_theme_actions', 11 );

/**
 * Change Sensei theme wrapper
 */
function beflex_theme_wrapper_start() {
    echo '<main id="primary" class="content-area" role="main">';
}

/**
 * Change Sensei theme wrapper - End
 */
function beflex_theme_wrapper_end() {
    echo '</main><!-- #primary -->';
    get_sidebar( 'sensei' );
}

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

/** Action for single course template */
function beflex_single_course_header() {
    get_template_part( 'sensei/single-course', 'header', array( 'post_id' => get_the_ID() ) );
}
//add_action( 'sensei_single_course_content_inside_before', 'beflex_single_course_header', 10 );

/**
 * Display the meta in courses pages
 */
function beflex_single_course_meta() {
	if ( is_singular( 'course' ) ) {
		get_template_part( 'sensei/single-course', 'meta', array( 'post_id' => get_the_ID() ) );
	}
}

function beflex_single_course_excerpt() {
	if ( is_singular( 'course' ) ) {
		get_template_part( 'sensei/single-course', 'excerpt', array( 'post_id' => get_the_ID() ) );
	}
}

/**
 * Display the meta in lessons pages
 */
function beflex_single_lesson_meta() {
	if ( is_singular( 'lesson' ) ) {
		get_template_part( 'sensei/single-lesson', 'meta', array( 'post_id' => get_the_ID() ) );
	}
}

/**
 * Display the backlink in lessons pages
 */
function beflex_single_lesson_backlink() {
	if ( is_singular( 'lesson' ) ) {
		get_template_part( 'sensei/single-lesson', 'backlink', array( 'post_id' => get_the_ID() ) );
	}
}

/**
 * Display student informations in the page header
 */
function beflex_profile_header_learner() {
	global $wp_query;
	if ( isset( $wp_query->query_vars['learner_profile'] ) ) {
		$query_var    = $wp_query->query_vars['learner_profile'];
		$learner_user = Sensei_Learner::find_by_query_var( $query_var );

		if ( ! empty( $learner_user ) ) {
			$name   = $learner_user->data->display_name;
			$bio    = get_user_meta( $learner_user->ID, 'description', true );
			$avatar = get_avatar( $learner_user->ID, 80 );

			get_template_part( 'sensei/profile', 'header', array(
				'user_ID'      => $learner_user->ID,
				'display_name' => $name,
				'description'  => $bio,
				'avatar'       => $avatar,
			) );
		}
	}
}

/**
 * Returns the HTML tag for title in course listing.
 *
 * @param  string $tag HTML Tag of the title.
 * @return string $tag HTML Tag of the title.
 */
function beflex_loop_course_title_tag($tag) {
    return 'h2';
}

/**
 * Add Course type to Call To Action
 *
 * @param  array  $bloc_data Data of Call to Action.
 * @param  string $type      Type of the CTA.
 * @param  int    $id_block  Gutenberg bloc ID.
 *
 * @return array $bloc_data Data of Call to Action.
 */
function beflex_call_to_action_courses( $bloc_data, $type, $id_block ) {
	if ( 'course' == $type ) {
		$call_to_courses = get_field( 'beflex_call_courses', $id_block );
		if ( 'manual' == $call_to_courses['course_filter'] ) :
			$posts_ids = $call_to_courses['course_manual'];
		elseif ( 'category' == $call_to_courses['course_filter'] ) :
			$course_category = $call_to_courses['course_category'];
			$course_count    = $call_to_courses['course_count'];
			$args            = array(
				'post_type'           => 'course',
				'posts_per_page'      => ( ! empty( $course_count ) ) ? $course_count : 3,
				'ignore_sticky_posts' => 1,
				'tax_query'      => array(
					array(
						'taxonomy'         => 'course-category',
						'field'            => 'term_id',
						'terms'            => $course_category,
						'include_children' => false,
					),
				),
			);

			$dynamic_data = new \WP_Query( $args );
			if ( ! empty( $dynamic_data->posts ) ) :
				$posts_ids = $dynamic_data->posts;
			endif;
		else :
			return array();
		endif;

		if ( ! empty( $posts_ids ) ) :
			$i              = 0;
			$bloc_data = array();

			foreach ( $posts_ids as $element ) :
				$bloc_data[ $i ] = array(
					'id'               => $element->ID,
					'title'            => ( ! empty( $element->post_title ) ) ? $element->post_title : false,
					'categories'       => get_the_terms( $element->ID, 'course-category' ),
					'image'            => get_post_thumbnail_id( $element ),
					'content'          => get_the_excerpt( $element ),
					'permalink'        => get_permalink( $element ),
					'permalink_label'  => __( 'Show course', 'beflex' ),
					'permalink_target' => '_self',
					'author'           => ( ! empty( $element->post_author ) ) ? $element->post_author : false,
					'course_length'    => beflex_get_course_length( $element->ID ),
					'row'              => $i,
				);
				$i++;
			endforeach;
		else :
			return array();
		endif;
	}

	return $bloc_data;
}

/**
 * Display course elements for Call To Action courses type.
 *
 * @param  array  $call_atts Call To Ation datas.
 * @param  array  $block     Gutenberg block data.
 *
 * @return array $call_atts Call To Ation datas.
 */
function beflex_call_to_action_atts_course( $call_atts, $block ) {
	$type = get_field( 'beflex_call_data_type', $block['id'] );
	if ( ! empty( $type ) ) {
		if ( 'course' == $type ) {
			$display_elt = get_field('beflex_option_data_display_course', $block['id']);

			$call_atts['display_image'] = (!empty($display_elt) && in_array('image', $display_elt, true)) ? 1 : 0;
			$call_atts['display_title'] = (!empty($display_elt) && in_array('title', $display_elt, true)) ? 1 : 0;
			$call_atts['display_categories'] = (!empty($display_elt) && in_array('cat', $display_elt, true)) ? 1 : 0;
			$call_atts['display_content'] = (!empty($display_elt) && in_array('content', $display_elt, true)) ? 1 : 0;
			$call_atts['display_button'] = (!empty($display_elt) && in_array('button', $display_elt, true)) ? 1 : 0;
			$call_atts['display_author'] = (!empty($display_elt) && in_array('author', $display_elt, true)) ? 1 : 0;
			$call_atts['display_length'] = (!empty($display_elt) && in_array('length', $display_elt, true)) ? 1 : 0;
		}
	}

	return $call_atts;
}


/**
 * Customize Your Post Type args after post type has been registered.
 *
 * @param array  $args      Array of arguments for registering a post type.
 * @param string $post_type Post type key.
 *
 * @return array
 */
function beflex_sensei_lesson_filter_post_type_args( $args, $post_type ) {
	if ( 'lesson' === $post_type ) {
		$args['has_archive'] = false;
	}
	return $args;
}


function beflex_delete_module_breadcrumb_link( $html, $separator ) {
	return;
}

/**
 * Delete title if single message page
 *
 * @param string $page_title Main title of page.
 * @param int    $post_id    ID of page.
 *
 * @return string $page_title Main title of page.
 */
function beflex_single_message_title($page_title, $post_id) {
	if (  is_singular( 'sensei_message' ) ) {
		// On lance les actions qui vont ajouter le vrai titre.
		add_action( 'beflex_header_page_inside_before', array( 'Sensei_Messages', 'the_title' ), 20 );
		add_action( 'beflex_header_page_inside_after', array( 'Sensei_Messages', 'the_message_sent_by_title' ), 10 );

		// On ne renvoie pas le titre principal généré par Beflex.
		return;
	}

	return $page_title;
}

/**
 * Display the backlink to messages page
 */
function beflex_single_message_backlink() {
	if (  is_singular( 'sensei_message' ) ) {
		get_template_part( 'sensei/single-message', 'backlink' );
	}
}

/**
 * Display header in course results page
 *
 * @return void
 */
function beflex_course_results_header() {
	global $course, $wp_query;
	if ( isset( $wp_query->query_vars['course_results'] ) ) {
		$course = get_page_by_path( $wp_query->query_vars['course_results'], OBJECT, 'course' );
		get_template_part( 'sensei/course-results', 'header', array( 'course' => $course ) );
	}
}
