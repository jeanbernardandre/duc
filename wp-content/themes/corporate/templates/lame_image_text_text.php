<?php $image = get_sub_field('lit_img'); ?>
<div class="<?php the_sub_field('fd_bg'); ?>">
    <section class="container img_text_cta">
        <?php
            if (get_sub_field('lit_pos') === 'left') {
                include('partials/_image_video.php');
            }
        ?>
        <article class="txt <?php echo get_sub_field('lit_ratio') === true ? ' deuxtiers' : ''; ?> <?php echo get_sub_field('lit_pos') === 'left' ? 'left' : 'right'; ?>">
            <?php echo empty(get_sub_field('lit_title')) === false ? '<h2>' . get_sub_field('lit_title') . '</h2>' : ''; ?>
            <div class="itt-articles-wrapper">
                <article><?php echo get_sub_field('lit_text_g'); ?></article>
                <article><?php echo get_sub_field('lit_text_d'); ?></article>
            </div>
        </article>
        <?php
            if (get_sub_field('lit_pos') === 'right') {
                include('partials/_image_video.php');
            }
        ?>
    </section>
</div>