<!-- 

    This template is for all blog posts (not for pages) 

-->

<?php
        if(have_posts()):
            while(have_posts()): the_post();
?>
<div class="page_header_container">
            <?php the_post_thumbnail("post-card-thumbnail") ?>
            <h1 class="post-page-title"><a href="<?php the_permalink() ?>"><?php the_title();?></a></h1>
</div>
<div class="main-with-sidebar">
<main class="single-recipe-content-container">
   
    <section class="single-recipe-wrapper">
        <nav class="breadcrumbs">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="recipe.html">Recipe</a></li>
                <!-- <li><a href="recipe-page.php?slug=<?php //echo $recipe["slug"]; ?>"><?php //echo $recipe["title"]; ?></a></li> -->
            </ul>
        </nav>
        <div class="recipe-page-top">
            
            <div class="recipe-meta-data">
                <div><?php //echo get_avatar(get_the_author_meta("ID"),100);?><i class="fa-solid fa-circle-user"></i><?php the_author_posts_link(); ?></div>
                <!-- <div><i class="fa-solid fa-comment"></i>${get_currrent_recipe_data.comments.length}</div>
                <div><i class="fa-solid fa-heart"></i>${get_currrent_recipe_data.wishlist_count.length}</div> -->
            </div>
        </div>
        
        <div class="recipe-page-body"> 
            <?php the_content() ?></p>
        </div>
    </section>

</main>

<aside class="recipe-page-sidebar-container">
    <?php
        if(is_active_sidebar('sidebar-1'))
            get_sidebar() ?>
</aside>
<?php endwhile; 
endif;?>
</div>
