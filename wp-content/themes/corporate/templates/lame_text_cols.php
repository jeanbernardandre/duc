<div class="<?php the_sub_field('fd_bg'); ?>">
    <section class="container text_cta">
        <?php
            $count = count(get_sub_field('c_cols'));
            if (have_rows('c_cols')) {
                while (have_rows('c_cols')) {
                    the_row();
                    $image = get_sub_field('c_col_img');
        ?>
                        <article class="col<?php echo $count; ?>">
                            <?php if (get_sub_field('c_col_img')) { ?>
                                <div class="img">
                                    <?php if (get_sub_field('c_col_link')) { ?>
                                        <a
                                            href="<?php the_sub_field('c_col_link'); ?>"
                                            <?php echo get_sub_field('c_col_link_target') ? ' target="blank"' : ''; ?>
                                        >
                                            <img
                                                src="<?php echo $image['sizes']['medium_large']; ?>"
                                                alt="<?php echo $image['alt']; ?>"
                                            >
                                        </a>
                                    <?php } else { ?>
                                    <img src="<?php echo $image['sizes']['medium_large']; ?>" alt="<?php echo $image['alt']; ?>">
                                    <?php } ?>
                                </div>
                            <?php } ?>
                            <?php the_sub_field('c_col_txt'); ?>
                            <div class="text-center">
                                <?php include('partials/_cta.php'); ?>
                            </div>
                        </article>
            <?php
                }
            }
        ?>
    </section>
</div>
