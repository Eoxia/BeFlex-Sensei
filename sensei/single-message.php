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
		$block_content = do_blocks( file_get_contents(get_stylesheet_directory() . "/block-templates/archive-course.html") );
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
		the_post();

		?>
		<article id="main-sensei_message" class="post sensei_message-container alignfull">
			<section id="learner-container" class="learner-messages">
				<?php
				$course_id = get_post_meta( get_the_ID(), '_post', true );
				$message_url = get_post_type_archive_link( 'sensei_message' );
				?>
				<div class="message-header">
					<a href="<?php echo esc_url( $message_url ); ?>"><i class="fa-regular fa-circle-left"></i></a>
					<h1 class="message-title">
						<?php printf(
							esc_html__( 'Conversation du cours : %s', 'beflex-child' ),
							get_the_title( $course_id )
						); ?>
					</h1>
				</div>

				<?php
				//			comment_form( array(
				//				'label_submit'         => __( 'Send', 'beflex-child' ),
				//				'logged_in_as'         => '',
				//				'must_log_in'          => '',
				//				'comment_notes_before' => '',
				//				'comment_notes_after'  => '',
				//				'title_reply'          => '',
				//				'format'               => 'html5',
				//				'comment_field'        => '<p class="comment-form-comment"><textarea id="comment" name="comment" aria-required="true" placeholder="' . __( 'Write a new message...', 'beflex-child' ) . '"></textarea></p>',
				//			), get_the_ID() );

				?>
				<?php comment_form(
					array(
						'must_log_in'        => '',
						'logged_in_as'       => '',
						'title_reply'        => '',
						'title_reply_before' => '',
						'title_reply_after'  => '',

					)
				); ?>
<!--			<!- Manual form to fix comments closed bug -->
<!--			<div id="respond" class="comment-respond">-->
<!--					<form action="--><?php //echo esc_url( get_site_url() ); ?><!--/wp-comments-post.php" method="post" id="commentform" class="comment-form" novalidate="">-->
<!--						<p class="comment-form-comment">-->
<!--							<textarea id="comment" name="comment" aria-required="true" placeholder="--><?php //esc_html_e( 'Write a new message...', 'beflex-child' ); ?><!--"></textarea>-->
<!--						</p>-->
<!---->
<!--						<button name="submit" type="submit" id="submit" class="submit"><i class="fa-regular fa-paper-plane"></i> --><?php //esc_html_e( 'Send', 'beflex-child' ); ?><!--</button>-->
<!---->
<!--						<input type="hidden" name="comment_post_ID" value="--><?php //echo get_the_ID(); ?><!--" id="comment_post_ID">-->
<!--						<input type="hidden" name="comment_parent" id="comment_parent" value="0">-->
<!--					</form>-->
<!--				</div>-->

				<?php
				$comments = get_comments( array(
					'post_id' => get_the_ID(),
				) );
				?>
				<div class="message-list-comment">
					<?php if ( ! empty( $comments ) ) : ?>
						<?php foreach ( $comments as $comment ) : ?>
							<div class="message-comment <?php echo ( get_current_user_id() == $comment->user_id ) ? 'message-author' : ''; ?>">
								<?php echo get_avatar( $comment->comment_author_email, 50 ); ?>
								<div class="comment-container">
									<?php if ( ! empty( $comment->comment_content ) ) : ?>
										<div class="comment-content"><?php echo esc_html( $comment->comment_content ); ?></div>
									<?php endif; ?>
									<?php
									$comment_date_day  = get_comment_date( 'd/m/Y', $comment->comment_ID );
									$comment_date_hour = get_comment_date( 'h:i', $comment->comment_ID );
									?>
									<div class="comment-meta">
										<span class="message-data message-date"><i class="fa-regular fa-calendar"></i><?php echo esc_html( $comment_date_day ); ?></span>
										<span class="message-data message-hour"><i class="fa-regular fa-clock"></i><?php echo esc_html( $comment_date_hour ); ?></span>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>

					<div class="message-comment <?php echo ( get_current_user_id() == get_the_author_meta( 'ID' ) ) ? 'message-author' : ''; ?>">
						<?php echo get_avatar( get_the_author_meta( 'ID' ), 50 ); ?>
						<div class="comment-container">
							<?php if ( ! empty( get_the_content() ) ) : ?>
								<div class="comment-content"><?php the_content(); ?></div>
							<?php endif; ?>
							<?php
							$comment_date_day  = get_the_modified_date( 'd/m/Y', get_the_ID() );
							$comment_date_hour = get_the_modified_date( 'h:i', get_the_ID() );
							?>
							<div class="comment-meta">
								<span class="message-data message-date"><i class="fa-regular fa-calendar"></i><?php echo esc_html( $comment_date_day ); ?></span>
								<span class="message-data message-hour"><i class="fa-regular fa-clock"></i><?php echo esc_html( $comment_date_hour ); ?></span>
							</div>
						</div>
					</div>
				</div>

			</section>
			<?php echo bfs_profile_sidebar(); ?>
		</article>

		<footer class="wp-block-template-part site-footer">
			<?php block_footer_area(); ?>
		</footer>
	</div>
	<?php wp_footer(); ?>
	</body>

	</html>

