<?php
/**
 * The Template for outputting the header of single course
 *
 * @author    Eoxia <contact@eoxia.com>
 * @copyright (c) 2006-2019 Eoxia <contact@eoxia.com>
 * @license   AGPLv3 <https://spdx.org/licenses/AGPL-3.0-or-later.html>
 * @package   beflex
 * @since     3.0.0
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

$post = get_post( $args['post_id'] );
global $sensei;

if ( empty( $post ) ) :
    return;
endif;
?>

<header class="single-course-header">
    <figure class="course-header-thumbnail">
        <?php $sensei->course->course_image(); ?>
    </figure>
    <div class="course-header-content">
        <h1><?php echo wp_kses_post( apply_filters( 'sensei_single_title', get_the_title( $post ), $post->post_type ) ); ?></h1>
        <?php if ( has_excerpt() ) : ?>
            <div class="header-excerpt"><?php echo wp_kses_post( get_the_excerpt() ); ?></div>
        <?php endif; ?>
    </div>
</header>

