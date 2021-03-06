<?php
/**
 * Template part for displaying login / logout link in navigation
 *
 * @author    Eoxia <contact@eoxia.com>
 * @copyright (c) 2006-2019 Eoxia <contact@eoxia.com>
 * @license   AGPLv3 <https://spdx.org/licenses/AGPL-3.0-or-later.html>
 * @package   beflex
 * @since     3.0.0
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

$my_account_page_id = intval( Sensei()->settings->settings['my_course_page'] );
$my_courses_url     = get_permalink( $my_account_page_id );

if ( is_user_logged_in() ) :
	$profile_url = Sensei()->learner_profiles->get_permalink( get_current_user_id() );
	?>
	<?php if ( ! empty( $profile_url ) ) : ?>
		<a href="<?php echo esc_url( $profile_url ); ?>" class="button button-primary"><i class="far fa-user"></i> <?php esc_html_e( 'My courses', 'beflex' ); ?> </a>
	<?php endif; ?>
	<a href="<?php echo esc_url( wp_logout_url( home_url() ) ); ?>"><i class="far fa-sign-out-alt"></i> <?php esc_html_e( 'Logout', 'beflex' ); ?></a>
	<?php
else :
	if ( ! empty( $my_courses_url ) ) :
		?>
		<a href="<?php echo esc_url( $my_courses_url ); ?>" class="button button-primary"><i class="far fa-user"></i> <?php esc_html_e( 'Login', 'beflex' ); ?> </a>
		<a href="<?php echo esc_url( $my_courses_url ); ?>"><i class="far fa-edit"></i> <?php esc_html_e( 'Sign in', 'beflex' ); ?></a>
		<?php
	endif;
endif;
?>
