<?php
/*
  Template Name: Contact
 */


get_header();
?>

    <main class="container pagesingle formc">
        <h1 class="title"><?php the_title(); ?></h1>
        <div class="spacer"></div>
        <section class="pagecontact formc">
            <?php the_content(); ?>
        </section>
    </main>
<?php
get_footer();