<?php
/**
 * The Template for outputting Message Archive items
 *
 * Override this template by copying it to yourtheme/sensei/loop-message.php
 *
 * @author      Automattic
 * @package     Sensei
 * @category    Templates
 * @version     1.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * This runs before the the message loop items in the loop-message.php template. It runs
 * only only for the message post type. This loop will not run if the current wp_query
 * has no posts.
 *
 * @since 1.9.0
 */
do_action( 'sensei_loop_message_before' );
?>

<div class="message-container" >

	<?php
	/**
	 * This runs before the post type items in the loop.php template. It
	 * runs within the message loop <ul> tag.
	 *
	 * @since 1.9.0
	 */
	do_action( 'sensei_loop_message_inside_before' );
	?>

	<?php
	// loop through all messages
	while ( have_posts() ) {
		the_post();

		$course_id = get_post_meta( get_the_ID(), '_post', true );
		$last_update = get_message_last_update( get_the_ID() );

		?>
		<a href="<?php the_permalink(); ?>">
			<div class="message-title">
				<?php printf(
					esc_html__( 'Conversation du cours : %s', 'beflex-child' ),
					get_the_title( $course_id )
				); ?>
			</div>

			<?php if ( ! empty( $last_update ) ) : ?>
				<div class="message-data-container">
					<?php echo $last_update; ?>
				</div>
			<?php endif; ?>
		</a>
		<?php

	}
	?>

	<?php
	/**
	 * This runs after the post type items in the loop.php template. It runs
	 * only for the specified post type
	 *
	 * @since 1.9.0
	 */
	do_action( 'sensei_loop_message_inside_after' );
	?>

</div>

<?php
/**
 * This runs after the post type items in the loop.php template. It runs
 * only for the specified post type
 *
 * @since 1.9.0
 */
do_action( 'sensei_loop_message_after' );
?>
