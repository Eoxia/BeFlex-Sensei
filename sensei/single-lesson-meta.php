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

$course_author     = get_post_field( 'post_author', $post->ID );
$lesson_length     = get_post_meta( $post->ID, '_lesson_length', true );
$complexity_array  = Sensei()->lesson->lesson_complexities();
$lesson_complexity = get_post_meta( $post->ID, '_lesson_complexity', true );
if ( '' != $lesson_complexity ) {
	$lesson_complexity = $complexity_array[ $lesson_complexity ];
}

?>
<div class="single-course-meta">
	<div class="meta-author">
		<?php echo get_avatar( $course_author, 40 ); ?>
		<span class="author-label"><?php echo esc_html( get_the_author_meta( 'display_name', $course_author ) ); ?></span>
	</div>

	<div class="meta-datas gridlayout grid-2">
		<?php if ( ! empty( $lesson_length ) ) : ?>
			<div class="meta">
				<i class="far fa-clock"></i>
				<span class="meta-label"><?php echo sprintf( _n( '%d minute', '%d minutes', $lesson_length, 'beflex-child' ), $lesson_length ); ?></span>
			</div>
		<?php endif; ?>
		<?php if ( ! empty( $lesson_complexity ) ) : ?>
			<div class="meta">
				<i class="far fa-signal"></i>
				<span class="meta-label"><?php echo esc_html( $lesson_complexity ); ?></span>
			</div>
		<?php endif; ?>
	</div>
</div>
