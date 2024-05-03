<?php
require_once 'transform.php';
require_once '../config/config.php';
require_once '../js/mapdata.js';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Europe Map Example</title>
    <script src="../js/mapdata.js"></script>
    <script src="../js/europemap.js"></script>
    <script>
        // Function to load JavaScript file content using AJAX
        function loadMapData() {
            $file = '../js/mapdata.js'; // Path to your JavaScript file
            $data = file_get_contents($file); // Get the content of the JavaScript file
            return $data;
        }

        // Get the map data from the JavaScript file
        var js_map_data = loadMapData();

        // Now you can process js_map_data as needed, such as decoding it from JSON if required
        // For example, if the data in mapdata.js is JSON-formatted, you can decode it like this:
        var map_data_object = JSON.parse(js_map_data);

        // Initialize the map
        window.onload = function() {
            new SimpleMaps({
                div: "map",
                data: map_data_object // Pass the decoded map data object
            });
        };
    </script>
</head>
<body>
    <h1>HTML5/Javascript Europe Map</h1>
    <div id="map"></div>
    
    <p>This map was created and can be edited at <a href="http://simplemaps.com/custom/europe/KXtpQXrJ">http://simplemaps.com/custom/europe/KXtpQXrJ</a></p>
    
    <p>To remove the "Simplemaps.com Trial" text, <a href="http://simplemaps.com/pricing">purchase a map license</a>.</p>
    
    <p>To learn how to install this map on your web page, see the <a href="http://simplemaps.com/docs">Documentation</a>.</p>
</body>
</html>
