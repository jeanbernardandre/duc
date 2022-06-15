<section class="container numberimages">
    <h2>
        <?php the_sub_field('lci_title1'); ?>
        <br>
        <span class="small"><?php the_sub_field('lci_title2'); ?></span>
    </h2>
    <section class="wrapperimage">
        <?php
            if (have_rows('lci_chiffres')) {
                $iterator = 0;
                while (have_rows('lci_chiffres')) {
                    the_row();
                    $image = get_sub_field('lci_image');
                    ?>
                        <article class="numberimage <?php echo $iterator & 1 ? 'left' : 'right'; ?>" style="background-image: url('<?php echo $image['sizes']['medium_large']; ?>')">
                           <div class="wrapper">
                                <h3><?php the_sub_field('lci_number'); ?></h3>
                                <div>
                                    <?php the_sub_field('lci_text'); ?>
                                </div>
                           </div>
                        </article>
                    <?php
                        $iterator++;
                }
            }
        ?>
    </section>
    <hr>
</section>