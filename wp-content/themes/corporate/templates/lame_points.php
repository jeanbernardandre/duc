<section class="points">
    <section class="container pointswrapper">
        <?php
            if (have_rows('lame_points')) {
                while (have_rows('lame_points')) {
                    the_row();
                    ?>
                    <article class="point">
                        <i class="fas fa-<?php echo trim(get_sub_field('points_icon')); ?>"></i>
                        <p><?php the_sub_field('points_text'); ?></p>
                    </article>
                    <?php
                }
            }
        ?>
    </section>
</section>