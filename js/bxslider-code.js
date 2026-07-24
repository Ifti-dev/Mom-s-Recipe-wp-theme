jQuery(document).ready(function(){
    jQuery(".slider").bxSlider({
        //mode: 'fade',
        auto: true, //autoslide
        pause: 1000, //how much time a slide diaplays
        speed:1000, //transition timing speed
        //autoControls: true, //adds a play pause option on bottom
        stopAutoOnClick: true, //stop auto slide if btn clicked
        autoHover:true, //pauses slide on hover
        minSlides:2,
        maxSlides:2,
        slideWidth: 390,
        slideMargin: 10,
    
    });
});