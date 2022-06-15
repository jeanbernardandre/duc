<div class="container-fluid header_cta" style="background-image: url('<?php echo get_sub_field('htc_img')['sizes']['large']; ?>')">
    <section>
        <?php echo empty(get_sub_field('htc_title')) === false ? '<h2>' . get_sub_field('htc_title') . '</h2>' : ''; ?>
        <?php echo empty(get_sub_field('htc_stitle')) === false ? '<h6>' . get_sub_field('htc_stitle') . '</h6>' : ''; ?>
        <?php echo empty(get_sub_field('htc_text')) === false ? '<div>' . get_sub_field('htc_text') . '</div>' : ''; ?>
        <?php
            if (wp_is_mobile()) {
                $number = [];
                if (have_rows('htc_bullets')) {
                    while (have_rows('htc_bullets')) {
                        the_row();
                        $number[] = strlen(get_sub_field('htc_caps_texte'));
                    }
                }
            }
            $class = empty($number) === false && max($number) > 18 ? 'double-line' : '';
        ?>
        <div class="bullets-container <?php echo $class; ?>">
            <?php
                if (have_rows('htc_bullets')) {
                    while (have_rows('htc_bullets')) {
                        the_row();
                        ?>
                            <article class="bullet">
                                <span>
                                    <a href="<?php the_sub_field('htc_caps_lien'); ?>">
                                        <?php the_sub_field('htc_caps_texte'); ?>
                                    </a>
                                </span>
                            </article>
                        <?php
                    }
                }
            ?>
        </div>
    </section>
</div>