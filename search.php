
<!-- 
    This page is for archive pages
-->
    
<?php get_header() ?>
    <main class="main-without-sidebar">
        <!-- Latest recipe section -->
        <section class="wrapper-main home_with_sidebar">
            <h1 class="search-title">Search Result: <?php echo the_search_query() ?> </h1>   
            <?php get_template_part('template-parts/blog_post_cards'); ?>
        </section>
       
    </main>
<?php get_footer() ?>