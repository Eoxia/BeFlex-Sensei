<?php
/**
 * The Template for outputting the meta of course
 *
 * @author    Eoxia <contact@eoxia.com>
 * @copyright (c) 2006-2019 Eoxia <contact@eoxia.com>
 * @license   AGPLv3 <https://spdx.org/licenses/AGPL-3.0-or-later.html>
 * @package   beflex
 * @since     3.0.0
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

$my_messages_url    = get_post_type_archive_link( 'sensei_message' );

if ( ! empty( $my_messages_url ) ) :
	?>
	<a href="<?php echo esc_url( $my_messages_url ); ?>"><i class="fas fa-reply"></i> <?php esc_html_e( 'Back to messages', 'beflex' ); ?></a>
<?php
endif;
?>
