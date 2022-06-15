<section class="accroche actuaccroche">
    <article class="container">
        <?php
            if (empty(get_sub_field('acc_pictog')) === false) {
        ?>
            <div class="pictol"><img src="<?php echo get_sub_field('acc_pictog')['sizes']['medium_large']; ?>" style="width: 180px"></div>
        <?php
            }
        ?>
        <div class="accroche" <?php echo empty(get_sub_field('acc_pictod')) ? 'style="grid-column: span 10;"' : ''; ?>>
            <?php the_sub_field('acc_texte'); ?>
        </div>
        <?php
            if (empty(get_sub_field('acc_pictod')) === false) {
        ?>
            <div class="pictor"><img src="<?php echo get_sub_field('acc_pictod')['sizes']['medium_large']; ?>" style="width: 180px"></div>
        <?php
            }
        ?>
    </article>
</section>