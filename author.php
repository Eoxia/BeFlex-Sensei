<?php
/**
 * The template for displaying archive pages
 *
 * @author    Eoxia <contact@eoxia.com>
 * @copyright (c) 2006-2019 Eoxia <contact@eoxia.com>
 * @license   AGPLv3 <https://spdx.org/licenses/AGPL-3.0-or-later.html>
 * @package   beflex
 * @since     3.0.0
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

	<main id="primary" class="content-area" role="main">

		<?php do_action( 'beflex_author_posts_before' ); ?>

		<?php
		if ( have_posts() ) :

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			beflex_pagination();

		else :
		endif;
		?>

		<?php do_action( 'beflex_author_posts_after' ); ?>

	</main><!-- #primary -->

<?php
get_sidebar( 'blog' );
get_footer();
