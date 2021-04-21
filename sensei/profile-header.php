<?php
/**
 * The Template for outputting the header of profile page
 *
 * @author    Eoxia <contact@eoxia.com>
 * @copyright (c) 2006-2019 Eoxia <contact@eoxia.com>
 * @license   AGPLv3 <https://spdx.org/licenses/AGPL-3.0-or-later.html>
 * @package   beflex
 * @since     3.0.0
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

?>
<div class="header-profile-container">
	<?php
	if ( ! empty( $args['avatar'] ) ) :
		echo $args['avatar'];
	endif;
	?>
	<div class="author-name-container">
		<?php if ( ! empty( $args['display_name'] ) ) : ?>
			<h1 class="header-title"><?php echo esc_html( $args['display_name'] ); ?></h1>
		<?php endif; ?>
		<?php if ( ! empty( $args['description'] ) ) : ?>
			<div class="header-excerpt"><?php echo esc_html( $args['description'] ); ?></div>
		<?php endif; ?>
	</div>
</div>

