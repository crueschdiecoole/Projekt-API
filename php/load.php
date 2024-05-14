<?php
//EXTRACT

require_once 'transform.php';
require_once '../config/config.php';
require_once '../php/europemap.php';

$urls = [
    // UTC +3.00 H (Eastern European Time Zone, Year Round)
        "Minsk" => "https://api.sunrise-sunset.org/json?lat=53.900600&lng=27.558971&tzid=Europe/Minsk", 
        "Ankara" => "https://api.sunrise-sunset.org/json?lat=39.933365&lng=32.859741&tzid=Europe/Ankara",

    // UTC +2.00 H (Eastern European Time Zone, EET)    
        "Helsinki" => "https://api.sunrise-sunset.org/json?lat=60.1709&lng=24.9375&tzid=Europe/Helsinki",
        "Tallinn" => "https://api.sunrise-sunset.org/json?lat=59.4369&lng=24.7530&tzid=Europe/Tallinn",
        "Riga" => "https://api.sunrise-sunset.org/json?lat=56.9496&lng=24.1052&tzid=Europe/Riga",
        "Vilnius" => "https://api.sunrise-sunset.org/json?lat=54.6897&lng=25.2799&tzid=Europe/Vilnius",
        "Kiev" => "https://api.sunrise-sunset.org/json?lat=50.4501&lng=30.5234&tzid=Europe/Kyiv",
        "Chisinau" => "https://api.sunrise-sunset.org/json?lat=47.0167&lng=28.8333&tzid=Europe/Chisinau",
        "Bucharest" => "https://api.sunrise-sunset.org/json?lat=44.4268&lng=26.1025&tzid=Europe/Bucharest",
        "Sofia" => "https://api.sunrise-sunset.org/json?lat=42.6970&lng=23.3240&tzid=Europe/Sofia",
        "Athens" => "https://api.sunrise-sunset.org/json?lat=37.9760&lng=23.7360&tzid=Europe/Athens",

    // UTC + 1.00 H (Central European Time Zone, CET)
        "Berne" => "https://api.sunrise-sunset.org/json?lat=46.948090&lng=7.447440&tzid=Europe/Zurich",
        "Berlin" => "https://api.sunrise-sunset.org/json?lat=52.520008&lng=13.404954&tzid=Europe/Berlin",
        "Amsterdam" => "https://api.sunrise-sunset.org/json?lat=52.370216&lng=4.895168&tzid=Europe/Amsterdam",
        "Oslo" => "https://api.sunrise-sunset.org/json?lat=59.912731&lng=10.746090&tzid=Europe/Oslo",
        "Brussels" => "https://api.sunrise-sunset.org/json?lat=50.8466&lng=4.3517&tzid=Europe/Brussels",
        "Copenhagen" => "https://api.sunrise-sunset.org/json?lat=55.6760&lng=12.5683&tzid=Europe/Copenhagen",
        "Paris" => "https://api.sunrise-sunset.org/json?lat=48.8534&lng=2.3488&tzid=Europe/Paris" ,
        "Rome" => "https://api.sunrise-sunset.org/json?lat=41.9028&lng=12.4964&tzid=Europe/Rome",
        "Zagreb" => "https://api.sunrise-sunset.org/json?lat=45.8150&lng=15.9819&tzid=Europe/Zagreb",
        "Luxembourg" => "https://api.sunrise-sunset.org/json?lat=49.8153&lng=6.1296&tzid=Europe/Luxembourg",
        "Vienna" => "https://api.sunrise-sunset.org/json?lat=48.2082&lng=16.37285&tzid=Europe/Vienna" ,
        "Stockholm" => "https://api.sunrise-sunset.org/json?lat=59.3293&lng=18.0686&tzid=Europe/Stockholm ",
        "Madrid" => "https://api.sunrise-sunset.org/json?lat=40.4167&lng=-3.7033&tzid=Europe/Madrid",
        "Prague" => "https://api.sunrise-sunset.org/json?lat=50.0878&lng=14.4205&tzid=Europe/Prague",
        "Budapest" => "https://api.sunrise-sunset.org/json?lat=47.4983&lng=19.0408&tzid=Europe/Budapest",
        "Tirane" => "https://api.sunrise-sunset.org/json?lat=41.3275&lng=19.818irana&tzid=Europe/Tirane",
        "Sarajevo" => "https://api.sunrise-sunset.org/json?lat=43.8563&lng=18.4131&tzid=Europe/Sarajevo",
        "Podgorica" => "https://api.sunrise-sunset.org/json?lat=42.4417&lng=19.2667&tzid=Europe/Podgorica",
        "Skopje" => "https://api.sunrise-sunset.org/json?lat=42.0046&lng=21.43&tzid=Europe/Skopje",
        "Warsaw" => "https://api.sunrise-sunset.org/json?lat=52.2297&lng=21.0122&tzid=Europe/Warsaw",
        "Belgrade" => "https://api.sunrise-sunset.org/json?lat=44.8189&lng=20.4689&tzid=Europe/Belgrade",
        "Bratislava" => "https://api.sunrise-sunset.org/json?lat=48.145&lng=17.107&tzid=Europe/Bratislava",
        "Ljubljana" => "https://api.sunrise-sunset.org/json?lat=46.0569&lng=14.5058&tzid=Europe/Ljubljana",
        "Pristina" => "https://api.sunrise-sunset.org/json?lat=42.663876&lng=21.164085&tzid=Europe/Pristina",


    
    
    // UTC +0.00 H (Western European Time Zone, WET)
        "Dublin" => "https://api.sunrise-sunset.org/json?lat=53.3498&lng=-6.2603",
        "Reykjavik" => "https://api.sunrise-sunset.org/json?lat=64.1353&lng=-21.8952",
        "Lisbon" => "https://api.sunrise-sunset.org/json?lat=38.7167&lng=-9.1333",
        "London" => "https://api.sunrise-sunset.org/json?lat=51.5085&lng=-0.1257",
    
    
];
// Connect to the database
try {
    $pdo = new PDO($dsn, $db_user, $db_pass, $options);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Define the SQL statement for database insertion
$sql = "INSERT INTO sunrise_sunset_data (sunrise, sunset, solar_noon, day_length, location) 
        VALUES (:sunrise, :sunset, :solar_noon, :day_length, :location)";

// Loop through each URL
foreach ($urls as $name => $url) {
    // Fetch data from the current URL
    $data = file_get_contents($url);

    // Check if data was fetched successfully
    if ($data !== false) {
        // Parse the JSON data into an associative array
        $data_array = json_decode($data, true);
        
        // Display the data along with the assigned name
        echo "<h2>Data from $name:</h2>";
        print_r($data_array); 
        echo "<br><br>";

        // Prepare the statement for database insertion
        $stmt = $pdo->prepare($sql);

        // Extract the relevant data from the $data_array
        $items = $data_array['results'];

        // Bind values and execute the insertion query
        $stmt->bindValue(':location', $name);
        $stmt->bindValue(':sunrise', $items['sunrise']);
        $stmt->bindValue(':sunset', $items['sunset']);
        $stmt->bindValue(':solar_noon', $items['solar_noon']);
        $stmt->bindValue(':day_length', $items['day_length']); 
        
        if ($stmt->execute()) {
            echo "Eintrag für '{$items['sunrise']}' wurde erfolgreich eingefügt.\n";
            echo "Eintrag für '{$items['sunset']}' wurde erfolgreich eingefügt.\n";
        } else {
            echo "Fehler beim Einfügen des Eintrags für '{$items['sunrise']}'.\n";
        }
    } else {
        // Display an error message if data fetching fails
        echo "Error fetching data from $name ($url)<br><br>";
    }
}
?>
