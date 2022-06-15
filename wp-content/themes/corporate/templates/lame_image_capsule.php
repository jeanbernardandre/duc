<?php $image = get_sub_field('lic_img'); ?>
<div class="<?php the_sub_field('fd_bg'); ?>">
    <section class="container img_text_cta">
        <?php
            if (get_sub_field('lic_pos') === 'left' || wp_is_mobile()) {
                include('partials/_image_video.php');
            }
        ?>
        <article class="txt <?php echo get_sub_field('lic_pos') === 'left' ? 'left' : 'right'; ?>">
            <?php echo empty(get_sub_field('lic_title')) === false ? '<h2>' . get_sub_field('lic_title') . '</h2>' : ''; ?>
            <div>
                <?php echo get_sub_field('lic_txt'); ?>
                <div class="bullets-container">
                    <?php
                        if(have_rows('lic_caps')) {
                            while (have_rows('lic_caps')) {
                                the_row();
                                ?>
                                    <article class="bullet">
                                        <a href="<?php the_sub_field('lic_caps_lien'); ?>">
                                            <?php the_sub_field('lic_caps_texte'); ?>
                                        </a>
                                    </article>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </article>
        <?php
            if (get_sub_field('lic_pos') === 'right' && wp_is_mobile() === false) {
                include('partials/_image_video.php');
            }
        ?>
    </section>
</div>