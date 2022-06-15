<?php $image = get_sub_field('lit_img'); ?>
<div class="<?php the_sub_field('fd_bg'); ?>">
    <section class="container title_image_text_text">
        <?php echo empty(get_sub_field('lit_title')) === false ? '<h2>' . strip_tags(get_sub_field('lit_title'), '<br><p>') . '</h2>' : ''; ?>
        <?php
            include('partials/_image_video.php');
        ?>
        <div class="itt-articles-wrapper">
            <article><?php echo get_sub_field('lit_text_g'); ?></article>
            <article><?php echo get_sub_field('lit_text_d'); ?></article>
        </div>
    </section>
</div>