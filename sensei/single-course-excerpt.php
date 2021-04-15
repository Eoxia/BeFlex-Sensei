<?php
/**
 * The Template for outputting the header of single course
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
?>

<?php if ( has_excerpt() ) : ?>
	<div class="course-header-excerpt"><?php echo wp_kses_post( get_the_excerpt( $post->ID ) ); ?></div>
<?php endif; ?>
