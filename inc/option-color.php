<?php
/**
 * Theme customisation color
 *
 * @author    Eoxia <contact@eoxia.com>
 * @copyright (c) 2006-2019 Eoxia <contact@eoxia.com>
 * @license   AGPLv3 <https://spdx.org/licenses/AGPL-3.0-or-later.html>
 * @package   beflex
 * @since     3.0.0
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

$beflex_primary = get_theme_mod( 'beflex_primary_color', '#0e6eff' );

if ( is_beflex_settings() ) :
	$beflex_font_family    = \beflex_pro\Settings_Helper::getInstance()->get_font_family();
	$beflex_font_weight    = \beflex_pro\Settings_Helper::getInstance()->get_font_weight();
	$beflex_font_transform = \beflex_pro\Settings_Helper::getInstance()->get_font_transform();
endif;
?>

<style>

	h1, h2, h3, h4, h5, h6, .beflex-diaporama .diaporama-title, .widget-title, .editor-post-title__block .editor-post-title__input, .beflex-call-to-action div.call-to-title, .beflex-call-to-action div.block-title {
		<?php if ( ! empty( $beflex_font_family ) ) : ?>
			font-family: '<?php echo esc_html( $beflex_font_family ); ?>';
		<?php endif; ?>
		<?php if ( ! empty( $beflex_font_weight ) ) : ?>
			font-weight: <?php echo esc_html( $beflex_font_weight ); ?>;
		<?php endif; ?>
		<?php if ( ! empty( $font_style ) ) : ?>
			font-style: <?php echo esc_html( $font_style ); ?>;
		<?php endif; ?>
		<?php if ( ! empty( $beflex_font_transform ) ) : ?>
			text-transform: <?php echo esc_html( $beflex_font_transform ); ?>;
		<?php endif; ?>
	}

	<?php if ( ! empty( $beflex_primary ) ) : ?>
		.button.button-primary:not(.bordered), button, input[type="button"], input[type="reset"], input[type="submit"] {
			background: <?php echo esc_html( $beflex_primary ); ?>;
			border-color: <?php echo esc_html( $beflex_primary ); ?>;
		}
		.button.bordered.button-primary {
			border-color: <?php echo esc_html( $beflex_primary ); ?>;
			color: <?php echo esc_html( $beflex_primary ); ?>;
		}
		.button.bordered.button-primary:hover {
			box-shadow: inset 0 -2.6em <?php echo esc_html( $beflex_primary ); ?>;
		}
		#comments .comment-list .comment-reply-link {
			border-color: <?php echo esc_html( $beflex_primary ); ?>;
			color: <?php echo esc_html( $beflex_primary ); ?>;
		}
		#comments .comment-list .comment-reply-link:hover {
			box-shadow: inset 0 -2.6em <?php echo esc_html( $beflex_primary ); ?>;
		}
		#comments .comment-list .comment-metadata .comment-edit-link {
			color: <?php echo esc_html( $beflex_primary ); ?>;
		}
		#search-area .search-overlay {
			background: <?php echo esc_html( $beflex_primary ); ?>;
		}
		a, a:visited {
			color: <?php echo esc_html( $beflex_primary ); ?>;
		}
		a:hover, a:focus, a:active {
			color: <?php echo esc_html( beflex_change_color( $beflex_primary, -30 ) ); ?>;
		}
		.post-navigation .nav-links .fa {
			background: <?php echo esc_html( $beflex_primary ); ?>;
		}
		::-moz-selection {
			background: <?php echo esc_html( $beflex_primary ); ?>;
		}
		::selection {
			background: <?php echo esc_html( $beflex_primary ); ?>;
		}
		#main-navigation .beflex-mega-menu .beflex-mega-menu-container {
			border-top: 4px solid <?php echo esc_html( $beflex_primary ); ?>;
		}

		#main-navigation .menu > .menu-item.current_page_item > a,
		#main-navigation .menu > .menu-item.current-menu-item > a,
		#main-navigation .menu > .menu-item.current_page_ancestor > a,
		#main-navigation .menu > .menu-item.current-menu-ancestor > a {
			color: <?php echo esc_html( $beflex_primary ); ?>;
		}

		.site-navigation .menu-toggle .fa {
			color: <?php echo esc_html( $beflex_primary ); ?>;
		}
		.beflex-diaporama .owl-dots .owl-dot.active span {
			border: 2px solid <?php echo esc_html( $beflex_primary ); ?> !important;
			box-shadow: 0px 0px 0px 2px <?php echo esc_html( $beflex_primary ); ?> !important;
		}
		#burger-menu .navigation-overlay {
			background: <?php echo esc_html( $beflex_primary ); ?>;
		}
		#masthead .site-tool > a.wps-action-mini-cart-opener .wps-numeration-cart {
			background: <?php echo esc_html( $beflex_primary ); ?>;
		}
		.flexible-gallery .gallery .content:after {
			background: <?php echo esc_html( $beflex_primary ); ?>;
		}
		ul.wp-block-gallery .blocks-gallery-item::after {
			background: <?php echo esc_html( $beflex_primary ); ?>;
		}
		.wp-block-quote.is-style-default {
			border-left: 4px solid <?php echo esc_html( $beflex_primary ); ?>;
		}
	<?php endif; ?>

</style>
