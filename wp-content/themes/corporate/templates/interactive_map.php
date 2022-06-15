<?php
        $args = [
        'post_type' => 'camping',
        'post_status' => 'publish',
        'posts_per_page' => 8,
    ];

    $loop = new WP_Query( $args );
    $arr = [];

    while ( $loop->have_posts() ) : $loop->the_post();
        $arr[] = ["". addslashes(get_the_title()) . ""
            , "". get_field('lattitude') . ""
            , "". get_field('longitude') . ""
            ,"". get_field('camping_web') . ""];
    endwhile;

    wp_reset_postdata();
?>
<div class="flexible-interactive-map">
    <div class="wrapper-map">
        <div
            class="kali-map"
            style="min-height: 200px;"
            data-map-campings='<?php echo json_encode($arr); ?>'
            data-info-campings=""
        ></div>
    </div>
    <div class="wrapper-details active">
        <div id="default" class="index modal-text active">
            <?php the_sub_field('block_content'); ?>
        </div>
    </div>
</div>
