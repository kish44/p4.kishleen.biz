/*
 This file contains validations that are too specific to be part of the core
 Please reference the file AFTER the translation file or the rules will be overwritten
 Use at your own risk. We can't provide support for most of the validations
*/
var geocoder, map, marker;
var defaultLatLng = new google.maps.LatLng(30,0);
  
(function($){
	if($.validationEngineLanguage == undefined || $.validationEngineLanguage.allRules == undefined )
		alert("Please include other-validations.js AFTER the translation file");
	else {
		$.validationEngineLanguage.allRules["postcodeUK"] = {
		        // UK zip codes
		        "regex": /^([A-PR-UWYZ0-9][A-HK-Y0-9][AEHMNPRTVXY0-9]?[ABEHMNPRVWXY0-9]? {1,2}[0-9][ABD-HJLN-UW-Z]{2}|GIR 0AA)$/,
				"alertText": "* Invalid postcode"
		};
		$.validationEngineLanguage.allRules["onlyLetNumSpec"] = {
				// Good for database fields
				"regex": /^[0-9a-zA-Z_-]+$/,
				"alertText": "* Only Letters, Numbers, hyphen(-) and underscore(_) allowed"
		};
	//	# more validations may be added after this point
	}
	
	
})(jQuery);

/*validates address*/

/*initializes map*/
function initialize() {
    geocoder = new google.maps.Geocoder();
    var mapOptions = {
      zoom: 0,
      center: defaultLatLng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(
      document.getElementById("map_canvas"),
      mapOptions
    );
    marker = new google.maps.Marker();
  }
  
  /*validates address*/
  function validateMap() {
    clearResults();
    var address = document.getElementById('address').value;
    geocoder.geocode({'address': address }, function(results, status) {
      switch(status) {
        case google.maps.GeocoderStatus.OK:
          document.getElementById('valid').value = 'YES';
          document.getElementById('type').value = results[0].types[0];
		  if (document.getElementById('type').value != 'street_address')
		  	{
		  		//alert("Please provide valid address");
		  		break;
			}
		  else
		  {
          	document.getElementById('address').value = results[0].formatted_address;
          	mapAddress(results[0]);
			// Get the location
			var location = results[0].geometry.location;
			// find out latitude and longitude
			var lat = location.lat();
			var lng = location.lng();
			document.getElementById('lat').value = lat;
			document.getElementById('lng').value = lng;
		  }
          break;
		case google.maps.GeocoderStatus.ZERO_RESULTS:
          document.getElementById('valid').value = 'NO';
		  	//alert("Address is not valid");
          break;
        default:
          alert("An error occured while validating this address");
      }
	  return true;
    });
  }
  
  /*checks if latitude longitude is filled*/
  function latlngFilled(){
   if($("#lat").val() =="" || $("#lat").val() == ""){
   		return "please provide valid address";
   }else{
   		return;
   }
  }
  
  

  /*clears previous search results*/
  
  function clearResults() {
    document.getElementById('valid').value = '';
    document.getElementById('type').value = '';
    document.getElementById('result').value = '';
    map.setCenter(defaultLatLng);
    map.setZoom(0);
    marker.setMap(null);
  }
  /*puts address on the map*/
  
  function mapAddress(result) {
    marker.setPosition(result.geometry.location);
    marker.setMap(map);
    map.fitBounds(result.geometry.viewport);
  }