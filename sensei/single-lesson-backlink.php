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

$post = get_post( $args['post_id'] );

if ( empty( $post ) ) :
	return;
endif;

global $sensei;
$backlink = get_permalink( $sensei->lesson->get_course_id( $post->ID ) );

if ( ! empty( $backlink ) ) :
	?>
	<a href="<?php echo esc_url( $backlink ); ?>"><i class="fas fa-reply"></i> <?php esc_html_e( 'Retour au cours', 'beflex-child' ); ?></a>
	<?php
endif;
?>
