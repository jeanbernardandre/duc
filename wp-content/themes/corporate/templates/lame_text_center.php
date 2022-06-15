<section class="lame-text-center">
    <div class="section-container">
        <?php
            if (empty(get_sub_field('tc_title')) === false) {
        ?>
            <h2 class="title-section text-center"><?php the_sub_field('tc_title'); ?></h2>
        <?php
            }
        ?>
        <?php
            if (empty(get_sub_field('tc_subtitle')) === false) {
        ?>
            <h3 class="subtitle-section text-center"><?php the_sub_field('tc_subtitle'); ?></h3>
        <?php
            }
        ?>
        <div class="paragraph-section text-center">
            <?php the_sub_field('tc_content'); ?>
        </div>
        <?php
            if (empty(get_sub_field('tc_link')) === false) {
                $target = get_sub_field('tc_link_target') === 'oui' ? 'blank' : '';
            ?>
                <div class="text-center">
                    <a
                        class="button-type"
                        href="<?php the_sub_field('tc_link'); ?>"
                        target="<?php echo $target; ?>"
                    >
                        <?php the_sub_field('tc_link_title'); ?>
                    </a>
                </div>
                <?php
            }
        ?>
    </div>
</section>