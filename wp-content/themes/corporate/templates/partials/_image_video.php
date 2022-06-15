<article class="img <?php echo get_sub_field('lit_ratio') === true ? ' deuxtiers' : ''; ?> <?php echo get_sub_field('lit_pos') === 'left' ? 'left' : 'right'; ?>">
    <?php
        if (empty(get_sub_field('lit_video')) === false) {
            $pathLink = site_url() . '/video/' . get_sub_field('lit_video');
            $path = get_home_path() . '/video/' . get_sub_field('lit_video');
            if (file_exists($path . '.webm')) {
                $extensionVideo = 'webm';
            } elseif (file_exists($path . '.mp4')) {
                $extensionVideo = 'mp4';
            }
            if (empty($extensionVideo) === false) {
    ?>
                <div class="playercenter" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/dist/img/player-center.svg')"></div>
                <div class="player" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/dist/img/player.png')"></div>
                <div class="overlay"
                    <?php echo empty($image) === false ? 'style="background-image: url(\'' . $image['sizes']['large'] . '\')"' : ''; ?>></div>
                    <video
                        class="video-lame"
                        width="100%"
                        height="500px"
                        style="<?php echo get_sub_field('lit_ratio') === true ? ' max-height:266px' : ' max-height:340px'; ?>"
                        controls
                        data-name="video-0"
                        <?php echo empty($image) === false ? 'poster="' . $image['sizes']['large'] . '"' : ''; ?>
                    >
                    <source src="<?php echo $pathLink; ?>.<?php echo $extensionVideo; ?>" type="video/<?php echo $extensionVideo; ?>">
                    <?php _e('Votre navigateur ne prend pas en charge les vidéos HTML5.'); ?>
                </video>
                <?php
            }
        } else {
    ?>
        <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" class="img_responsive">
    <?php
        }
    ?>
</article>
