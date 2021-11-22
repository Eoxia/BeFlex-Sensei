<?php
/**
 * Teacher new message email
 *
 * @author  Automattic
 * @package Sensei/Templates/Emails/HTML
 * @version 2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Get data for email content
global $sensei_email_data;

// For gmail compatibility, including CSS styles in head/body are stripped out therefore styles need to be inline. These variables contain rules which are added to the template inline. !important; is a gmail hack to prevent styles being stripped if it doesn't like something.
$background_button = get_field( 'beflex_opt_sensei_email_button_background', 'options' );
$color_button      = get_field( 'beflex_opt_sensei_email_button_color', 'options' );
$background_button = ! empty( $background_button ) ? $background_button : '#202020';
$color_button      = ! empty( $color_button ) ? $color_button : '#fff';

$button = '
	display: inline-block;
	color: ' . esc_attr( $color_button ) . ";
	background: $background_button;
	padding: 10px 12px;
	border-radius: 6px;
	-webkit-border-radius: 6px;
	text-decoration: none;
	font-weight: 600;
	font-size: 14px;
";
$box_message = "
	background: #f1f1f1;
	color: rgba(0,0,0,0.7);
	font-style: italic;
	padding: 20px;
	border-radius: 6px;
	font-size: 14px;
	line-height: 1.4;
";

// $template is provided by the calling code.
// phpcs:ignore VariableAnalysis.CodeAnalysis.VariableAnalysis.UndefinedVariable
do_action( 'sensei_before_email_content', $template );
?>

<p style="text-align: center;">
	<?php esc_html_e( 'The Course', 'sensei-lms' ); ?> <strong><?php echo esc_html( $sensei_email_data['course_name'] ); ?></strong> <?php echo esc_html_e( 'was submitted for review by ', 'sensei-lms' ); ?> <strong>"<?php echo esc_html( $sensei_email_data['teacher']->display_name ); ?>"</strong>
</p>

<p style="text-align: center;">
	<a href="<?php echo esc_url( $sensei_email_data['course_edit_link'] ); ?>" style="<?php echo esc_attr( $button ); ?>"><?php esc_html_e( 'Review and publish the new course', 'beflex-child' ); ?></a>
</p>

<?php

do_action( 'sensei_after_email_content', $sensei_email_data['template'] );

?>
