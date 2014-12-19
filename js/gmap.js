var geocoder;
var map;
var infowindow = new google.maps.InfoWindow();
var marker;

function initialize() {
  geocoder = new google.maps.Geocoder();
  var mapOptions = {
    zoom: 13,
     };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);


if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = new google.maps.LatLng(position.coords.latitude,
                                       position.coords.longitude);
       
      
     marker = new google.maps.Marker({
     position:pos
       });       
                      
var lat = marker.getPosition().lat();
var lng = marker.getPosition().lng();          
      
  var latlng = new google.maps.LatLng(lat, lng);
  
  geocoder.geocode({'latLng': latlng}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      if (results[1]) {
        map.setZoom(14);
         
            var marker = new google.maps.Marker({
            position: latlng,
            draggable: true,
            map: map
            });
          			
      var x = results[0].formatted_address;
      var y = x.split(",");
      var z = y[0];
          
          infowindow.open(map,marker);
          infowindow.setContent(z);
         
          
    document.getElementById("coords").innerHTML= '<input type="hidden" value="'+lat+'" name="lat">' + '<input type="hidden" value="'+lng+'" name="lng">' + '<input type="hidden" value="'+ z +'" name="address">';

google.maps.event.addListener(marker, "dragstart", function() {
        infowindow.close();
      
             });

google.maps.event.addListener(marker, 'dragend', 
    function(){
var lat = marker.getPosition().lat();
var lng = marker.getPosition().lng();          
var newlatlng = new google.maps.LatLng(lat, lng);

geocoder.geocode({'latLng': newlatlng}, function(results, status) {
  if (status == google.maps.GeocoderStatus.OK) {
    if (results[1]) {
      map.setZoom(15);
          
          infowindow.setContent(results[0].formatted_address);
          infowindow.open(map,marker);
          map.setCenter(newlatlng);

          document.getElementById("coords").innerHTML= '<input type="hidden" value="'+lat+'" name="lat">' + '<input type="hidden" value="'+lng+'" name="lng">' + '<input type="hidden" value="'+ z +'" name="address">';
          
              } else {
                alert('No results found');
              }
                    } else {
                      alert('Geocoder failed due to: ' + status);
                    }
        });  
      });                         
              } else {
                alert('No results found');
                     }
                  } else {
                      alert('Geocoder failed due to: ' + status);
                           }
    });
  
        map.setCenter(latlng);
             
    }, function() {
      handleNoGeolocation(true);
    });
  } else {
    // Browser doesn't support Geolocation
    handleNoGeolocation(false);
  }
}

google.maps.event.addDomListener(window, 'load', initialize);