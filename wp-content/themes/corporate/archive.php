<?php
    get_header();
?>
    <main class="container pagesinglearchive">
        <?php
            while (have_posts()) {
                the_post();
                echo '<h2><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h2>';
                the_content();
            }
        ?>
    </main>
<?php
    get_footer();
?>
