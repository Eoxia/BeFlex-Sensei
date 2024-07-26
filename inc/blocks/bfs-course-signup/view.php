<?php
/**
 * course-signup.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or its parent block.
 */

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'bfs-course-signup';

if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

// Admin classes
if ( is_admin() ) :
    $class_name .= ' is-admin';
	esc_html_e( 'Display course signup button', 'beflex' );
endif;

if ( 'course' != get_post_type( get_the_ID() ) ) :
	return;
endif;
?>

<div <?php echo $anchor; ?> class="<?php echo esc_attr( $class_name ); ?>">
	<?php
	if ( Sensei()->course->is_user_enrolled( get_the_ID(), get_current_user_id() ) ) :
		global $post;
		$lesson_url = Sensei()->course->alter_redirect_url_after_enrolment( '', $post );
		if ( ! empty( $lesson_url ) ) :
			echo '<div class="sensei-block-wrapper"><a href="' . esc_url( $lesson_url ) . '" class="bf-button bf-button__color-primary">' . esc_html__( 'Start course', 'beflex' ) . '</a></div>';
		endif;
	else :
		$content = '<button class="bf-button bf-button__color-primary">' . esc_html__( 'Take course', 'beflex' ) . '</button>';
		echo Sensei()->blocks->course->take_course->render_take_course_block( '', $content );
	endif;
	?>
</div>
