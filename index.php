<!DOCTYPE html>
<html>
<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>HANDYMAN</title>
    
    <!-- CSS files -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
    
    <!-- GMAP API ACCESS -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmz8eH21-SKupsw3nAD7RqlBY1wvNf7vU"></script>
    <!-- custom GMAP logic -->
    <script type="text/javascript" src="js/gmap.js"></script>

</head>

<body>

<div class="navbar">
    <h1>handymen/handywomen. app.</h1>
</div>
<div id="map-canvas"></div>
<div id="post-map">
    <form action="insert.php" method="post" id="usrform">
  		<div id="coords"></div>	
	    <input type="text" name="user" placeholder="name">
	    <br><br>
	    <textarea name="msg" form="usrform" placeholder="enter message here..."></textarea>
	    <br><br>
	    <span class="glyphicon glyphicon-usd"></span>
	    <input type="text" name="amount" placeholder="amount">
	    <br><br>
	    <input type="submit" class="btn btn-lg btn-danger">
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
      
  </body>
</html>