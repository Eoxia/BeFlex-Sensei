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

$course = get_post( $args['course'] );

if ( empty( $course ) ) :
	return;
endif;

$my_account_page_id = intval( Sensei()->settings->settings['my_course_page'] );
$my_courses_url     = get_permalink( $my_account_page_id );
?>

<?php if ( ! empty( $my_courses_url ) ) : ?>
	<a href="<?php echo esc_url( $my_courses_url ); ?>"><i class="fas fa-reply"></i> <?php esc_html_e( 'Back to my courses', 'beflex' ); ?></a>
<?php endif; ?>
<h1 class="header-title"><?php echo esc_html( $course->post_title ); ?></h1>
