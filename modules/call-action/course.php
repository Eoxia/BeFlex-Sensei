<?php
/**
 * Main view of Diaporama Module.
 *
 * @author    Eoxia <dev@eoxia.com>
 * @copyright (c) 2006-2018 Eoxia <dev@eoxia.com>
 * @license
 * @package   BeflexPro\Diaporama\View
 * @since     2.0.0
 */

namespace beflex_pro;

defined( 'ABSPATH' ) || exit;
$tl           = ( ! empty( $call_block->title_level ) ) ? $call_block->title_level : 'h3';
$block_class  = $call_block->get_bloc_class();
$block_style  = $call_block->get_bloc_style();
$button_style = $call_block->get_button_style();
?>

<div class="call-to-block <?php echo esc_attr( $block_class ); ?>" style="<?php echo esc_attr( $block_style ); ?>">
    <figure class="block-thumbnail <?php echo empty( $data['image'] ) ? 'no-thumb' : ''; ?>">
        <?php if ( ! empty( $call_block->display_image ) && ! empty( $data['image'] ) ) : ?>
            <a href="<?php echo esc_url( $data['permalink'] ); ?>">
                <?php echo ( ! empty( $data['image'] ) ) ? wp_get_attachment_image( $data['image'], 'beflex-call-to-action-course' ) : false; ?>
            </a>
        <?php endif; ?>

        <?php if ( $call_block->display_categories && ! empty( $data['categories'] ) ) : ?>
            <div class="block-categories">
                <?php foreach ( $data['categories'] as $cat ) : ?>
                    <a class="block-categorie" href="<?php echo esc_url( get_category_link( $cat ) ); ?>"><?php echo esc_html( $cat->name ); ?></a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </figure>


    <div class="block-content">
        <?php if ( $call_block->display_title && ! empty( $data['title'] ) ) : ?>
            <a href="<?php echo esc_url( $data['permalink'] ); ?>">
                <<?php echo esc_html( $tl ); ?> class="block-title">
                    <?php echo esc_html( $data['title'] ); ?>
                </<?php echo esc_html( $tl ); ?>> <!-- .bloc-title -->
            </a>
        <?php endif; ?>
        
        <?php if ( $call_block->display_content && ! empty( $data['content'] ) ) : ?>
            <?php if ( 'manual' === $call_block->type ) : ?>
                <div class="block-excerpt"><?php echo $data['content']; ?></div>
            <?php else : ?>
                <div class="block-excerpt"><?php echo esc_html( wp_trim_words( $data['content'], 15, ' (...)' ) ); ?></div>
            <?php endif; ?>
        <?php endif; ?>
        
        <?php if ( $call_block->display_button && ! empty( $data['permalink'] ) ) : ?>
            <a href="<?php echo esc_url( $data['permalink'] ); ?>" target="<?php echo esc_attr( $data['permalink_target'] ); ?>" class="button button-primary" style="<?php echo esc_attr( $button_style ); ?>">
                <?php echo ( ! empty( $data['permalink_label'] ) ) ? esc_html( $data['permalink_label'] ) : __( 'Lire la suite', 'beflex-pro' ); ?>
            </a>
        <?php endif; ?>
    </div>

    <div class="block-footer">
        <?php if ( ! empty( $call_block->display_length ) ) : ?>
            <span class="course-length"><i class="far fa-clock"></i> <?php echo esc_html( $data['course_length'] ); ?></span>
        <?php endif; ?>
        <?php if ( ! empty( $call_block->display_author ) ) : ?>
            <span class="course-author">
                <?php echo get_avatar( $data['author'], 20 ); ?>
                <?php echo esc_html( get_the_author_meta( 'display_name', $data['author'] ) ); ?>
            </span>
        <?php endif; ?>
    </div>
</div>
