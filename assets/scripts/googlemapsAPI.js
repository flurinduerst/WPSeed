/**
 * Google Maps API related scripts/configs
 *
 * @author      Flurin Dürst
 * @version     1.0
 * @since       WPSeed 0.7.6
 *
 */


 function initialize() {
  if($("#map" + name).length !== 0) {
    // http://mondeca.com/index.php/en/any-place-en
    // http://gmaps-samples-v3.googlecode.com/svn/trunk/styledmaps/wizard/index.html
    // https://snazzymaps.com/
    var position = new google.maps.LatLng(47.372625, 8.543255);
    var options = {
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      center: position,
      scrollwheel: false,
      zoom: 16,
      styles: [
        { "elementType": "geometry",
          "stylers": [
            { "visibility": "simplified" },
            { "hue": "#c59258" },
            { "saturation": -64 },
            { "lightness": 13 }
          ]
        },
        {
          "featureType": "poi",
          "stylers": [
            { "visibility": "off" }
          ]
        },
        {
          "featureType": "transit.station",
          "elementType": "all",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "transit.station.rail",
          "elementType": "all",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "road",
          "elementType": "labels.icon",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        }
      ]
    };
    var map = new google.maps.Map(document.getElementById("map"), options);
    var image = 'http://wpseed.dev/app/themes/WPSeed/assets/images/icons/googlemap-arrow.png';

    var marker = new google.maps.Marker({
      position: position,
      map: map,
      icon: image,
      title: "WPSeed",
      url: 'http://link_executed_on_marker.click'
    });

    // center map on resize
    center = map.getCenter();
    google.maps.event.addDomListener(window, 'resize', function() {
      map.setCenter(center);
    });

    // href on marker click
    google.maps.event.addListener(marker, 'click', function() {
      window.open(marker.url, '_blank');
    });

  }
}
if($("#map" + name).length !== 0) {
  google.maps.event.addDomListener(window, 'load', initialize);
}
