<?php
    if (wp_is_mobile()) {
        $image = get_sub_field('lifw_img')['sizes']['large'] === false
            ? get_sub_field('lifw_img')['sizes']['large']
            : get_sub_field('lifw_img_mob')['sizes']['large'] ;
    } else {
        $image = get_sub_field('lifw_img')['sizes']['corpo_main_image'];
    }
    $imageAlt = get_sub_field('lifw_img')['alt'];
?>
<section class="imgfw">
    <?php if (get_sub_field('lifw_img_link')) { ?>
        <a href="<?php the_sub_field('lifw_img_link'); ?>" <?php echo get_sub_field('lifw_img_link') ? 'target="blank"' : ''; ?>>
            <img src="<?php echo $image; ?>" alt="<?php echo $imageAlt; ?>">
        </a>
    <?php } else { ?>
        <img src="<?php echo $image; ?>" alt="<?php echo $imageAlt; ?>">
    <?php } ?>
</section>
