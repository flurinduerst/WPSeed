/* General Variables & Presets
/===================================================== */

	/* Viewport Width
	/------------------------*/
	var $vpWidth = jQuery(window).width();

	/* Touch Device
	/------------------------*/
	var $root = $('html');
	var isTouch = 'ontouchstart' in document.documentElement;
	if (isTouch) {
		$root.attr('data-touch', 'true');
	} else {
		$root.attr('data-touch', 'false');
	}
	/* Initialize Fastclick
	/------------------------*/
	//» https://github.com/ftlabs/fastclick
	FastClick.attach(document.body);

	
/* Functions
/===================================================== */

/**
 * Mobile Navigation handler
 *
 * @author			Flurin Dürst
 * @version			1.2
 * @since			WPegg 0.12
 *
 */

$(function(){
	$(document).on('click', '#mobilenav_trigger', function (event) {
		// show overlay
		$('#nav_main').toggleClass('mobilenav_hidden');
		// switch icon
		$('#mobilenav_trigger').toggleClass('close');
		$('html').toggleClass('noscroll');
	});
});


/**
 * Configuration and styling for Google Maps
 *
 * @author			Flurin Dürst
 * @version			1.1
 * @since			WPegg 0.13
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
		var image = 'http://wpegg.dev/app/themes/WPegg/assets/images/icons/googlemap-arrow.png';

		var marker = new google.maps.Marker({
			position: position,
			map: map,
			icon: image,
			title: "WordPress Egg"
		});

		// center map on resize
		center = map.getCenter();
		google.maps.event.addDomListener(window, 'resize', function() {
			map.setCenter(center);
		});

	}
}
if($("#map" + name).length !== 0) {
	google.maps.event.addDomListener(window, 'load', initialize);
}
