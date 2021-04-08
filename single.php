<?php
/**
 * The template for displaying all single posts
 *
 * @author    Eoxia <contact@eoxia.com>
 * @copyright (c) 2006-2019 Eoxia <contact@eoxia.com>
 * @license   AGPLv3 <https://spdx.org/licenses/AGPL-3.0-or-later.html>
 * @package   beflex
 * @since     3.0.0
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 */

get_header(); ?>

	<main id="primary" class="content-area" role="main">

		<?php
		while ( have_posts() ) :

			the_post();
			get_template_part( 'template-parts/content', get_post_format() );

			the_post_navigation(
				array(
					'prev_text' => '<i class="fas fa-angle-left fa-fw"></i> %title',
					'next_text' => '%title <i class="fas fa-angle-right fa-fw"></i>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #primary -->

<?php
get_sidebar( 'blog' );
get_footer();
