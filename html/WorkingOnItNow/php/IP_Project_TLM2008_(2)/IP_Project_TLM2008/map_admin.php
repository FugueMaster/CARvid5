<!DOCTYPE html>

<?php 
	session_start();
		
	if(!isset($_SESSION))
	{
		header('location:login.php');
		exit;
  }
?>

<html lang="en">

     <?php include 'header2.inc'?>
  <head>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;

      }

      #info-box {
        background-color: white;
        border: 1px solid black;
        bottom: 30px;
        width: 400px;
        height: 80px;
        padding: 5px 10px 70px 10px;
        position: absolute;
        left: 30px;
        font-size: 10px;
      }

    </style>
  </head>
  <body>
    <div id="map"></div>

    <div id="info-box"></div>	
    <script>
      var map;
      var geojson;
      
      function initMap() {  // initialise map

        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 1.3521, lng: 103.8198},
          zoom: 12
        });

        map.data.setStyle(function(feature) {
          return {icon:feature.getProperty('icon')};
        });

        
        //Load GeoJson file
        geojson = map.data.loadGeoJson(
            'assets/geojson/enter_issue.geojson');
        
    
        // Show info box on mouse click event
        map.data.addListener('click', function(event) {
          var html = 'Issue no.: '+event.feature.getProperty('iid')+'<br>'
                  + 'Location: '+event.feature.getProperty('location')+'<br>'
                  + 'Type: '+event.feature.getProperty('type')+'<br>'
                  + 'Time reported: '+event.feature.getProperty('timestamp')+'<br>'
                  + 'Comments: '+event.feature.getProperty('comments');
          document.getElementById('info-box').innerHTML = html;
        });
      
      }
    </script>
    

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBf8sdRfN_rf0iZCeAZ5qCTSBkmHlCbmVE&callback=initMap"
    async defer></script>
     <?php include 'footer.inc'?>
  </body>
</html>



