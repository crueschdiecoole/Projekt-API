<?php
require_once '../php/transform.php';
require_once '../config/config.php';
require_once '../html/europemap.html';

$urls = [    
    
     // UTC +3.00 H (Eastern European Time Zone, EET)    
         "Helsinki" => "https://api.sunrise-sunset.org/json?lat=60.1709&lng=24.9375",
         "Tallinn" => "https://api.sunrise-sunset.org/json?lat=59.4369&lng=24.7530",
         "Riga" => "https://api.sunrise-sunset.org/json?lat=56.9496&lng=24.1052",
         "Vilnius" => "https://api.sunrise-sunset.org/json?lat=54.6897&lng=25.2799",
         "Kiew" => "https://api.sunrise-sunset.org/json?lat=50.4501&lng=30.5234",
         "Chisinau" => "https://api.sunrise-sunset.org/json?lat=47.0167&lng=28.8333",
         "Bukarest" => "https://api.sunrise-sunset.org/json?lat=44.4268&lng=26.1025",
         "Sofia" => "https://api.sunrise-sunset.org/json?lat=42.6970&lng=23.3240",
         "Athen" => "https://api.sunrise-sunset.org/json?lat=37.9760&lng=23.7360",
         "Nikosia" => "https://api.sunrise-sunset.org/json?lat=37.9167&lng=23.7",
 
     // UTC + 2.00 H (Central European Time Zone, CET)
         "Bern" => "https://api.sunrise-sunset.org/json?lat=46.948090&lng=7.447440",
         "Berlin" => "https://api.sunrise-sunset.org/json?lat=52.520008&lng=13.404954",
         "Amsterdam" => "https://api.sunrise-sunset.org/json?lat=52.370216&lng=4.895168",
         "Oslo" => "https://api.sunrise-sunset.org/json?lat=59.912731&lng=10.746090",
         "Brüssel" => "https://api.sunrise-sunset.org/json?lat=50.8466&lng=4.3517",
         "Kopenhagen" => "https://api.sunrise-sunset.org/json?lat=55.6760&lng=12.5683",
         "Paris" => "https://api.sunrise-sunset.org/json?lat=48.8534&lng=2.3488",
         "Rom" => "https://api.sunrise-sunset.org/json?lat=41.9028&lng=12.4964",
         "Zagreb" => "https://api.sunrise-sunset.org/json?lat=45.8150&lng=15.9819",
         "Vaduz" => "https://api.sunrise-sunset.org/json?lat=47.1415&lng=9.5215",
         "Luxembourg" => "https://api.sunrise-sunset.org/json?lat=49.8153&lng=6.1296",
         "Monaco" => "https://api.sunrise-sunset.org/json?lat=43.7333&lng=7.4167",
         "Amsterdam" => "https://api.sunrise-sunset.org/json?lat=52.370216&lng=4.895168",
         "Oslo" => "https://api.sunrise-sunset.org/json?lat=59.912731&lng=10.746090",
         "Wien" => "https://api.sunrise-sunset.org/json?lat=48.2082&lng=16.3728",
         "Stockholm" => "https://api.sunrise-sunset.org/json?lat=59.3293&lng=18.0686",
         "Madrid" => "https://api.sunrise-sunset.org/json?lat=40.4167&lng=-3.7033",
         "Prag" => "https://api.sunrise-sunset.org/json?lat=50.0878&lng=14.4205",
         "Budapest" => "https://api.sunrise-sunset.org/json?lat=47.4983&lng=19.0408",
         "Vatikanstaat" => "https://api.sunrise-sunset.org/json?lat=42.9&lng=20.45",
         "Tirana" => "https://api.sunrise-sunset.org/json?lat=41.3275&lng=19.818irana",
         "Andorra La Vella" => "https://api.sunrise-sunset.org/json?lat=42.5063&lng=1.5218",
         "Sarajevo" => "https://api.sunrise-sunset.org/json?lat=43.8563&lng=18.4131",
         "Valleta" => "https://api.sunrise-sunset.org/json?lat=39.4667&lng=9.1333",
         "Podgorica" => "https://api.sunrise-sunset.org/json?lat=42.4417&lng=19.2667",
         "Skopje" => "https://api.sunrise-sunset.org/json?lat=42.0046&lng=21.43",
         "Warschau" => "https://api.sunrise-sunset.org/json?lat=52.2297&lng=21.0122",
         "Città di San Marino" => "https://api.sunrise-sunset.org/json?lat=43.9424&lng=12.4578",
         "Belgrad" => "https://api.sunrise-sunset.org/json?lat=44.8189&lng=20.4689",
         "Bratislava" => "https://api.sunrise-sunset.org/json?lat=48.145&lng=17.107",
         "Lubljana" => "https://api.sunrise-sunset.org/json?lat=46.0569&lng=14.5058",
     
     
     // UTC +0.00 H (Western European Time Zone, WET)
         "Dublin" => "https://api.sunrise-sunset.org/json?lat=53.3498&lng=-6.2603",
         "Reykjavik" => "https://api.sunrise-sunset.org/json?lat=64.1353&lng=-21.8952",
         "Lissabon" => "https://api.sunrise-sunset.org/json?lat=38.7167&lng=-9.1333",
         "London" => "https://api.sunrise-sunset.org/json?lat=51.5085&lng=-0.1257",
    
];
// Check if the country parameter is provided

try {
    $pdo = new PDO($dsn, $db_user, $db_pass, $options);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Define the SQL statement for database insertion
$sql = "INSERT INTO sunrise_sunset_data (sunrise, sunset, solar_noon, day_length, location) 
        VALUES (:sunrise, :sunset, :solar_noon, :day_length, :location)";

// Check if the country parameter is provided
if (isset($_GET['country'])) {
    // Get the country ID from the request
    $countryId = $_GET['country'];

    // Fetch data from the current URL based on the clicked country
    $url = $urls[$countryId];

    // Fetch data from the current URL
    $data = file_get_contents($url);

    // Check if data was fetched successfully
    if ($data !== false) {
        // Parse the JSON data into an associative array
        $data_array = json_decode($data, true);

        // Prepare the statement for database insertion
        $stmt = $pdo->prepare($sql);

        // Extract the relevant data from the $data_array
        $items = $data_array['results'];

        // Bind values and execute the insertion query
        $stmt->bindValue(':location', $countryId);
        $stmt->bindValue(':sunrise', $items['sunrise']);
        $stmt->bindValue(':sunset', $items['sunset']);
        $stmt->bindValue(':solar_noon', $items['solar_noon']);
        $stmt->bindValue(':day_length', $items['day_length']);

        if ($stmt->execute()) {
            // Output success message if insertion is successful
            echo "Data for $countryId inserted successfully.";
        } else {
            // Output error message if insertion fails
            echo "Error inserting data for $countryId.";
        }
    } else {
        // Output error message if data fetching fails
        echo "Error fetching data for $countryId.";
    }
} else {
    // Output error message if no country parameter is provided
    echo "No country parameter provided.";
}
?>