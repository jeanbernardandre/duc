<article class="img <?php echo get_sub_field('lit_ratio') === true ? ' deuxtiers' : ''; ?> <?php echo get_sub_field('lit_pos') === 'left' ? 'left' : 'right'; ?>">
    <?php
        if (empty(get_sub_field('lit_video')) === false || empty(get_sub_field('lit_video_b')) === false) {
            $image = get_sub_field('lit_video_poster');
            $size = wp_is_mobile() ? 'medium' : 'large';

            if (get_sub_field('v_start') === false) {
    ?>
                <div class="playercenter" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/dist/img/player-center.svg')"></div>
                <div class="player" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/dist/img/player.png')"></div>
                <div class="overlay" <?php echo empty($image) === false ? 'style="background-image: url(\'' . $image['sizes'][$size] . '\')"' : ''; ?>></div>
    <?php
            }
    ?>
                <video
                    <?php echo get_sub_field('v_start') ? 'muted' : ''; ?>
                    class="video-lame <?php echo get_sub_field('v_start') ? 'autostart' : ''; ?>"
                    src="<?php echo empty(get_sub_field('lit_video_b')) === false ? get_sub_field('lit_video_b')['url'] : get_sub_field('lit_video'); ?>"
                    width="100%"
                    height="auto"
                    controls
                    controlsList="nodownload"
                    data-name="video-0"
                    <?php echo empty($image) === false ? 'poster="' . $image['sizes'][$size] . '"' : ''; ?>
                    <?php echo get_sub_field('video_loop') ? 'loop' : ''; ?>
                >
                    <?php if (get_sub_field('lit_video')) { ?>
                        <source
                            src="<?php echo get_sub_field('lit_video'); ?>"
                            type="video/<?php echo substr(get_sub_field('lit_video'), -3, 3); ?>"
                        >
                    <?php } else { ?>
                        <source
                            src="<?php echo get_sub_field('lit_video_b')['url']; ?>"
                            type="video/<?php echo get_sub_field('lit_video_b')['mime_type'] === 'video/mp4' ? 'mp4' : 'webm'; ?>"
                        >
                    <?php } ?>
                    <?php _e('Votre navigateur ne prend pas en charge les vidéos HTML5.'); ?>
                </video>
    <?php
            } else if (get_field('lit_img')) {
    ?>
        <img src="<?php the_field('lit_img')['src']['']; ?>" alt="<?php the_field('lit_img')['alt']; ?>" class="img_responsive">
    <?php
        } else {
            if (count(get_sub_field('lit_img_repeat')) === 1) {
    ?>
                <img
                    src="<?php echo get_sub_field('lit_img_repeat')[0]['lit_img_r']['sizes']['medium_large']; ?>"
                    alt="<?php echo get_sub_field('lit_img_repeat')[0]['lit_img_r']['alt']; ?>"
                    class="img_responsive"
                >
           <?php } else {  ?>
                <huttopia-slide class="img-text-cta">
                    <div class="slides">
                        <?php
                            if (have_rows('lit_img_repeat')) {
                                while (have_rows('lit_img_repeat')) {
                                    the_row();
                        ?>
                                    <img loading="lazy" src="<?php echo get_sub_field('lit_img_r')['sizes']['medium_large']; ?>" alt="<?php echo get_sub_field('lit_img_r')['alt']; ?>" />
                        <?php
                                }
                            }
                        ?>
                    </div>
                    <svg class="previous"><use href="<?php echo get_template_directory_uri(); ?>/assets/dist/img/component-slide.svg#arrow-left"></use></svg>
                    <svg class="next"><use href="<?php echo get_template_directory_uri(); ?>/assets/dist/img/component-slide.svg#arrow-right"></use></svg>
                </huttopia-slide>
    <?php
            }
        }
