<section class="container lameimagetextsimple-repeat">
    <?php
        $iterator = 0;
        if (have_rows('it_imagetxt')) {
            while (have_rows('it_imagetxt')) {
                the_row();
                $image = get_sub_field('it_img');
    ?>
                <div class="wrapper">
                    <div class="illustration <?php echo $iterator & 1 ? 'mobileon' : ''; ?>" style="background-image: url('<?php echo $image['sizes']['medium_large']; ?>')">
                    </div>
                    <article class="realisation <?php echo $iterator & 1 ? 'left' : ''; ?>">
                        <?php
                            if (get_sub_field('it_cite') === true) {
                        ?>
                            <div class="quote">
                                <svg>
                                    <use xlink:href='#quote'/>
                                </svg>
                            </div>
                        <?php
                            }
                        ?>
                        <?php the_sub_field('it_txt'); ?>
                    </article>
                    <?php if ($iterator & 1) { ?>
                        <div class="illustration mobileoff" style="background-image: url('<?php echo $image['sizes']['medium_large']; ?>')"></div>
                    <?php } ?>
                </div>
    <?php
                    $iterator++;
            }
        }
    ?>
</section>