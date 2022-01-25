<?php
/**
 * The Template for outputting the meta of course
 *
 * @author    Eoxia <contact@eoxia.com>
 * @copyright (c) 2006-2019 Eoxia <contact@eoxia.com>
 * @license   AGPLv3 <https://spdx.org/licenses/AGPL-3.0-or-later.html>
 * @package   beflex
 * @since     3.0.0
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

$post = get_post( $args['post_id'] );

if ( empty( $post ) ) :
    return;
endif;

$course_author    = get_post_field( 'post_author', $post->ID );
$course_length    = beflex_get_course_length( $post->ID );
$lesson_count     = Sensei()->course->course_lesson_count( $post->ID );
$category_output  = get_the_term_list( $post->ID, 'course-category', '', ' ', '' );
$author_permalink = get_author_posts_url( $course_author );
?>
<div class="single-course-meta">
<!--    <div class="meta-author">-->
<!--        --><?php //echo get_avatar( $course_author, 40 ); ?>
<!--		<a href="--><?php //echo esc_url( $author_permalink ); ?><!--">-->
<!--			<span class="author-label">--><?php //echo esc_html( get_the_author_meta( 'display_name', $course_author ) ); ?><!--</span>-->
<!--		</a>-->
<!--    </div>-->

    <div class="meta-datas gridlayout grid-2">
        <div class="meta">
            <i class="far fa-clock"></i>
            <span class="meta-label"><?php echo sprintf( _n( '%d minute', '%d minutes', $course_length, 'beflex-child' ), $course_length ); ?></span>
        </div>
        <div class="meta">
            <i class="far fa-book"></i>
            <span class="meta-label"><?php echo sprintf( _n( '%d lesson', '%d lessons', $lesson_count, 'beflex-child' ), $lesson_count ); ?></span>
        </div>
    </div>

    <div class="meta-categories">
        <?php echo $category_output; ?>
    </div>
</div>
