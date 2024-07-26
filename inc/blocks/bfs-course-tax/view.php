<?php
/**
 * Display taxonomies of a Sensei course.
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
$class_name = 'bfs-course-tax';

if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

// Admin classes
if ( is_admin() ) :
    $class_name .= ' is-admin';
	esc_html_e( 'Display course taxonomies', 'beflex' );
endif;

if ( 'course' != get_post_type( get_the_ID() ) ) :
	return;
endif;

$terms_list = get_the_terms( get_the_ID(), 'course-category' );
if ( ! empty( $terms_list ) ) :
	?>
	<div <?php echo $anchor; ?> class="<?php echo esc_attr( $class_name ); ?>">
		<?php foreach( $terms_list as $term ) : ?>
			<a href="<?php echo get_term_link( $term->slug, 'course-category'); ?>" rel="tag" class="bfs-course-tax__id-<?php echo $term->term_id; ?>"><?php echo $term->name; ?></a>
		<?php endforeach; ?>
	</div>
<?php endif; ?>
