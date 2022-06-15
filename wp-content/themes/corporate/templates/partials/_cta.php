<?php
    if (empty(get_sub_field('cta_txt')) === false) {
?>
        <div>
            <a
                class="cta <?php the_sub_field('cta_bg'); ?>"
                href="<?php the_sub_field('cta_link'); ?>"
                target="<?php echo get_sub_field('cta_target') === true ? '_blank' : '_self'; ?>"
            >
                <?php the_sub_field('cta_txt'); ?>
            </a>
        </div>
<?php
    }
?>