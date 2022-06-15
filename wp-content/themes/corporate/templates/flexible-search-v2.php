<div class="flexible-search-v2">
    <div class="flexible-search-v2-hero">
        <?php if (get_field('type') === 'video' && wp_is_mobile() === false ) { /*{{ data.video_image.sizes.large }}*/?>
        <div class="flexible-search-v2-video" <!--style="background-image: url()"-->>
            <video
                src="<?php the_field('video'); ?>"
                class="video-lame <?php get_field('v_start') ? 'autostart' : ''; ?>"
                width="100%"
                height="auto"
                data-name="video-0"
                controlsList="nodownload"
                muted
                loop
            >
          <!--      <source src="{{ data.video }}" type="video/{{ extension == 'mp4' ? extension : 'webm' }}">-->
               <?php __('Votre navigateur ne prend pas en charge les vidéos HTML5.', 'huttopia') ?>
            </video>
        </div>
        <?php } else { ?>

        <huttopia-slide class="single-site">
            <div class="slides">
                <?php
                    if (have_rows('slider')) {
                        while (have_rows('slider')) {
                            the_row();
                            ?>
                            <div style="background-image: url(<?php echo get_sub_field('image')['sizes']['large']; ?>)"></div>
                            <?php
                        }
                    }
                ?>
            </div>
            <svg class="previous"><use href="<?php echo get_template_directory_uri(); ?>/assets/dist/img/component-slide.svg#arrow-left"></use></svg>
            <svg class="next"><use href="<?php echo get_template_directory_uri(); ?>/assets/dist/img/component-slide.svg#arrow-right"></use></svg>
        </huttopia-slide>
        <div class="baseline">
            <?php echo get_sub_field('baseline'); ?>
        </div>
    <?php } ?>
    </div>
</div>