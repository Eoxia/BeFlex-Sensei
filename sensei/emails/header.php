<?php
/**
 * Email Header
 *
 * @author  Automattic
 * @package Sensei/Templates/Emails
 * @version 2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Ignore undefined variables - they are provided by the $sensei_email_data global.
// phpcs:disable VariableAnalysis.CodeAnalysis.VariableAnalysis.UndefinedVariable

// Get data for email content
global $sensei_email_data;
extract( $sensei_email_data );

// Load colours
$bg = '#f5f5f5';
if ( isset( Sensei()->settings->settings['email_background_color'] ) && '' != Sensei()->settings->settings['email_background_color'] ) {
	$bg = Sensei()->settings->settings['email_background_color'];
}

$body = '#fdfdfd';
if ( isset( Sensei()->settings->settings['email_body_background_color'] ) && '' != Sensei()->settings->settings['email_body_background_color'] ) {
	$body = Sensei()->settings->settings['email_body_background_color'];
}

$base = '#557da1';
if ( isset( Sensei()->settings->settings['email_base_color'] ) && '' != Sensei()->settings->settings['email_base_color'] ) {
	$base = Sensei()->settings->settings['email_base_color'];
}
$base_text = sensei_light_or_dark( $base, '#202020', '#ffffff' );

$text = '#505050';
if ( isset( Sensei()->settings->settings['email_text_color'] ) && '' != Sensei()->settings->settings['email_text_color'] ) {
	$text = Sensei()->settings->settings['email_text_color'];
}

$bg_darker_10    = sensei_hex_darker( $bg, 10 );
$base_lighter_20 = sensei_hex_lighter( $base, 20 );
$text_lighter_20 = sensei_hex_lighter( $text, 20 );

$logo_header_email = get_field( 'beflex_opt_sensei_email_logo', 'options' );

$img = '';
if ( isset( Sensei()->settings->settings['email_header_image'] ) && '' != Sensei()->settings->settings['email_header_image'] ) {
	$img = Sensei()->settings->settings['email_header_image'];
}

// For gmail compatibility, including CSS styles in head/body are stripped out therefore styles need to be inline. These variables contain rules which are added to the template inline. !important; is a gmail hack to prevent styles being stripped if it doesn't like something.
$wrapper = '
	background-color: ' . esc_attr( $bg ) . ';
	width:100%;
	-webkit-text-size-adjust:none !important;
	margin:0;
	padding: 0;
';
$template_container = "
	border-top-left-radius: 6px;
	-webkit-border-top-left-radius: 6px;
	border-top-right-radius: 6px;
	-webkit-border-top-right-radius: 6px;
	z-index: 10;
	position: relative;
	margin: auto;
	width: 100%;
	max-width: 600px;
";
$template_header_content    = '
	background-color: ' . esc_attr( $body ) . ";
	-webkit-border-top-left-radius:6px !important;
	-webkit-border-top-right-radius:6px !important;
	border-top-left-radius:6px !important;
	border-top-right-radius:6px !important;
	border-bottom: 0;
	font-family:Arial;
	font-weight:bold;
	line-height:100%;
	vertical-align:middle;
";
$header_background = '
	background: url( ' . esc_url( esc_url( $img ) ) . ") $base';
	background-size: cover;
	overflow: hidden;
";
$template_header    = '
	background-color: ' . esc_attr( $base ) . ";
	color: $base_text;
	-webkit-border-top-left-radius:6px !important;
	-webkit-border-top-right-radius:6px !important;
	border-top-left-radius:6px !important;
	border-top-right-radius:6px !important;
	border-bottom: 0;
	font-family:Arial;
	font-weight:bold;
	line-height:100%;
	vertical-align:middle;
";
$body_content       = '
	background-color: ' . esc_attr( $body ) . ";
	margin: auto;
	width: 100%;
	max-width: 600px;
	padding: 0 36px;
	font-family:Arial;
";
$body_content_inner = "
	color: $text_lighter_20;
	font-family:Arial;
	font-size:16px;
	line-height:150%;
	text-align:left;
";
$header_content_h1  = '
	color: ' . esc_attr( $base_text ) . ";
	margin:0;
	padding: 40px 36px;
	display:block;
	font-family:Arial;
	font-size:18px;
	font-weight:bold;
	text-align:left;
	line-height: 150%;
	color: #000;
	text-align: center;
";

?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title><?php echo esc_html( get_bloginfo( 'name' ) ); ?></title>
		<style>
			.button { <?php echo esc_attr( $button ); ?> }
		</style>
	</head>

	<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
		<div style="<?php echo esc_attr( $wrapper ); ?>">
			<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
				<tr>
					<td style="background: url(<?php echo esc_url( esc_url( $img ) ); ?>) <?php echo $base; ?>; background-size: cover; overflow: hidden;">
						<table border="0" cellpadding="0" cellspacing="0" id="template_container" style="<?php echo esc_attr( $template_container ); ?>">
							<tr><td style="text-align: center; padding: 30px 0 20px 0"><img src="<?php echo esc_url( $logo_header_email ); ?>"></td></tr>
							<tr>
								<td style="<?php echo esc_attr( $template_header_content ); ?>">
									<h1 style="<?php echo esc_attr( $header_content_h1 ); ?>"><?php echo esc_html( $heading ); ?></h1>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<!-- End Header -->
				<tr>
					<td>
						<table border="0" cellpadding="0" cellspacing="0" id="template_container" style="<?php echo esc_attr( $body_content ); ?>">
							<tr>
								<td style="padding: 20px 0; border-top: 1px solid rgba(0,0,0,0.2);">
