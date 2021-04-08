<?php
/**
 * Gutenber customisation
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
	.edit-post-layout__content h1,
	.edit-post-layout__content h2,
	.edit-post-layout__content h3,
	.edit-post-layout__content h4,
	.edit-post-layout__content h5,
	.edit-post-layout__content h6,
	.beflex-diaporama .diaporama-title,
	.widget-title,
	.editor-post-title__block .editor-post-title__input {
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
		.edit-post-layout__content .button.button-primary:not(.bordered) {
			background: <?php echo esc_html( $beflex_primary ); ?>;
			border-color: <?php echo esc_html( $beflex_primary ); ?>;
		}
		.edit-post-layout__content .button.bordered.button-primary {
			border-color: <?php echo esc_html( $beflex_primary ); ?>;
			color: <?php echo esc_html( $beflex_primary ); ?>;
		}
		.edit-post-layout__content .button.bordered.button-primary:hover {
			box-shadow: inset 0 -2.6em <?php echo esc_html( $beflex_primary ); ?>;
		}
		.edit-post-layout__content .owl-carousel .owl-dots .owl-dot.active span {
			border: 2px solid <?php echo esc_html( $beflex_primary ); ?>;
			box-shadow: 0px 0px 0px 2px <?php echo esc_html( $beflex_primary ); ?>;
		}
		.edit-post-layout__content .flexible-gallery .gallery .content:after {
			background: <?php echo esc_html( $beflex_primary ); ?>;
		}
	<?php endif; ?>

</style>
