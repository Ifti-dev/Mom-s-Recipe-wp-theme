<?php

function ifti_page_nav(){
    //wp navigation pagination
    global $wp_query;//it returnes all pages but if not arg added it returns all posts

    $current = get_query_var('paged')? get_query_var('paged'):1;
    $max = $wp_query -> max_num_pages;

    if($max <= 1)
        return;
    $args = array(
        "base" => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
        'total' => $max,
        'current' => $current,
        "prev_text" => "yo go back",
        "next_text" => "yo go front",
        "type" => "plain"
    );

    echo "<div class='wp_pagenav'>";
    echo paginate_links( $args );
    echo "</div>";
}

