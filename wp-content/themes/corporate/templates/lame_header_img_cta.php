<div class="top-wrapper <?php the_sub_field('fd_bg'); ?>">
    <div class="container">
        <?php
            if (wp_is_mobile() && empty(get_sub_field('lit_title')) === false) {
                echo '<h2 class="headertext">' . get_sub_field('lit_title') . '</h2>';
            }
        ?>
    </div>
    <section
        class="container header-img-cta <?php echo get_sub_field('lit_pos') === 'left' ? 'leftbg' : 'rightbg'; ?>"
        <?php
            if (wp_is_mobile() === false) {
        ?>
        style="background-image: url('<?php echo get_sub_field('lit_img')['sizes']['medium_large']; ?>')"
        <?php
            }
        ?>
    >
        <?php
            if (wp_is_mobile()) {
        ?>
            <div class="mobile-img">
                <img
                    src="<?php echo get_sub_field('lit_img')['sizes']['medium']; ?>"
                    alt="<?php echo get_sub_field('lit_img')['alt']; ?>"
                    class="img_responsive"
                >
            </div>
        <?php
            }
        ?>
        <div class="wrapper <?php echo get_sub_field('lit_pos') === 'left' ? 'left' : 'right'; ?>">
            <?php
                if (wp_is_mobile() === false && empty(get_sub_field('lit_title')) === false) {
                    echo '<h2>' . get_sub_field('lit_title') . '</h2>';
                }
            ?>
            <div class="wrapper-text">
                <?php echo empty(get_sub_field('lit_textg')) === false ? '<div>' . get_sub_field('lit_textg') . '</div>' : ''; ?>
                <?php echo empty(get_sub_field('lit_textd')) === false ? '<div>' . get_sub_field('lit_textd') . '</div>' : ''; ?>
            </div>
            <div class="ctalign"><?php include('partials/_cta.php'); ?></div>
        </div>
    </section>
</div>
