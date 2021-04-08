<?php
/**
 * The sidebar containing the main widget area
 *
 * @author    Eoxia <contact@eoxia.com>
 * @copyright (c) 2006-2019 Eoxia <contact@eoxia.com>
 * @license   AGPLv3 <https://spdx.org/licenses/AGPL-3.0-or-later.html>
 * @package   beflex
 * @since     3.0.0
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

if ( ! ( is_acf() && is_beflex_pro() ) ) :
	return;
endif;

if ( ! get_field( 'beflex_display_page_sidebar' ) ) :
	return;
endif;

$beflex_sidebar_name = get_field( 'beflex_sidebar_to_display' );
if ( ! is_active_sidebar( $beflex_sidebar_name ) ) :
	return;
endif;
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( $beflex_sidebar_name ); ?>
</aside><!-- #secondary -->
