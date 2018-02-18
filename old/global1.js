//Custom global scripts
/*/Google maps for Contact themplate*/
//Take value for arguments of initMap function for every location
jQuery(function($){
  $('#locations ul').each(function(i, obj) {
    $(this).click(function(){
    var $lat = parseFloat($(this).children("li.ci-geolocation-lat").text());
    var $lng = parseFloat($(this).children("li.ci-geolocation-lng").text());
    var $contentStr = $(this).children("li.ci-company").text() + " " + $(this).children("li.ci-location").text();
    var $markerTitle = $(this).children("li.ci-company").text();
    initMap($lat, $lng, $contentStr, $markerTitle);
    });
  });
});

//Show Google Map
  var map;
function initMap($latitude, $longitude, $contentString, $title) {
    map = new google.maps.Map(document.getElementById('map'), {
      center:  {lat: $latitude, lng: $longitude}, //lat/long of center of map

      zoom: 15, // 8 or 9 is typical zoom
      scrollwheel:  false, // prevent mouse scroll from zooming map.
      mapTypeControl: true, //default
      mapTypeControlOptions: {
          style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
          position: google.maps.ControlPosition.BOTTOM_CENTER
      },
      zoomControl: true, //default
      zoomControlOptions: {
          position: google.maps.ControlPosition.LEFT_CENTER
      },
      streetViewControl: true, //default
      streetViewControlOptions: {
          position: google.maps.ControlPosition.LEFT_TOP
      },
      fullscreenControl: true
    });
    var marker = new google.maps.Marker({
    position: {lat: $latitude, lng: $longitude}, // lat/long of marker
    map: map,
    animation: google.maps.Animation.DROP, // drops marker in from top
    title: $title, // title on hover over marker
/*  icon:  map
    icon: {
      url: 'http://localhost/wp/electrontwo/wp-content/themes/electrontwo/images/ion-logo.png',
      scaledSize: new google.maps.Size(75, 120)
    }
*/
});

    var infowindow = new google.maps.InfoWindow({
          content: $contentString
        });
    if($contentString){
        marker.addListener('click', function() {
          infowindow.open(map, marker);
        });
      }
  }


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
/*
//Convert address tags to embed google map - Copyright Michael Jasper 2011
$("address").on('click',function(e){
  e.preventDefault();
  var embed ="<iframe width='425' height='350' frameborder='0' scrolling='no'  marginheight='0' marginwidth='0'   src='https://maps.google.com/maps?width=100%&amp;height=600&amp;q="+ encodeURIComponent( $(this).text() ) +"&amp;output=embed'></iframe>";
  $('.gmap').html(embed);
});
*/


}(jQuery));
