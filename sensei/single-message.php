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
					<a href="<?php echo esc_url( $message_url ); ?>">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome 6.3.0 by @fontawesome - https://fontawesome.com License Copyright 2023 Fonticons, Inc. --><path d="M48 256a208 208 0 1 1 416 0A208 208 0 1 1 48 256zm464 0A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM217.4 376.9c4.2 4.5 10.1 7.1 16.3 7.1c12.3 0 22.3-10 22.3-22.3V304h96c17.7 0 32-14.3 32-32V240c0-17.7-14.3-32-32-32H256V150.3c0-12.3-10-22.3-22.3-22.3c-6.2 0-12.1 2.6-16.3 7.1L117.5 242.2c-3.5 3.8-5.5 8.7-5.5 13.8s2 10.1 5.5 13.8l99.9 107.1z"/></svg>
					</a>
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
										<span class="message-data message-date">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome 6.3.0 by @fontawesome - https://fontawesome.com License Copyright 2023 Fonticons, Inc. --><path d="M152 24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H64C28.7 64 0 92.7 0 128v16 48V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V192 144 128c0-35.3-28.7-64-64-64H344V24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H152V24zM48 192H400V448c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V192z"/></svg>
											<?php echo esc_html( $comment_date_day ); ?></span>
										<span class="message-data message-hour">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome 6.3.0 by @fontawesome - https://fontawesome.com License Copyright 2023 Fonticons, Inc. --><path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg>
											<?php echo esc_html( $comment_date_hour ); ?></span>
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
								<span class="message-data message-date">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome 6.3.0 by @fontawesome - https://fontawesome.com License Copyright 2023 Fonticons, Inc. --><path d="M152 24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H64C28.7 64 0 92.7 0 128v16 48V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V192 144 128c0-35.3-28.7-64-64-64H344V24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H152V24zM48 192H400V448c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V192z"/></svg>
									<?php echo esc_html( $comment_date_day ); ?></span>
								<span class="message-data message-hour">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome 6.3.0 by @fontawesome - https://fontawesome.com License Copyright 2023 Fonticons, Inc. --><path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg>
									<?php echo esc_html( $comment_date_hour ); ?></span>
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

