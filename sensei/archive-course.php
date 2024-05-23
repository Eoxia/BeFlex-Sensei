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
	$block_content = do_blocks( file_get_contents( locate_template( 'block-templates/archive-course.html' ) ) );
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

	<?php echo $block_content; ?>

	<footer class="wp-block-template-part site-footer">
		<?php echo $block_footer; ?>
	</footer>
</div>
<?php wp_footer(); ?>
</body>

</html>
