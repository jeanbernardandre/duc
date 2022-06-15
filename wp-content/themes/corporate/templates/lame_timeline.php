<div class="container timeline">
    <?php
        $image = [];
        $title = [];
        $text = [];
        if (have_rows('ft_element')) {
            while (have_rows('ft_element')) {
                the_row();
                $image[] = get_sub_field('ft_img');
                $imageMobile[] = get_sub_field('ft_img_mob');
                $imageMobileDel[] = get_sub_field('ft_img_mob_del');
                $title[] = get_sub_field('ft_title');
                $text[] = get_sub_field('ft_text');
            }
        }
        if (wp_is_mobile() === false) {
    ?>
            <div class="forSlider fleft">
                <?php
                    for ($i = 0; $i < count($title); $i++) {
                ?>
                    <div class="item" style="background-image:url('<?php echo $image[$i]['sizes']['large']; ?>')">
                        <div class="bullel"><?php echo timelineClean($title[$i]); ?></div>
                        <div class="buller"><?php echo timelineClean($title[$i]); ?></div>
                        <article class="text">
                            <h3><?php echo timelineClean($title[$i]); ?></h3>
                            <div><?php echo $text[$i]; ?></div>
                        </article>
                        <article class="image">
                            <img src="<?php echo $image[$i]['sizes']['medium']; ?>" alt="<?php echo get_post_meta($image[$i]['id'], '_wp_attachment_image_alt', true); ?>">
                        </article>
                    </div>
                <?php
                    }
                ?>
            </div>
            <div class="navSlider fright">
                <?php
                    for ($i = 0; $i < count($title); $i++) {
                ?>
                        <div class="item"></div>
                <?php
                    }
                ?>
            </div>
            <div class="datewrapper2" style="">
                <h2 class="desktop"><?php the_sub_field('ft_titre'); ?></h2>
                <hr>
                <div class="dateSlider2">

                    <?php
                        for ($i = 0; $i < count($title); $i++) {
                    ?>
                            <div class="item"><?php echo $title[$i]; ?></div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        <?php
            } else {
        ?>
            <h2 class="mobile"><?php the_sub_field('ft_titre'); ?></h2>
            <div class="accordion">
                <?php
                    for ($i = 0; $i < count($title); $i++) {
                        $imgBackground = $imageMobile[$i] === false ? $image[$i] : $imageMobile[$i];
                ?>
                        <section style="background-image:url('<?php echo $imgBackground['sizes']['large']; ?>')">
                            <h3><?php echo timelineClean($title[$i]); ?></h3>
                            <div> <?php echo $text[$i]; ?></div>
                            <?php
                                if (empty($imageMobileDel[$i][0])) {
                            ?>
                                <div class="img">
                                    <img
                                        src="<?php echo $image[$i]['sizes']['medium']; ?>"
                                        alt="<?php echo get_post_meta($image[$i]['id'], '_wp_attachment_image_alt', true); ?>"
                                    >
                                </div>
                            <?php
                                }
                            ?>
                        </section>
                <?php
                    }
                ?>
            </div>
        <?php
            }
        ?>
</div>
