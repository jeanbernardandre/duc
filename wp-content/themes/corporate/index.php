<?php
    get_header();
?>
    <main class="container pagesingle">
        <?php
            while (have_posts()) {
                the_post();
                echo '<h1>' . get_the_title() . '</h1>';
                the_content();
            }
        ?>
    </main>
<?php
    get_footer();
?>
