<section class="container numbertexts">
    <?php echo empty(get_sub_field('lc_title')) === false ? '<h2>' . get_sub_field('lc_title') . '</h2>' : ''; ?>
    <section class="wrappernumber">
        <?php
            if(have_rows('lc_chiffres')) {
                while (have_rows('lc_chiffres')) {
                    the_row();
        ?>
                    <article class="numbertext">
                        <h3><?php the_sub_field('lc_number'); ?></h3>
                        <div>
                            <span class="bold"><?php the_sub_field('lc_textb'); ?></span>
                            <?php echo empty(get_sub_field('lc_textb')) === false ? '<br>' : ''; ?>
                            <?php the_sub_field('lc_text'); ?>
                        </div>
                    </article>
        <?php
                }
            }
        ?>
    </section>
    <hr>
</section>