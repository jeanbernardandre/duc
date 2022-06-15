<?php $image = get_sub_field('vb_imagebg'); ?>
<section class="videobullets" style="background-image: url('<?php echo empty($image) === false ? $image['sizes']['medium_large'] : ''; ?>')">
    <div class="container">
        <div class="videocontainer">
            <?php
                if (empty(get_sub_field('vb_video')) === false) {
                $pathLink = site_url() . '/video/' . get_sub_field('vb_video');
                $path = get_home_path() . '/video/' . get_sub_field('vb_video');
                if (file_exists($path . '.webm')) {
                    $extensionVideo = 'webm';
                } elseif (file_exists($path . '.mp4')) {
                    $extensionVideo = 'mp4';
                }
                if (empty($extensionVideo) === false) {
            ?>
                    <div class="playercenter" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/dist/img/player-center.svg')"></div>
                    <div class="player" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/dist/img/player.png')"></div>
                    <div class="overlay" <?php echo empty($image) === false ? 'style="background-image: url(\'' . $image['sizes']['medium_large'] . '\')"' : ''; ?>></div>
                    <video
                        class="video-lame"
                        width="100%"
                        height="auto"<?php the_field('video'); ?>
                        controls
                        data-name="video-0"
                        <?php echo empty($image) === false ? 'poster="' . $image['sizes']['medium_large'] . '"' : ''; ?>
                    >
                        <source src="<?php echo $pathLink; ?>.<?php echo $extensionVideo; ?>" type="video/<?php echo $extensionVideo; ?>">
                        <?php _e('Votre navigateur ne prend pas en charge les vidéos HTML5.'); ?>
                    </video>
            <?php
                    }
                }
            ?>
        </div>
        <article class="bulletcontainer">
            <h2><?php the_sub_field('vb_title'); ?></h2>
            <div>
                <?php
                    if(have_rows('vb_bullets')) {
                        while (have_rows('vb_bullets')) {
                            the_row();
                ?>
                            <article class="bullet"><a href="<?php the_sub_field('vb_blink'); ?>"><?php the_sub_field('vb_btitle'); ?></a></article>
                <?php
                      }
                    }
                ?>
            </div>
        </article>
    </div>
</section>