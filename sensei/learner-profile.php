<?php
/*
Template Name: Learner profile
*/
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<?php
	$block_content = '';
	?>
	<?php wp_head(); ?>
</head>

<body <?php body_class( 'sensei-template-old' ); ?>>
<?php wp_body_open(); ?>
<div class="wp-site-blocks">

	<header class="wp-block-template-part site-header">
		<?php block_header_area(); ?>
	</header>

	<?php
	/**
	 * This hook fire inside learner-profile.php before the content
	 *
	 * @since 1.9.0
	 *
	 * @hooked Sensei_Learner_Profiles::deprecate_sensei_learner_profile_content_hook   - 10
	 * @hooked Sensei_Templates::fire_sensei_complete_course_hook                      - 20
	 */
	do_action( 'sensei_learner_profile_content_before' );
	?>

	<article class="post alignfull">

		<section id="learner-container" class="learner-info entry fix">

			<?php
			/**
			 * This hook fire inside learner-profile.php inside directly before the content
			 *
			 * @since 1.9.0
			 *
			 * @hooked  Sensei_Templates::fire_frontend_messages_hook
			 */
			do_action( 'sensei_learner_profile_inside_content_before' );
			?>

			<?php $learner_user = Sensei_Learner::find_by_query_var( get_query_var( 'learner_profile' ) ); ?>

			<?php if ( is_a( $learner_user, 'WP_User' ) ) { ?>

				<h1><?php esc_html_e( 'Profile', 'beflex-child' ); ?></h1>

				<div class="profile-info profile-box">
					<?php $user = get_userdata( $learner_user->ID ); ?>
					<div class="box-line">
						<strong><?php esc_html_e( 'Name', 'beflex-child' ); ?></strong> <?php echo esc_html( $user->data->display_name ); ?>
					</div>
					<?php if ( get_current_user_ID() == $learner_user->ID ) : ?>
						<div class="box-line">
							<strong><?php esc_html_e( 'Email', 'beflex-child' ); ?></strong> <?php echo esc_html( $user->data->user_email ); ?>
						</div>
					<?php endif; ?>
				</div>

				<div class="profile-setting profile-box">
					<?php
					// show the user information
					Sensei_Learner_Profiles::user_info( $learner_user );
					?>
				</div>

				<?php

				// show the user courses
				Sensei()->course->load_user_courses_content( $learner_user );

				?>

			<?php } else { ?>

				<p class="sensei-message">

					<?php esc_html_e( 'The user requested does not exist.', 'sensei-lms' ); ?>

				</p>

			<?php } ?>

			<?php
			/**
			 * This hook fire inside learner-profile.php inside directly after the content
			 *
			 * @since 1.9.0
			 */
			do_action( 'sensei_learner_profile_inside_content_after' );
			?>

		</section>

		<?php echo bfs_profile_sidebar(); ?>

	</article>

	<?php
	/**
	 * This hook fire inside learner-profile.php after the content
	 *
	 * @since 1.9.0
	 */
	do_action( 'sensei_learner_profile_content_after' );
	?>

	<?php echo $block_content; ?>

	<footer class="wp-block-template-part site-footer">
		<?php block_footer_area(); ?>
	</footer>
</div>
<?php wp_footer(); ?>
</body>

</html>
