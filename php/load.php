<?php
//EXTRACT

require_once 'transform.php';
require_once '../config/config.php';

$urls = [
    "Bern" => "https://api.sunrise-sunset.org/json?lat=46.948090&lng=7.447440",
    "Berlin" => "https://api.sunrise-sunset.org/json?lat=52.520008&lng=13.404954",
    "Amsterdam" => "https://api.sunrise-sunset.org/json?lat=52.370216&lng=4.895168",
    "Oslo" => "https://api.sunrise-sunset.org/json?lat=59.912731&lng=10.746090",
    "Tirana" => "https://api.sunrise-sunset.org/json?lat=41.3275&lng=19.818irana",
    "Andorra La Vella" => "https://api.sunrise-sunset.org/json?lat=42.5063&lng=1.5218",
    "Brüssel" => "https://api.sunrise-sunset.org/json?lat=50.8466&lng=4.3517",
    "Sarajevo" => "https://api.sunrise-sunset.org/json?lat=43.8563&lng=18.4131",
    "Kopenhagen" => "https://api.sunrise-sunset.org/json?lat=55.6760&lng=12.5683",
    "Paris" => "https://api.sunrise-sunset.org/json?lat=48.8534&lng=2.3488",
    "Dublin" => "https://api.sunrise-sunset.org/json?lat=53.3498&lng=-6.2603",
    "Reykjavik" => "https://api.sunrise-sunset.org/json?lat=64.1353&lng=-21.8952",
    "Rome" => "https://api.sunrise-sunset.org/json?lat=41.9028&lng=12.4964",
    "Zagreb" => "https://api.sunrise-sunset.org/json?lat=45.8150&lng=15.9819",
    "Vaduz" => "https://api.sunrise-sunset.org/json?lat=47.1415&lng=9.5215",
    "Luxembourg" => "https://api.sunrise-sunset.org/json?lat=49.8153&lng=6.1296",
    "Valleta" => "https://api.sunrise-sunset.org/json?lat=39.4667&lng=9.1333",
    "Monaco" => "https://api.sunrise-sunset.org/json?lat=43.7333&lng=7.4167",
    "Podgorica" => "https://api.sunrise-sunset.org/json?lat=42.4417&lng=19.2667",
    "Amsterdam" => "https://api.sunrise-sunset.org/json?lat=52.370216&lng=4.895168",
    "Skopje" => "https://api.sunrise-sunset.org/json?lat=42.0046&lng=21.43",
    "Oslo" => "https://api.sunrise-sunset.org/json?lat=59.912731&lng=10.746090",
    "Wien" => "https://api.sunrise-sunset.org/json?lat=48.2082&lng=16.3728",
    "Warschau" => "https://api.sunrise-sunset.org/json?lat=52.2297&lng=21.0122",
    "Lissabon" => "https://api.sunrise-sunset.org/json?lat=38.7167&lng=-9.1333",
    "Moskai" => "https://api.sunrise-sunset.org/json?lat=55.7558&lng=37.6176",
    "Città di San Marino" => "https://api.sunrise-sunset.org/json?lat=43.9424&lng=12.4578",
    "Stockholm" => "https://api.sunrise-sunset.org/json?lat=59.3293&lng=18.0686",
    "Belgrade" => "https://api.sunrise-sunset.org/json?lat=44.8189&lng=20.4689",
    "Bratislava" => "https://api.sunrise-sunset.org/json?lat=48.145&lng=17.107",
    "Lubljana" => "https://api.sunrise-sunset.org/json?lat=46.0569&lng=14.5058",
    "Madrid" => "https://api.sunrise-sunset.org/json?lat=40.4167&lng=-3.7033",
    "Prag" => "https://api.sunrise-sunset.org/json?lat=50.0878&lng=14.4205",
    "Budapest" => "https://api.sunrise-sunset.org/json?lat=47.4983&lng=19.0408",
    "Vatikanstaat" => "https://api.sunrise-sunset.org/json?lat=42.9&lng=20.45",
    "London" => "https://api.sunrise-sunset.org/json?lat=51.5085&lng=-0.1257",
    
];
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
    }

    else {
        // Display an error message if data fetching fails
        echo "Error fetching data from $name ($url)<br><br>";
    }

//LOAD

// Connect to the database
try {
    $pdo = new PDO($dsn, $db_user, $db_pass, $options);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

$sql = "INSERT INTO sunrise_sunset_data (sunrise, sunset, solar_noon, day_length) 
        VALUES (:sunrise, :sunset, :solar_noon, :day_length)";

// Prepare the statement
$stmt = $pdo->prepare($sql);

$items = $data_array['results']; 

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
} // repeat immer nur 2 urls eingefügt

?>

