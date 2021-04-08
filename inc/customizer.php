<?php
/**
 * Settings of WordPress theme
 *
 * @author    Eoxia <contact@eoxia.com>
 * @copyright (c) 2006-2019 Eoxia <contact@eoxia.com>
 * @license   AGPLv3 <https://spdx.org/licenses/AGPL-3.0-or-later.html>
 * @package   beflex
 * @since     3.0.0
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

/**
 * Add Beflex settings in WordPress customizer.
 *
 * @param Object $wp_customize object customizer of settings.
 */
function beflex_customize_register( $wp_customize ) {

	$wp_customize->add_setting(
		'beflex_primary_color',
		array(
			'default'           => '#0e6eff',
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'beflex_primary_color',
			array(
				'label'    => __( 'Primary color', 'beflex' ),
				'section'  => 'colors',
				'settings' => 'beflex_primary_color',
			)
		)
	);

}
add_action( 'customize_register', 'beflex_customize_register' );
