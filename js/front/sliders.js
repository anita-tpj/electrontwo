(function($){
  $(document).ready(function($){
    init_flexSlider();
  });//$(document).ready func


/* Flex Sliders for home page template*/
  function init_flexSlider(){
    var $topbigslider = $('#slider.flexslider');
    $(window).load(function() {

      $('#slider.flexslider').flexslider({
          animation: "fade",
          direction: "horizontal",
          slideshowSpeed: 7000,
          animationSpeed: 600,
          slideshow: true,
          controlNav: false,
      });//$('#slider.flexslider')

      $('#references.flexslider').flexslider({
        animation: "slide",
        itemWidth: 210,
        itemMargin: 5,
        minItems: 1,
        maxItems: 5,
        slideshow: true,
        controlNav: false,
        directionNav: true,

        minItems: getGridSize(), // use function to pull in initial value
        maxItems: getGridSize() // use function to pull in initial value
      });//$('#references.flexslider')

    });//$(window).load func
  }//init_flexSlider func
    // store the slider in a local variable
    var $window = $(window),
        flexslider = { vars:{} };

    // tiny helper function to add breakpoints
    function getGridSize() {
      return (window.innerWidth < 600) ? 2 :
             (window.innerWidth < 900) ? 4 : 5;
    }

    // check grid size on resize event
    $window.resize(function() {
      var gridSize = getGridSize();

      flexslider.vars.minItems = gridSize;
      flexslider.vars.maxItems = gridSize;
    });

})(jQuery)// jQuery IIFE func
