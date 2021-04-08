<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @author    Eoxia <contact@eoxia.com>
 * @copyright (c) 2006-2019 Eoxia <contact@eoxia.com>
 * @license   AGPLv3 <https://spdx.org/licenses/AGPL-3.0-or-later.html>
 * @package   beflex
 * @since     3.0.0
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 */

get_header(); ?>

	<main id="primary" class="content-area error-404 not-found" role="main">

		<header class="primary-header">
			<h1 class="page-title"><?php esc_html_e( 'Oops, that page can\'t be found', 'beflex' ); ?></h1>
		</header><!-- .primary-header -->

		<div class="primary-content">
			<p><?php esc_html_e( 'It looks like nothing was found at this location. Perhaps searching can help ? ', 'beflex' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .primary-content -->

	</main><!-- #primary -->

<?php
get_footer();
