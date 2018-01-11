//Custom global scripts

jQuery(document).ready(function($){
  'use-strict';
$(window).load(function() {

    $('#slider.flexslider').flexslider({
        animation: "fade",
        direction: "horizontal",
        slideshowSpeed: 7000,
        animationSpeed: 600,
        slideshow: true,
        controlNav: false,
    });

});

    (function() {

  // store the slider in a local variable
  var $window = $(window),
      flexslider = { vars:{} };

  // tiny helper function to add breakpoints
  function getGridSize() {
    return (window.innerWidth < 600) ? 2 :
           (window.innerWidth < 900) ? 4 : 5;
  }


  $window.load(function() {
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
    });
  });

  // check grid size on resize event
  $window.resize(function() {
    var gridSize = getGridSize();

    flexslider.vars.minItems = gridSize;
    flexslider.vars.maxItems = gridSize;
  });
}());



}(jQuery));
