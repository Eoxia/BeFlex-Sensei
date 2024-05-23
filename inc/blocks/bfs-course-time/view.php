<?php
/**
 * course-time.
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
$class_name = 'bfs-course-time';

if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

// Admin classes
if ( is_admin() ) :
    $class_name .= ' is-admin';
	esc_html_e( 'Display course time', 'beflex' );
endif;

if ( 'course' != get_post_type( get_the_ID() ) ) :
	return;
endif;

$lesson_time = beflex_get_course_length( get_the_ID() );

if ( ! empty( $lesson_time ) ) :
	?>
	<div <?php echo $anchor; ?> class="<?php echo esc_attr( $class_name ); ?>">
		<?php
		echo sprintf(
			'<img src="%1$s" class="bfs-course-time__icon" /> <span>%2$s %3$s</span>',
			esc_url( BFS_COURSE_TIME_URL . '/assets/images/clock-regular.svg' ),
			esc_html( $lesson_time ),
			esc_html__( 'min', 'beflex' )
		);
		?>
	</div>
	<?php
endif;
?>
