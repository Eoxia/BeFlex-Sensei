<?php
/**
 * Template part for displaying advanced ACF bio in author page
 *
 * @author    Eoxia <contact@eoxia.com>
 * @copyright (c) 2006-2019 Eoxia <contact@eoxia.com>
 * @license   AGPLv3 <https://spdx.org/licenses/AGPL-3.0-or-later.html>
 * @package   beflex
 * @since     3.0.0
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

$user_id = $args['user_id'];
$bio     = $args['bio'];

if ( empty( $bio ) ) :
	return;
endif;
?>
<div class="author-bio">
	<?php echo $bio; ?>
</div>
