<section class="container lame_image">
    <div class="images">
        <?php
            if (have_rows('li_imgs')) {
                $iterator = 0;
                $size = 'large';
                while (have_rows('li_imgs')) {
                    the_row();
                    $iterator++;
                }
                if ($iterator === 1) {
                    if (wp_is_mobile()) {
                        $widthDiv = 100;
                    } else {
                        $widthDiv = 90;
                    }
                    $size= 'corpo_main_image';
                } elseif (wp_is_mobile()) {
                    $widthDiv = 100;
                } else {
                    $widthDiv = round(100 / $iterator) - 4;
                }
                while (have_rows('li_imgs')) {
                    the_row();
            ?>
                <div class="image" style="width:<?php echo $widthDiv; ?>% ;">
                    <?php
                        if (empty(get_sub_field('li_link')) === false) {
                            echo get_sub_field('li_target') === false ? '<a href="' . get_sub_field('li_link') . '">' : '<a href="' . get_sub_field('li_link') . '" target="blank">';
                        }
                    ?>
                        <img
                            src="<?php echo get_sub_field('li_img')['sizes'][$size]; ?>"
                            alt="<?php echo get_post_meta(get_sub_field('li_img')['id'], '_wp_attachment_image_alt', true); ?>"
                            class="img_responsive"
                        >
                    <?php echo empty(get_sub_field('li_link')) === false ? '</a>' : ''; ?>
                </div>
            <?php
                }
            }
        ?>
    </div>
</section>