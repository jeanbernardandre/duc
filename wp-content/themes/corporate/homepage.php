<?php
    /*
     * Template name: Homepage flexible
     */

    get_header();

    if (have_rows('content_page')) {
        $iterator = 0;
        while (have_rows('content_page')) {
            $row = the_row();
            include('templates/' . $row['acf_fc_layout'] . '.php');
            $iterator++;
        }
    }
?>
    <div class="container-logo">
        <div class="logo container">
            <?php
                if (have_rows('logos_footer')) {
                    while (have_rows('logos_footer')) {
                        $row = the_row();
            ?>
                        <a href="<?php echo $row['field_60cc46d4a5696_field_60cc43ee4868d']; ?>">
                            <?php echo wp_get_attachment_image($row['field_60cc46d4a5696_field_60cc44004868e'], 'medium');; ?>
                        </a>
            <?php
                    }
                }
            ?>
        </div>
    </div>
    <?php
    get_footer();