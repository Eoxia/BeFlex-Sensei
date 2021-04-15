<?php
/**
 * The sidebar containing the main widget area
 *
 * @author    Eoxia <contact@eoxia.com>
 * @copyright (c) 2006-2019 Eoxia <contact@eoxia.com>
 * @license   AGPLv3 <https://spdx.org/licenses/AGPL-3.0-or-later.html>
 * @package   beflex
 * @since     3.0.0
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */


if ( ! is_active_sidebar( 'sensei-lesson' ) ) :
    return;
endif;
?>

<?php
$post_types = array( 'lesson', 'quiz', 'question' );
$taxes      = array( 'module' );

if ( is_singular( $post_types ) || is_tax( $taxes ) ) :
    ?>
    <aside id="secondary" class="widget-area" role="complementary">
        <?php dynamic_sidebar( 'sensei-lesson' ); ?>
    </aside><!-- #secondary -->
    <?php
endif;
?>



