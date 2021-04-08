<?php
/**
 * General functions
 *
 * @author    Eoxia <contact@eoxia.com>
 * @copyright (c) 2006-2019 Eoxia <contact@eoxia.com>
 * @license   AGPLv3 <https://spdx.org/licenses/AGPL-3.0-or-later.html>
 * @package   beflex
 * @since     3.0.0
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

require_once ABSPATH . 'wp-admin/includes/plugin.php';

if ( ! function_exists( 'is_wpshop' ) ) :
	/**
	 * Returns true if wpshop plugin is active in the theme
	 *
	 * @return boolean
	 */
	function is_wpshop() {
		if ( is_plugin_active( 'wpshop/wpshop.php' ) ) :
			return true;
		endif;
		return false;
	}
endif;

if ( ! function_exists( 'is_acf' ) ) :
	/**
	 * Returns true if ACF plugin is active in the theme
	 *
	 * @return boolean
	 */
	function is_acf() {
		if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) && class_exists( 'acf' ) ) :
			return true;
		endif;
	}
endif;

if ( ! function_exists( 'is_beflex_pro' ) ) :
	/**
	 * Returns true if YOAST plugin is active in the theme
	 *
	 * @return boolean
	 */
	function is_beflex_pro() {
		if ( class_exists( '\beflex_pro\Beflex_Pro_Init' ) ) :
			return true;
		endif;
		return false;
	}
endif;


if ( ! function_exists( 'is_beflex_aft' ) ) :
	/**
	 * Returns true if AFT module of Beflex Pro exists
	 *
	 * @return boolean
	 */
	function is_beflex_aft() {
		if ( class_exists( '\beflex_pro\ACF_Font_Awesome_Init' ) ) :
			return true;
		endif;
	}
endif;

if ( ! function_exists( 'is_beflex_mega_menu' ) ) :
	/**
	 * Returns true if AFT module of Beflex Pro exists
	 *
	 * @return boolean
	 */
	function is_beflex_mega_menu() {
		if ( class_exists( '\beflex_pro\Mega_Menu_Init' ) ) :
			return true;
		endif;
	}
endif;

if ( ! function_exists( 'is_beflex_settings' ) ) :
	/**
	 * Returns true if settings module of Beflex Pro exists
	 *
	 * @return boolean
	 */
	function is_beflex_settings() {
		if ( class_exists( '\beflex_pro\Settings_Init' ) ) :
			return true;
		endif;
	}
endif;

if ( ! function_exists( 'beflex_notification' ) ) :
	/**
	 * Print an alert for the user
	 *
	 * @param  string $string The message.
	 * @param  string $alert  The class type for css.
	 * @param  string $link  a possible link to another page.
	 * @return void
	 */
	function beflex_notification( $string = '', $alert = 'info', $link = '' ) {
		if ( ! empty( $link ) ) :
			$link = '<a class="full" href="' . esc_html( $link ) . '"></a>';
		endif;

		printf(
			wp_kses(
				/* translators: 1: CSS Class, 2: Comment, 3: Redirect link */
				__( '<div class="notification %1$s"> <i class="notification-icon fas fa-exclamation-triangle"></i> %2$s%3$s</div>', 'beflex' ),
				array(
					'div' => array(
						'class' => array(),
					),
					'i'   => array(
						'class' => array(),
					),
				)
			),
			esc_html( $alert ),
			esc_html( $string ),
			$link // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		);
	}
endif;

if ( ! function_exists( 'beflex_allowed' ) ) :
	/**
	 * Check if the user have the allowed role
	 *
	 * @param  array  $user Current user role.
	 * @param  string $role Roles allowed separated by comma.
	 * @return boolean
	 */
	function beflex_allowed( $user = 'editor', $role = 'editor,administrator' ) {
		$allowed_roles = explode( ',', $role );
		if ( is_user_logged_in() && array_intersect( $allowed_roles, $user ) ) :
			return true;
		else :
			return false;
		endif;
	}
endif;

if ( ! function_exists( 'beflex_darken_color' ) ) :
	/**
	 * Change the Hue of a color
	 *
	 * @param  string  $couleur       Hexa couleur.
	 * @param  integer $changement_ton Lighten or Darken.
	 * @return string The final color
	 */
	function beflex_change_color( $couleur, $changement_ton ) {
		$couleur = substr( $couleur, 1, 6 );
		$cl      = explode( 'x', wordwrap( $couleur, 2, 'x', 3 ) );
		$couleur = '';
		for ( $i = 0; $i <= 2; $i++ ) {
			$cl[ $i ] = hexdec( $cl[ $i ] );
			$cl[ $i ] = $cl[ $i ] + $changement_ton;
			if ( $cl[ $i ] < 0 ) :
				$cl[ $i ] = 0;
			endif;
			if ( $cl[ $i ] > 255 ) :
				$cl [ $i ] = 255;
			endif;
			$couleur .= StrToUpper( substr( '0' . dechex( $cl[ $i ] ), -2 ) );
		}
		return '#' . $couleur;
	}
endif;
