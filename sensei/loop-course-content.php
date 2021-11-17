<?php
/**
 * The Template for outputting the content of courses listing.
 *
 * @author    Eoxia <contact@eoxia.com>
 * @copyright (c) 2006-2019 Eoxia <contact@eoxia.com>
 * @license   AGPLv3 <https://spdx.org/licenses/AGPL-3.0-or-later.html>
 * @package   beflex
 * @since     3.0.0
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

global $sensei;
$sensei          = Sensei();
$sensei_title    = new Sensei_Templates();
$category_output = get_the_term_list( get_the_ID(), 'course-category', '<span class="course-categories">', ', ', '</span>' );
$post_id         = ! empty( $args['post_id'] ) ? $args['post_id'] : 0;
$course_length   = beflex_get_course_length( $post_id );
$course_author   = get_post_field( 'post_author', $post_id );
?>

<div class="entry-thumbnail">
    <?php $sensei->course->course_image(); ?>
</div>

<div class="entry-content">
    <?php echo $category_output; ?>

    <?php $sensei_title->the_title( $post_id ); ?>

    <p class="course-excerpt">
        <?php echo wp_kses_post( get_the_excerpt() ); ?>
    </p>

    <div class="course-meta">
        <span class="course-length"><i class="far fa-clock"></i> <?php echo esc_html( $course_length ); ?></span>
        <?php if ( ! empty( $course_author ) ) : ?>
            <span class="course-author">
            <?php echo get_avatar( $course_author, 20 ); ?>
            <?php echo esc_html( get_the_author_meta( 'display_name', $course_author ) ); ?>
        </span>
        <?php endif; ?>
    </div>
</div>
