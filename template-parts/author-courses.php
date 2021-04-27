<?php
/**
 * Template part for displaying courses in author page
 *
 * @author    Eoxia <contact@eoxia.com>
 * @copyright (c) 2006-2019 Eoxia <contact@eoxia.com>
 * @license   AGPLv3 <https://spdx.org/licenses/AGPL-3.0-or-later.html>
 * @package   beflex
 * @since     3.0.0
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

$courses_query = $args['courses_query'];
if ( empty( $courses_query ) ) :
	return;
endif;

if ( $courses_query->have_posts() ) :
	?>
	<div class="course-container">
		<h2><?php echo esc_html( sprintf( __( 'All courses by %s', 'sensei-lms' ), $args['author']->display_name ) ); ?></h2>
		<?php while ( $courses_query->have_posts() ) : $courses_query->the_post(); ?>
			<div class="course">
				<div class="course-content">
					<div class="entry">
						<?php get_template_part( 'sensei/loop-course', 'content', array( 'post_id' => get_the_ID() ) ); ?>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	</div>
<?php
endif;
