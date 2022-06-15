<section class="container title-header">
    <h2<?php echo get_sub_field('ta_title_black') === true ? ' style="color: black"' : ''; ?>>
        <?php the_sub_field('ta_title'); ?>
    </h2>
    <?php
        if (empty(get_sub_field('ta_subtitle')) === false) {
    ?>
       <h3<?php echo get_sub_field('ta_subtitle_black') === true ? ' style="color: black"' : ''; ?>>
           <?php the_sub_field('ta_subtitle'); ?>
       </h3>
    <?php
        }
    ?>
    <?php echo empty(get_sub_field('ta_text')) === false ? '<div>' . get_sub_field('ta_text') . '</div>' : ''; ?>
    <?php
        if (get_sub_field('ta_hr') === true) {
    ?>
        <hr>
    <?php
        }
    ?>
</section>