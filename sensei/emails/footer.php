<?php
/**
 * Email Footer
 *
 * @author  Automattic
 * @package Sensei/Templates/Emails
 * @version 2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $sensei_email_data;
extract( $sensei_email_data );

// Load colours
$base = '#557da1';
if ( isset( Sensei()->settings->settings['email_base_color'] ) && '' != Sensei()->settings->settings['email_base_color'] ) {
	$base = Sensei()->settings->settings['email_base_color'];
}

$base_lighter_40 = sensei_hex_lighter( $base, 40 );

// translators: Placeholder is the blog name.
$footer_text = sprintf( __( '%1$s - Powered by Sensei LMS', 'sensei-lms' ), get_bloginfo( 'name' ) );
if ( isset( Sensei()->settings->settings['email_footer_text'] ) ) {
	$footer_text = Sensei()->settings->settings['email_footer_text'];
}

// For gmail compatibility, including CSS styles in head/body are stripped out therefore styles need to be inline. These variables contain rules which are added to the template inline.
$template_footer = '
	border-top:0;
	-webkit-border-radius:6px;
';

$credit = "
	border:0;
	color: $base_lighter_40;
	font-family: Arial;
	font-size:12px;
	line-height:125%;
	text-align:center;
";
$footer_content = "
	background-color: #202020;
	color: rgba(255,255,255,0.6);
	border-bottom-left-radius: 6px;
	-webkit-border-bottom-left-radius: 6px;
	border-bottom-right-radius: 6px;
	-webkit-border-bottom-right-radius: 6px;
	margin: auto;
	width: 100%;
	max-width: 600px;
	padding: 0 36px;
	font-family:Arial;
	margin-bottom: 30px;
";
?>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<!-- End content -->
			<tr>
				<td>
					<table border="0" cellpadding="0" cellspacing="0" id="template_footer" style="<?php echo esc_attr( $footer_content ); ?>">
						<tr>
							<td style="padding: 20px 0; border-top: 1px solid rgba(0,0,0,0.2); text-align: center">
								<?php echo wp_kses_post( wpautop( wptexturize( apply_filters( 'sensei_email_footer_text', $footer_text ) ) ) ); ?>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<!-- End footer -->
		</table>
	</div><!-- .wrapper -->
</body>
</html>
