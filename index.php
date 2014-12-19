<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
      
      <!-- google maps javascript API access activation -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmz8eH21-SKupsw3nAD7RqlBY1wvNf7vU"></script>
   
  
    <title></title>
    
<style>

  html { height: 100% }
  body { height: 100%; margin: 0px; padding: 0px;text-align:center;}
  
  #nav {height:80px;width:100%; background-color:#ff5b5b;}
    #nav h1{padding:13px; margin:0px; color:black;
            font-family: sans-serif; position:relative; float:left; font-size: 48px; font-weight: bold; }
    #nav a{padding:13px; margin:0px; position:relative; float:right; font-size: 48px;}
  #map-canvas {margin:5%; height:40%; width:90%; 
                border: 3px solid black; border-radius: 15px; }
  #post-map{height:40%;width:100%;}
    textarea {margin-left:15%; margin-right:15%; height:100px; width:70%;}
    span {font-size:26px;}
    input{height:40px; width:20%;}

</style>


      <!--                        map javascriPt			   -->
	
<script type="text/javascript">
	
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
 


 </script>
 
     			<!-- 			END OF MAPLOAD SCRIPT				-->
      
  </head>
  <body>

<div id="nav">
    <h1>RVLVR</h1>
    <a href="http://papyrustigris.com/hooker/index.html" class="glyphicon glyphicon-tree-conifer"></a>
</div>
	 
<div id="map-canvas"></div>
    	
<div id="post-map">
    <form action="insert.php" method="post" id="usrform">
    	
    	<br>
    	
  		<div id="coords"></div>	
	    <input type="text" name="user" placeholder="name">
	    <textarea name="msg" form="usrform" placeholder="enter message here..."></textarea>
	    <br><br>
	    <span class="glyphicon glyphicon-usd"></span>
	    <input type="text" name="amount" placeholder="amount">
	    <br>
	    <input type="submit" class="btn btn-lg btn-danger">
    		
    </form>
</div>

      
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
      
  </body>
</html>