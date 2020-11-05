$(document).ready(function() {

     // Active Carousel
    $("#carouselControls").carousel({
        interval: 5000
    });

     // Active Carousel Indicators
    $(".item1").click(function(){
        $("#carouselControls").carousel(0);
    });
    $(".item2").click(function(){
        $("#carouselControls").carousel(1);
    });
    $(".item3").click(function(){
        $("#carouselControls").carousel(2);
    });
    $(".item4").click(function(){
        $("#carouselControls").carousel(3);
    });

     // Active Carousel Controls
    $(".carousel-control-prev").click(function(){
        $("#carouselControls").carousel("prev");
    });
    $(".carousel-control-next").click(function(){
        $("#carouselControls").carousel("next");
    });
});

