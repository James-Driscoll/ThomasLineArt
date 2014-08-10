<?php
// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'RWMB_Text_Field' ) )
{
	class RWMB_Gmap_Field
	{
		/**
		 * Get field HTML
		 *
		 * @param string $html
		 * @param mixed  $meta
		 * @param array  $field
		 *
		 * @return string
		 */
		static function html( $html, $meta, $field )
		{


			 echo sprintf(
				'
				<div style="text-align: right;">
				<input type="hidden" class="rwmb-text" name="%s" id="%s" value="%s" size="%s" />
				 Find Location: <input type="text" id="address"/><input type="button" value="Go" onclick="geocode()">
				 </div>
				 ',
				$field['field_name'],
				$field['id'],
				$meta,
				$field['size']
			);
			 echo make_gmaps_ui($meta,$field);
			 return "<span id='latLongName'>($meta)</span>";
		}

		/**
		 * Normalize parameters for field
		 *
		 * @param array $field
		 *
		 * @return array
		 */
		static function normalize_field( $field )
		{
			$field = wp_parse_args( $field, array(
				'size' => 30,
			) );
			return $field;
		}
	}
}




function make_gmaps_ui($meta, $field) { ?>
<style type="text/css">
  div#map {
    position: relative;
  }

  div#crosshair {
    position: absolute;
    top: 192px;
    height: 19px;
    width: 19px;
    left: 50%;
    margin-left: -8px;
    display: block;
    background: url("<?php echo get_stylesheet_directory_uri()."/images/crosshair.gif"; ?>");
    background-position: center center;
    background-repeat: no-repeat;
}
</style>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
  var map;
  var geocoder;
  var centerChangedLast;
  var reverseGeocodedLast;
  var currentReverseGeocodeResponse;

  function initialize() {

  	<?php if (!strlen($meta)) { ?>
	var latlng = new google.maps.LatLng(52.243035623507566, -0.9067791748046772);
	<?php } else { ?>
	var latlng = new google.maps.LatLng(<?php echo $meta; ?>);
	<?php } ?>

    var myOptions = {
      zoom: 15,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      scrollwheel: false
    };
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    geocoder = new google.maps.Geocoder();

    setupEvents();
    centerChanged();
  }

  function setupEvents() {
    reverseGeocodedLast = new Date();
    centerChangedLast = new Date();

    setInterval(function() {
      if((new Date()).getSeconds() - centerChangedLast.getSeconds() > 1) {
        if(reverseGeocodedLast.getTime() < centerChangedLast.getTime())
          reverseGeocode();
      }
    }, 1000);

	  google.maps.event.addListener(map, 'center_changed', centerChanged);

  }

  function centerChanged() {
    centerChangedLast = new Date();
    maptext = map.getCenter().lat() +', '+ map.getCenter().lng();
    document.getElementById('house_map').value = maptext;
    document.getElementById('latLongName').innerHTML = "(" + maptext + ")";
    currentReverseGeocodeResponse = null;
  }

  function reverseGeocode() {
    reverseGeocodedLast = new Date();
    geocoder.geocode({latLng:map.getCenter()},reverseGeocodeResult);
  }

  function reverseGeocodeResult(results, status) {
    currentReverseGeocodeResponse = results;
    if(status != 'OK') {
      document.getElementById('house_map').innerHTML = 'Error';
    }
  }


  function geocode() {
    var address = document.getElementById("address").value;
    geocoder.geocode({
      'address': address,
      'partialmatch': true}, geocodeResult);
    document.getElementById("address").value = " ";
  }

  function geocodeResult(results, status) {
    if (status == 'OK' && results.length > 0) {
      map.fitBounds(results[0].geometry.viewport);
    } else {
      alert("Geocode was not successful for the following reason: " + status);
    }
  }



  jQuery(document).ready(function($){


  	initialize();

  });


</script>

  <div id="map">
    <div id="map_canvas" style="width:100%; height:400px"></div>
    <div id="crosshair"></div>
  </div>



<?php }