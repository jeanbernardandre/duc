<?php
    if (empty(get_sub_field('cit_cit')) === false) {
?>
        <div class="<?php the_sub_field('fd_bg'); ?>">
            <section class="container citation">
                <div class="leftquote">
                    <cite<?php echo get_sub_field('cit_small') === true ? ' class="cit_small"' : ''; ?>>
                        <?php the_sub_field('cit_cit'); ?>
                    </cite>
                </div>
                <p class="author"><?php the_sub_field('cit_author'); ?></p>
            </section>
        </div>
<?php
    }
?>