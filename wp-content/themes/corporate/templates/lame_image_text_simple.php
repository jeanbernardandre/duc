<section class="container lameimagetextsimple">
    <?php
        $image = get_sub_field('lit_img');
    ?>
        <div class="wrapper">
            <?php
                if (get_sub_field('lit_pos') === 'left' || wp_is_mobile()) {
                    include('partials/_image_video.php');
                }
            ?>
            <article class="realisation <?php echo get_sub_field('its_pos') === 'left' ? 'left' : 'right'; ?>">
                <?php
                    if (get_sub_field('its_cite') === true) {
                ?>
                    <div class="quote">
                        <svg>
                            <use xlink:href='#quote'/>
                        </svg>
                    </div>
                <?php
                    }
                ?>
                <?php the_sub_field('its_text'); ?>
            </article>
            <?php
                if (get_sub_field('lit_pos') === 'right' && wp_is_mobile() === false) {
                    include('partials/_image_video.php');
                }
            ?>
        </div>
</section>