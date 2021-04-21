<?php
/**
 * Template part for displaying header of pages
 *
 * @author    Eoxia <contact@eoxia.com>
 * @copyright (c) 2006-2019 Eoxia <contact@eoxia.com>
 * @license   AGPLv3 <https://spdx.org/licenses/AGPL-3.0-or-later.html>
 * @package   beflex
 * @since     3.0.0
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

if ( is_404() ) :
	$page_title = __( '404 error', 'beflex' );
elseif ( is_search() ) :
	$page_title = __( 'Search for :', 'beflex' ) . ' ' . get_search_query();
elseif ( is_author() ) :
	$post_author_id = get_post_field( 'post_author', $post->ID );
	$page_title     = get_the_author_meta( 'display_name', $post->post_author );
elseif ( is_category() ) :
	$page_title = single_cat_title( '', false );
elseif ( is_archive() ) :
	$page_title = post_type_archive_title( '', false );
	if ( empty( $page_title ) ) :
		$page_title = single_cat_title( '', false );
	endif;
elseif ( is_page() ) :
	$page_title = get_the_title();
else :
	$page_title = single_post_title( '', false );
endif;

$page_title = apply_filters( 'beflex_page_header_title', $page_title, get_the_ID() );
?>

<div id="header-page" class="beflex-animation" data-animation="headerPage">
	<div class="header-title-container site-width">
		<?php do_action( 'beflex_header_page_before' ); ?>
		<div class="header-title-content">
			<?php do_action( 'beflex_header_page_inside_before' ); ?>

			<?php if ( ! empty( $page_title ) ) : ?>
				<h1 class="header-title"><?php echo esc_html( $page_title ); ?></h1>
			<?php endif; ?>

			<?php do_action( 'beflex_header_page_inside_after' ); ?>
		</div>
		<?php do_action( 'beflex_header_page_after' ); ?>
	</div>
</div>
