<?php $image = get_sub_field('lit_img'); ?>
<div class="<?php the_field('fd_bg'); ?>">
    <section class="container img_text_cta">
        <?php
            if (get_sub_field('lit_pos') === 'left') {
                include('partials/_image_video.php');
            }
        ?>
        <article
            class="txt <?php echo get_sub_field('lit_ratio') === true ? ' deuxtiers' : ''; ?> <?php echo get_sub_field('lit_pos') === 'left' ? 'left' : 'right'; ?>"
        >
            <?php if (get_field('lit_title')) { ?>
                <h2>
                    <?php the_field('lit_title'); ?>
                </h2>
            <?php } ?>
            <div>
                <?php echo get_sub_field('lit_text'); ?>
                <?php include('partials/_cta.php'); ?>
            </div>
        </article>
        <?php
            if (get_sub_field('lit_pos') === 'right') {
                include('partials/image_video_multiple.php');
            }
            echo get_sub_field('lit_hr') === true ? ' <hr>' : '';
        ?>
    </section>
</div>
