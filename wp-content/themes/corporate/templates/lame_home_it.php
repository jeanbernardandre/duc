<section class="lamehomes">
    <?php
        if (have_rows('lameh_home')) {
            $iterator = 0;
            while (have_rows('lameh_home')) {
                the_row();
                $image = get_sub_field('lameh_img');
                $leftRightBorder ='';
                if (get_sub_field('lameh_full') === true) {
                    $className = 'full';
                } else {
                    $className = 'half';
                    $leftRightBorder = $iterator % 2 !== 0 ? 'bleft' : 'bright';
                }
            ?>
                <figure class="lamehome <?php echo $className . ' ' . $leftRightBorder; ?>">
                    <a href="<?php echo get_sub_field('lameh_link')['url']; ?>">
                        <picture  class="lametitre" style="background-image: url('<?php echo empty($image) === false ? $image['sizes']['large'] : ''; ?>')">
                        </picture>
                        <figcaption>
                            <h2 class="title"><?php the_sub_field('lameh_title'); ?></h2>
                            <p class="text"><?php echo ucfirst(get_sub_field('lameh_text')); ?></p>
                        </figcaption>
                    </a>
                </figure>
            <?php
                $iterator++;
            }
        }
    ?>
</section>
