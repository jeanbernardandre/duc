<?php
    $size = wp_is_mobile() ? 'medium_large' : 'large';
?>
<div class="container-fluid header_cta" style="background-image: url('<?php echo get_sub_field('htc_img')['sizes'][$size]; ?>')">
    <section>
        <?php echo empty(get_sub_field('htc_title')) === false ? '<h2>' . get_sub_field('htc_title') . '</h2>' : ''; ?>
        <?php echo empty(get_sub_field('htc_text')) === false ? '<div>' . get_sub_field('htc_text') . '</div>' : ''; ?>
        <div class="ctalign"><?php include('partials/_cta.php'); ?></div>
    </section>
</div>