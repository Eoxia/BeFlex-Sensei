<?php
/**
 * list-course-category
 *
 * @author Eoxia <contact@eoxia.com>
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @since 4.0.0
 * @package beflex-child
 *
 */

if ( ! defined( 'BFS_LIST_COURSE_CATEGORY_DIR' ) ) {
    define( 'BFS_LIST_COURSE_CATEGORY_DIR', dirname(__DIR__, 1) . '/bfs-list-course-category' );
}
if ( ! defined( 'BFS_LIST_COURSE_CATEGORY_URL' ) ) {
    define( 'BFS_LIST_COURSE_CATEGORY_URL', get_template_directory_uri() . '/inc/blocks/bfs-list-course-category' );
}

/**
 * Generate block
 *
 * @return void
 */
function bfs_list_course_category_register_acf_blocks() {
    wp_register_style( 'block-bfs-list-course-category-style', BFS_LIST_COURSE_CATEGORY_URL . '/assets/css/style.min.css' );
    register_block_type( BFS_LIST_COURSE_CATEGORY_DIR . '/assets/json/' );
}
add_action( 'init', 'bfs_list_course_category_register_acf_blocks', 5 );

/**
 * Load Json fields
 *
 * @param array $paths Json path
 *
 * @return array $paths Json path
 */
function bfs_list_course_category_load_json( $paths ) {
    $paths[] = BFS_LIST_COURSE_CATEGORY_DIR . '/assets/json';
    return $paths;
}
add_filter( 'acf/settings/load_json', 'bfs_list_course_category_load_json' );

/**
 * Recursively get taxonomy and its children
 *
 * @param string $taxonomy
 * @param int $parent - parent term id
 * @return array
 * @author daggerhart on Github
 */
function bfs_get_taxonomy_hierarchy( $taxonomy, $parent = 0 ) {
	// only 1 taxonomy
	$taxonomy = is_array( $taxonomy ) ? array_shift( $taxonomy ) : $taxonomy;

	// get all direct decendants of the $parent
	$terms = get_terms( $taxonomy, array(
		'parent'     => $parent,
		'hide_empty' => false,
		'meta_query' => array(
			array(
				'key'     => 'bfs_private_course_tax',
				'value'   => 1,
				'compare' => 'LIKE'
			)
		)
	) );

	// prepare a new array.  these are the children of $parent
	// we'll ultimately copy all the $terms into this new array, but only after they
	// find their own children
	$children = array();

	// go through all the direct decendants of $parent, and gather their children
	foreach ( $terms as $term ){
		// recurse to get the direct decendants of "this" term
		$term->children = bfs_get_taxonomy_hierarchy( $taxonomy, $term->term_id );

		// add the term to our new array
		$children[ $term->term_id ] = $term;
	}

	// send the results back to the caller
	return $children;
}

/**
 * Recursively get all taxonomies as complete hierarchies
 *
 * @param array $taxonomies of taxonomy slugs
 * @param int $parent - Starting parent term id
 *
 * @return array
 * @author daggerhart on Github
 */
function bfs_get_taxonomy_hierarchy_multiple( $taxonomies, $parent = 0 ) {
	if ( ! is_array( $taxonomies )  ) {
		$taxonomies = array( $taxonomies );
	}

	$results = array();

	foreach( $taxonomies as $taxonomy ){
		$terms = bfs_get_taxonomy_hierarchy( $taxonomy, $parent );

		if ( $terms ) {
			$results[ $taxonomy ] = $terms;
		}
	}

	return $results;
}

/**
 * Create Category private settings in add form
 *
 * @param $taxonomy string
 *
 * @return void
 */
function bfs_private_course_tax_add_fields( $taxonomy ) {
	?>
	<div class="form-field">
		<label for="tab_menu_select"><?php esc_html_e( 'Category status', 'beflex-sensei' ); ?></label>
		<div class="form-check">
			<label>
				<input class="form-check-input" type="radio" name="bfs_private_course_tax" id="bfs_private_course_tax1" value="1" checked="checked">
				<span><?php esc_html_e( 'Public', 'beflex-sensei' ); ?></span>
				<code><?php esc_html_e( 'Show in nav', 'beflex-sensei' ); ?></code>
			</label>
		</div>
		<div class="form-check">
			<label>
				<input class="form-check-input" type="radio" name="bfs_private_course_tax" id="bfs_private_course_tax2" value="0">
				<span><?php esc_html_e( 'Private', 'beflex-sensei' ); ?></span>
				<code><?php esc_html_e( 'Hide from nav', 'beflex-sensei' ); ?></code>
			</label>
		</div>
		<p class="description"><?php esc_html_e( 'Display category in navigation ?', 'beflex-sensei' ); ?></p>
	</div>
	<?php
}
add_action( 'course-category_add_form_fields', 'bfs_private_course_tax_add_fields' );

/**
 * Create Category private settings in edit form
 *
 * @param WP_Term $term
 * @param string $taxonomy
 *
 * @return void
 */
function bfs_private_course_tax_edit_fields( $term, $taxonomy ) {

	$term_id = $term->term_id;

	$metadata_exists = metadata_exists( 'term', $term_id, 'bfs_private_course_tax' );
	if ( $metadata_exists ) {
		$bfs_private_course_tax = get_term_meta( $term_id, 'bfs_private_course_tax', true );
	} else {
		$bfs_private_course_tax = 1;
	}
	?>

	<tr class="form-field">
		<th scope="row" valign="top">
			<label for="tab_menu_select"><?php esc_html_e( 'Category status', 'beflex-sensei' ); ?></label>
			<br><p class="description"><?php esc_html_e( 'Display category in navigation ?', 'beflex-sensei' ); ?></p>
		</th>
		<td>
			<div class="form-check">
				<label>
					<input class="form-check-input" type="radio" name="bfs_private_course_tax" id="bfs_private_course_tax1" value="1" <?php checked( $bfs_private_course_tax, 1 ); ?>>
					<span><?php esc_html_e( 'Public', 'beflex-sensei' ); ?></span>
					<code><?php esc_html_e( 'Show in nav', 'beflex-sensei' ); ?></code>
				</label>
			</div>
			<div class="form-check">
				<label>
					<input class="form-check-input" type="radio" name="bfs_private_course_tax" id="bfs_private_course_tax2" value="0" <?php checked( $bfs_private_course_tax, 0 ); ?>>
					<span><?php esc_html_e( 'Private', 'beflex-sensei' ); ?></span>
					<code><?php esc_html_e( 'Hide from nav', 'beflex-sensei' ); ?></code>
				</label>
			</div>
		</td>
	</tr>
	<?php
}
add_action( 'course-category_edit_form_fields', 'bfs_private_course_tax_edit_fields', 10, 2 );

/**
 * Save Category private settings
 *
 * @param int $term_id
 *
 * @return void
 */
function bfs_private_course_tax_save_fields( $term_id ) {
	update_term_meta(
		$term_id,
		'bfs_private_course_tax',
		sanitize_text_field( $_POST[ 'bfs_private_course_tax' ] )
	);
}
add_action( 'created_course-category', 'bfs_private_course_tax_save_fields' );
add_action( 'edited_course-category', 'bfs_private_course_tax_save_fields' );
