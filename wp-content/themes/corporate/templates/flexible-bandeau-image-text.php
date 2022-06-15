<section class="flexible-bandeau-image-text">
    <?php
        if (get_sub_field('type_show') === 'image_text') {
            include('_item-container-text.php');
            include('_item-image-bg.php');
        } else {
            include('_item-image-bg.php');
            include('_item-container-text.php');
        }
    ?>
</section>
