<!-- 
    This page is for archive pages
-->
    
<?php get_header() ?>
    <main class="main-without-sidebar">
        <!-- Latest recipe section -->
        <section class="wrapper-main home_with_sidebar">
            <?php the_archive_title('<h1 class="page-title">', '</h1>') ?>    
            <?php get_template_part('template-parts/blog_post_cards'); ?>
        </section>
       
    </main>
<?php get_footer() ?>