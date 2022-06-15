<?php $image = get_sub_field('tv_img'); ?>
<section class="blocactu caramelbg">
    <?php
        if (empty(get_sub_field('tv_link')) === false) {
            $path = home_url() . '/video/' . get_sub_field('tv_link');
            ?>
            <div
                class="illustration <?php echo $iterator & 1 ? 'mobileon' : ''; ?>"
                style="background-image: url('<?php echo empty($image) === false ?  $image['sizes']['medium_large'] : ''; ?>')"
            >
                <video width="100%" height="auto" controls data-name="video-0">
                    <source src="<?php echo $path; ?>.webm" type="video/webm">
                    <source src="<?php echo $path; ?>.mp4" type="video/mp4">
                    <?php _e('Votre navigateur ne prend pas en charge les vidéos HTML5.'); ?>
                </video>
            </div>
        <?php
            } else {
        ?>
        <div class="illustration <?php echo $iterator & 1 ? 'mobileon' : ''; ?>">
        </div>
    <?php } ?>
    <article class="realisation <?php echo $iterator & 1 ? 'left' : ''; ?>">
        <?php
            if (strlen(get_sub_field('tv_text') > 10)) {
                ?>
                <h2><?php the_sub_field('tv_title'); ?></h2>
                <p class="description">
                    <?php the_sub_field('tv_text'); ?>
                </p>
                <?php
            } else {
        ?>
                <h2 class="mainbloctitle"><?php the_sub_field('tv_title'); ?></h2>
        <?php
            }
        ?>
    </article>
    <?php
        if ($iterator & 1) {
            if (empty(get_sub_field('tv_link')) === false) {
    ?>
        <div
            class="illustration mobileoff"
            style="background-image: url('<?php echo empty($image) === false ?  $image['sizes']['medium_large'] : ''; ?>')"
        >
            <video width="100%" height="auto" controls data-name="video-0">
                <source src="<?php echo $path; ?>.webm" type="video/webm">
                <source src="<?php echo $path; ?>.mp4" type="video/mp4">
                <?php _e('Votre navigateur ne prend pas en charge les vidéos HTML5.'); ?>
            </video>
        </div>
    <?php
        } else {
    ?>
        <div class="illustration mobileoff" style="background-image: url('<?php echo $image['sizes']['medium_large']; ?>')">
        </div>
    <?php
        }
    }
    ?>
</section>
