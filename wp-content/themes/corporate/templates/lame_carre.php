<main class="container" id="main">
    <section class="produits">
        <?php
            if (have_rows('lame_carres')) {
                while (have_rows('lame_carres')) {
                    the_row();
                    $squarePicto = get_sub_field('sq_icon');
        ?>
                    <a href="<?php echo the_sub_field('sq_link'); ?>" class="prod">
                        <article class="produit <?php echo empty(get_sub_field('sq_brand')) === false ? 'logo' : ''; ?>">
                    <?php
                        if (empty(get_sub_field('sq_brand')) === false) {
                            ?>
                            <h3 class="<?php echo the_sub_field('sq_bg'); ?>"><?php echo the_sub_field('sq_brand'); ?></h3>
                            <?php
                        }
                    ?>
                            <div class="picto"><img src="<?php echo $squarePicto['sizes']['thumbnail']?>" alt=""></div>
                            <div class="titre"><?php echo the_sub_field('sq_title'); ?></div>
                        </article>
                    </a>
            <?php
            }
        }
        ?>
    </section>
</main>