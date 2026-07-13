<?php

function ifti_page_nav($custom_query = null){
    //wp navigation pagination
    global $wp_query;//it returnes all archive and blog posts but if not arg added it returns all posts
    //wont work for custom query for custom post types, for custom query follow below
    $query_to_use = ($custom_query!=null)?$custom_query:$wp_query;

    $current = get_query_var('paged')? get_query_var('paged'):1;
    $max = $query_to_use -> max_num_pages;

    if($max <= 1)
        return;
    $args = array(
        //pagnum link retrives url for a specific page number(http://localhost/wordpress/page/999999999/)
        //base is the main url structure, %#% is the placeholder which is later replaced with page number
        //we dont write the url directly cause we wanna make the url dynamic(ie. ../?page=2 => ../page/2)
        "base" => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
        'total' => $max,
        'current' => $current,
        "prev_text" => "yo go back",
        "next_text" => "yo go front",
        "type" => "plain"//list to get ul>li>a , plain to get a
    );

    echo "<div class='wp_pagenav'>";
    echo "<p class='pagnav-num'>" . $current . " of " . $max . " pages" . "</p>";
    echo "<div class='wp_pagenav_links'>" . paginate_links( $args ) . "</div>";
    echo "</div>";
    
}

