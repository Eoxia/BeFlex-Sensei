<?php
/*
Template Name: Example
*/
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<?php
	$block_header  = do_blocks( file_get_contents( locate_template( 'block-template-parts/header.html' ) ) );
	$block_footer  = do_blocks( file_get_contents( locate_template( 'block-template-parts/footer.html' ) ) );
	?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="wp-site-blocks">

	<header class="wp-block-template-part site-header">
		<?php echo $block_header; ?>
	</header>

	<?php
	/**
	 * This action before course messages archive loop. This hook fires within the archive-message.php file.
	 * It fires even if the current archive has no no messages.
	 *
	 * @since 1.9.0
	 *
	 * @hooked Sensei_Messages::the_archive_header -20
	 */
	do_action( 'sensei_archive_before_message_loop' );
	?>

	<article id="main-sensei_message" class="post sensei_message-container alignfull">

		<section id="learner-container" class="learner-messages">

			<h1><?php esc_html_e( 'Messages', 'beflex' ); ?></h1>

			<?php if ( have_posts() ) : ?>

				<?php sensei_load_template( 'loop-message.php' ); ?>

			<?php else : ?>

				<p> <?php esc_html_e( 'You do not have any messages.', 'sensei-lms' ); ?> </p>

			<?php endif; ?>
		</section>

		<?php echo bfs_profile_sidebar(); ?>

	</article>

	<?php
	/**
	 * This action before course messages archive loop. This hook fires within the archive-message.php file.
	 * It fires even if the current archive has no no messages.
	 *
	 * @since 1.9.0
	 */
	do_action( 'sensei_archive_after_message_loop' );
	?>

	<footer class="wp-block-template-part site-footer">
		<?php echo $block_footer; ?>
	</footer>
</div>
<?php wp_footer(); ?>
</body>

</html>
