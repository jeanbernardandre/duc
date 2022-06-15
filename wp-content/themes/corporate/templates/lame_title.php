<?php
    if (empty(get_sub_field('title_title')) === false) {
?>
<section class="accroche <?php the_sub_field('title_bg');?>">
    <article class="titre">
        <h1><?php the_sub_field('title_title');?></h1>
    </article>
</section>
<?php
    }
?>