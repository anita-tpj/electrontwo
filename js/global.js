//Custom global scripts

(function($){
  $(document).ready(function($){
    'use-strict';
    init_googleMapMultipleLocations();
  });//$(document).ready func

/*Google maps for multiple location API for Contact page template*/

    function init_googleMapMultipleLocations(){
      var $ = jQuery;
      var numberOfLocations = 0;
      var locationsArr = [];
      var mapZoom = 3;
      //Take value for arguments of initMap function for all location on load
      $('#locations ul').each(function(i, obj) {
          numberOfLocations++;
          var $latitude = parseFloat($(this).children("li.ci-geolocation-lat").text());
          var $longitude = parseFloat($(this).children("li.ci-geolocation-lng").text());
          var $infoWindowContent = $(this).children("li.ci-company").text() + " " + $(this).children("li.ci-location").text();
          var $markerTitle = $(this).children("li.ci-company").text();
          locationsArr.push([$latitude, $longitude, $infoWindowContent, $markerTitle] );
          if($latitude && $longitude){
            if ($latitude >= -85 && $latitude <= 85 && $longitude >= -180 && $longitude <= 180) {
                initMap(numberOfLocations, locationsArr, mapZoom);
            }
          }
      });

      //Take value for arguments of initMap function for every single location on click
      $('#locations ul').each(function(i, obj) {
        $(this).click(function(){
            numberOfLocations = 1;
            locationsArr = [];
            mapZoom = 15;
            var $latitude = parseFloat($(this).children("li.ci-geolocation-lat").text());
            var $longitude = parseFloat($(this).children("li.ci-geolocation-lng").text());
            var $infoWindowContent = $(this).children("li.ci-company").text() + " " + $(this).children("li.ci-location").text();
            var $markerTitle = $(this).children("li.ci-company").text();
            locationsArr.push([$latitude, $longitude, $infoWindowContent, $markerTitle] );
            if($latitude && $longitude){
              if ($latitude >= -85 && $latitude <= 85 && $longitude >= -180 && $longitude <= 180) {
                  initMap(numberOfLocations, locationsArr, mapZoom);
              }
            }
        });
      });
    };//init_googleMapMultipleLocations

/*
<!-- Convert address tags to embed google map - Copyright Michael Jasper 2011 -->

    function init_embedGoogleMap(){
    $("address").on('click',function(e){
      e.preventDefault();
      var embed ="<iframe width='425' height='350' frameborder='0' scrolling='no'  marginheight='0' marginwidth='0'   src='https://maps.google.com/maps?width=100%&amp;height=600&amp;q="+ encodeURIComponent( $(this).text() ) +"&amp;output=embed'></iframe>";
      $('.gmap').html(embed);
    });
    }
*/

})(jQuery)// jQuery IIFE func

//Google Maps for multiple location API
var map;
function initMap(totalLoc, location, zoom) {

    document.getElementById('map').setAttribute("style","height: 400px; width: 100%; border: 1px solid #DDDDDD;");

    map = new google.maps.Map(document.getElementById('map'), {

      center:  {lat: location[totalLoc-1][0], lng: location[totalLoc-1][1]}, //lat/long of center of map

      zoom: zoom, // 8 or 9 is typical zoom
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

    var infowindow = new google.maps.InfoWindow({});
    var marker, i;

    for(i=0; i<totalLoc; i++){
      marker = new google.maps.Marker({
      position: new google.maps.LatLng(location[i][0], location[i][1]), // lat/long of marker
      map: map,
      animation: google.maps.Animation.DROP, // drops marker in from top
      title: location[i][3], // title on hover over marker
      /*icon:  map
      icon: {
        url: 'http://localhost/wp/electrontwo/wp-content/themes/electrontwo/images/ion-logo.png',
        scaledSize: new google.maps.Size(75, 120)
      }*/
      });

      google.maps.event.addListener(marker, 'click', (function (marker, i) {
  			return function () {
          map.setZoom(15);
          map.setCenter(marker.getPosition());
          if(location[i][2]){
            infowindow.setContent(location[i][2]);
    				infowindow.open(map, marker);
          }
  			}
		  })(marker, i));
    }//end for loop

}//initMap
