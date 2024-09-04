<?php
/**
 * list-course-category.
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
$class_name = 'bfs-list-course-category';

if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

// Admin classes
if ( is_admin() ) :
    $class_name .= ' is-admin';
endif;

$terms_list   = bfs_get_taxonomy_hierarchy_multiple( 'course-category' );
if ( ! empty( $terms_list ) ) :
	if ( isset ($terms_list['course-category'] ) ) :
		$course_terms = $terms_list['course-category'];
	endif;
endif;

function bfs_display_list_course_category( $terms, $parent = 0 ) {
	foreach ( $terms as $term ) :
		if ( get_queried_object_id() == $term->term_id ) :
			$active = 'current';
		else :
			$active = '';
		endif;
		?>
		<div class="bfs-list-course-category__nav level-<?php echo esc_attr( $parent ); ?>">
			<a href="<?php echo esc_url( get_term_link( $term->term_id ) ); ?>" class="bfs-list-course-category__nav-link <?php echo ! empty( $active ) ? esc_attr( $active ) : ''; ?>">
				<?php echo esc_html( $term->name ); ?>
			</a>

			<?php
			if ( ! empty( $term->children ) ) :
				bfs_display_list_course_category( $term->children, $parent + 1 );
			endif;
			?>
		</div>
		<?php
	endforeach;
}
?>

<div <?php echo $anchor; ?> class="<?php echo esc_attr( $class_name ); ?>">
	<?php
	if ( ! empty( $course_terms ) ) :
		bfs_display_list_course_category( $course_terms );
	endif;
	?>
</div>
