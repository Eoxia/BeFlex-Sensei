<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @author    Eoxia <contact@eoxia.com>
 * @copyright (c) 2006-2019 Eoxia <contact@eoxia.com>
 * @license   AGPLv3 <https://spdx.org/licenses/AGPL-3.0-or-later.html>
 * @package   beflex
 * @since     3.0.0
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

?>

<section class="no-results not-found">
	<header class="primary-header">
		<h2 class="page-title"><?php esc_html_e( 'Nothing Found', 'beflex' ); ?></h2>
	</header><!-- .primary-header -->

	<div class="primary-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :
			?>
			<p>
				<?php
				printf(
					wp_kses(
						/* translators: 1: link to WP admin new post page. */
						__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'beflex' ),
						array(
							'a' => array(
								'href' => array(),
							),
						)
					),
					esc_url( admin_url( 'post-new.php' ) )
				);
				?>
			</p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'beflex' ); ?></p>
			<?php
				get_search_form();

		else :
			?>
			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'beflex' ); ?></p>
			<?php
			get_search_form();

		endif;
		?>
	</div><!-- .primary-content -->
</section><!-- .no-results -->
