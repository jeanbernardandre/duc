<div class="campings-list-wrapper">
    <div class="">
        <h2><?php _e('Découvrez nos campings en Beaujolais', 'huttopiac'); ?></h2>
        <div class="campings-list">
    <?php
        $args = [
            'post_type' => 'camping',
            'post_status' => 'publish',
            'posts_per_page' => 80,
            'orderby' => 'rand',
        ];

        $loop = new WP_Query( $args );
        $arr = [];

        while ( $loop->have_posts() ) {

            $loop->the_post();
            $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'single-post-thumbnail');
        ?>

            <div class="camping">
                <div class="camping-pic" style="background-image: url(<?php echo $image[0]; ?>)">

                </div>
                <div class="camping-text">
                    <h2><?php the_title(); ?></h2>
                    <?php if(get_field('camping_dates')) { ?>
                        <h4><?php echo get_field('camping_dates'); ?></h4>
                    <?php } ?>
                    <?php the_content(); ?>
                    <div class="cta camping"><?php _e('Visitez le site', 'huttopia'); ?></div>
                    <div class="social">
                        <?php if (empty(get_field('camping_fb')) === false) { ?>
                            <a class="social" target="_blank" href="<?php echo get_field('camping_fb'); ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/dist/img/facebook.svg" alt="facebook">
                            </a>
                        <?php } ?>
                        <?php if (empty(get_field('camping_ig')) === false) { ?>
                            <a class="social" target="_blank" href="<?php echo get_field('camping_ig'); ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/dist/img/instagram.svg" alt="Instagram">
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
    <?php

        }

        wp_reset_postdata();
    ?>
    </div>
    </div>
</div>