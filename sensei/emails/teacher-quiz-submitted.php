<?php
/**
 * Teacher quiz submitted email
 *
 * @author  Automattic
 * @package Sensei/Templates/Emails/HTML
 * @version 2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly ?>

<?php

// Ignore undefined variables - they are provided by the $sensei_email_data global.
// phpcs:disable VariableAnalysis.CodeAnalysis.VariableAnalysis.UndefinedVariable

// Get data for email content
global $sensei_email_data;
extract( $sensei_email_data );

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

?>

<?php do_action( 'sensei_before_email_content', $template ); ?>

<p style="text-align: center;">
	<?php esc_html_e( 'Your student', 'sensei-lms' ); ?> <strong><?php echo esc_html( $learner_name ); ?> </strong>
	<?php
	// translators: Placeholder is the translated text for "passed" or "failed".
	printf( esc_html__( 'has submitted the quiz for lesson', 'sensei-lms' ), esc_html( $passed ) );
	?>
	<strong> <?php echo esc_html( get_the_title( $lesson_id ) ); ?></strong> <?php esc_html_e( 'for grading.', 'sensei-lms' ); ?>
</p>

<p style="text-align: center;">
<?php
printf(
	// translators: Placeholders are an opening and closing <a> tag linking to the grading page for the quiz.
	esc_html__( 'You can grade this quiz %1$shere%2$s.', 'sensei-lms' ),
	'<a href="' .
	esc_url( admin_url( 'admin.php?page=sensei_grading&user=' . $learner_id . '&quiz_id=' . $quiz_id ) ) .
	'" style="' . esc_attr( $button ) . '">',
	'</a>'
);
?>
</p>

<?php do_action( 'sensei_after_email_content', $template ); ?>
