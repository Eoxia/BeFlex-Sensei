<?php
/**
 * View of BFS Login
 *
 * @author Eoxia <contact@eoxia.com>
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @since 2.0.0
 * @package beflex-sensei
 *
 */

if ( is_user_logged_in() ) :
	$profile_url = Sensei()->learner_profiles->get_permalink( get_current_user_id() );
	?>
	<div class="wp-block-buttons">
		<?php if ( ! empty( $profile_url ) ) : ?>
			<div class="wp-block-button is-style-outline">
				<a href="<?php echo esc_url( $profile_url ); ?>" class="wp-block-button__link has-galaxy-color has-text-color"><i class="fa-regular fa-user"></i> <?php esc_html_e( 'My courses', 'beflex' ); ?> </a>
			</div>
		<?php endif; ?>

		<div class="wp-block-button is-style-fill">
			<a href="<?php echo esc_url( wp_logout_url( home_url() ) ); ?>" class="wp-block-button__link has-anthracite-color has-light-grey-background-color has-text-color has-background"><i class="fa-solid fa-arrow-right-from-bracket"></i> <?php esc_html_e( 'Logout', 'beflex' ); ?></a>
		</div>
	</div>
	<?php
else :
	$my_account_page_id = intval( Sensei()->settings->settings['my_course_page'] );
	$my_courses_url     = get_permalink( $my_account_page_id );

	if ( ! empty( $my_courses_url ) ) :
		?>
		<div class="wp-block-buttons">
			<div class="wp-block-button is-style-outline">
				<a href="<?php echo esc_url( $my_courses_url ); ?>" class="wp-block-button__link has-galaxy-color has-text-color"><i class="fa-regular fa-user"></i> <?php esc_html_e( 'Login', 'beflex' ); ?> </a>
			</div>
		</div>
		<?php
	endif;
endif;
