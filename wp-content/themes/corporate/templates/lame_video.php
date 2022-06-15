<?php
    $image = get_sub_field('v_img');
    $size = wp_is_mobile() ? 'medium' : 'large';
    if (get_sub_field('v_full') === true) {
?>
        <section
            class="homevideo"
            style="background-image: url('<?php echo empty($image) === false ? $image['sizes'][$size] : ''; ?>')"
        >
    <?php
        } else {
    ?>
        <section class="container homevideo reduced">
    <?php
        }
        if (get_sub_field('video_autoplay') === false) {
    ?>
            <div class="playercenter" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/dist/img/player-center.svg')">
            </div>
            <div class="player" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/dist/img/player.png')">
            </div>
            <div class="overlay" <?php echo empty($image) === false ? 'style="background-image: url(\'' . $image['sizes'][$size] . '\')"' : ''; ?>>
            </div>
    <?php
        }
        if (empty(get_sub_field('v_link')) === false || empty(get_sub_field('video_file')) === false) {
            if (get_sub_field('v_link')) {
                if (strstr(get_sub_field('v_link'), 'http') === false) {
                    $imageLink = site_url() . '/video/' . get_sub_field('v_link') . '.mp4';
                } else {
                    $imageLink = get_sub_field('v_link');
                }
            }
    ?>
            <video
                <?php echo get_sub_field('video_autoplay') ? 'muted' : ''; ?>
                class="video-lame <?php echo get_sub_field('video_autoplay') ? 'autostart' : ''; ?>"
                src="<?php echo empty(get_sub_field('video_file')) === false ? get_sub_field('video_file')['url'] : $imageLink; ?>"
                width="100%"
                height="auto"
                controls
                controlsList="nodownload"
                data-name="video-0"
                <?php echo empty($image) === false ? 'poster="' . $image['sizes'][$size] . '"' : ''; ?>
                <?php echo get_sub_field('video_loop') ? 'loop' : ''; ?>
            >
                <?php if (get_sub_field('v_link')) { ?>
                    <source
                        src="<?php echo $imageLink; ?>"
                        type="video/<?php echo substr($imageLink, -3, 3); ?>"
                    >
                <?php } else { ?>
                    <source
                        src="<?php echo get_sub_field('video_file')['url']; ?>"
                        type="video/<?php echo get_sub_field('video_file')['mime_type'] === 'video/mp4' ? 'mp4' : 'webm'; ?>"
                    >
                <?php } ?>
                <?php _e('Votre navigateur ne prend pas en charge les vidéos HTML5.'); ?>
            </video>
    <?php
        }
    ?>
</section>
