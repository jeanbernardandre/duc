<div class="<?php the_sub_field('fd_bg'); ?>">
    <div class="container carrouselTop">
        <?php echo empty(get_sub_field('sl_title')) === false ? '<h2>' . get_sub_field('sl_title') . '</h2>' : ''; ?>
        <?php
            if (wp_is_mobile() && have_rows('sl_imgs')) {
                while (have_rows('sl_imgs')) {
                    the_row();
                    $image = get_sub_field('sl_img');
                    ?>
                    <div class="mobile-image">
                        <img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" class="img_responsive">
                    </div>
                    <?php
                }
            } else {
                if (have_rows('sl_imgs')) {
        ?>
        <div class="slider-for">
            <?php
                while (have_rows('sl_imgs')) {
                    the_row();
                    $image = get_sub_field('sl_img');
                    ?>
                    <div class="item">
                        <img src="<?php echo $image['sizes']['medium_large']; ?>" alt="<?php echo $image['alt']; ?>" class="img_responsive">
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="container-arrows">
                <button class="prev2 slick-arrow"></button>
                <button class="next2 slick-arrow"></button>
            </div>
            <?php
                }
            ?>
            <div class="slider-nav">
                <?php
                    if (have_rows('sl_imgs')) {
                        while (have_rows('sl_imgs')) {
                            the_row();
                            $image = get_sub_field('sl_img');
                ?>
                            <div class="item">
                                <img
                                   src="<?php echo $image['sizes']['medium']; ?>"
                                   alt="<?php echo $image['alt']; ?>"
                                   class="img_responsive"
                                >
                            </div>
                <?php
                        }
                    }
                ?>
            </div>
            <?php
                }
            ?>
        </section>
    </div>
</div>