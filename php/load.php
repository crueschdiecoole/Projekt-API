<?php
//EXTRACT

require_once '../php/transform.php';
require_once '../config/config.php';

$urls = [
    // UTC +3.00 H (Eastern European Time Zone, Year Round)
        "Minsk" => [
            "id" => "minsk",
            "url" => "https://api.sunrise-sunset.org/json?lat=53.900600&lng=27.558971&tzid=Europe/Minsk",
        ],
        "Ankara" => [
            "id" => "ankara",
            "url" => "https://api.sunrise-sunset.org/json?lat=39.933365&lng=32.859741&tzid=Europe/Ankara",
        ],

    // UTC +2.00 H (Eastern European Time Zone, EET)    
        "Helsinki" => [
            "id" => "helsinki",
            "url" => "https://api.sunrise-sunset.org/json?lat=60.1709&lng=24.9375&tzid=Europe/Helsinki",
        ],
        "Tallinn" => [
            "id" => "tallinn",
            "url" => "https://api.sunrise-sunset.org/json?lat=59.4369&lng=24.7530&tzid=Europe/Tallinn",
        ],
        "Riga" => [
            "id" => "riga",
            "url" => "https://api.sunrise-sunset.org/json?lat=56.9496&lng=24.1052&tzid=Europe/Riga",
        ],           
        "Vilnius" => [  
            "id" => "vilnius",
            "url" => "https://api.sunrise-sunset.org/json?lat=54.6897&lng=25.2799&tzid=Europe/Vilnius",
        ],
        "Kiev" => [
            "id" => "kiev",
            "url" => "https://api.sunrise-sunset.org/json?lat=50.4501&lng=30.5234&tzid=Europe/Kyiv",
        ],
    
        "Chisinau" => [
            "id" => "chisinau",
            "url" => "https://api.sunrise-sunset.org/json?lat=47.0167&lng=28.8333&tzid=Europe/Chisinau",
        ],
        "Bucharest" => [
            "id" => "bucharest",
            "url" => "https://api.sunrise-sunset.org/json?lat=44.4268&lng=26.1025&tzid=Europe/Bucharest",
        ],
        "Sofia" => [
            "id" => "sofia",
            "url" => "https://api.sunrise-sunset.org/json?lat=42.6970&lng=23.3240&tzid=Europe/Sofia",
        ],
        "Athens" => [
            "id" => "athens",
            "url" => "https://api.sunrise-sunset.org/json?lat=37.9760&lng=23.7360&tzid=Europe/Athens",
        ],

    // UTC + 1.00 H (Central European Time Zone, CET)
        "Berne" => [
            "id" => "berne",
            "url" => "https://api.sunrise-sunset.org/json?lat=46.948090&lng=7.447440&tzid=Europe/Zurich",
        ],
        "Berlin" => [
            "id" => "berlin",
            "url" => "https://api.sunrise-sunset.org/json?lat=52.520008&lng=13.404954&tzid=Europe/Berlin",
        ],
        "Amsterdam" => [
            "id" => "amsterdam",
            "url" => "https://api.sunrise-sunset.org/json?lat=52.370216&lng=4.895168&tzid=Europe/Amsterdam",
        ],
        "Oslo" => [
            "id" => "oslo",
            "url" => "https://api.sunrise-sunset.org/json?lat=59.912731&lng=10.746090&tzid=Europe/Oslo",
        ],
        "Brussels" => [
            "id" => "brussels",
            "url" => "https://api.sunrise-sunset.org/json?lat=50.8466&lng=4.3517&tzid=Europe/Brussels",
        ],
        "Copenhagen" => [
            "id" => "copenhagen",
            "url" => "https://api.sunrise-sunset.org/json?lat=55.6760&lng=12.5683&tzid=Europe/Copenhagen",
        ],
        "Paris" => [
            "id" => "paris",
            "url" => "https://api.sunrise-sunset.org/json?lat=48.8534&lng=2.3488&tzid=Europe/Paris",
        ],
        "Rome" => [
            "id" => "rome",
            "url" => "https://api.sunrise-sunset.org/json?lat=41.9028&lng=12.4964&tzid=Europe/Rome",
        ],
        "Zagreb" => [
            "id" => "zagreb",
            "url" => "https://api.sunrise-sunset.org/json?lat=45.8150&lng=15.9819&tzid=Europe/Zagreb",
        ],
        "Luxembourg" => [
            "id" => "luxembourg",
            "url" => "https://api.sunrise-sunset.org/json?lat=49.8153&lng=6.1296&tzid=Europe/Luxembourg",
        ],
        "Vienna" => [
            "id" => "vienna",
            "url" => "https://api.sunrise-sunset.org/json?lat=48.2082&lng=16.37285&tzid=Europe/Vienna",
        ],
        "Stockholm" => [
            "id" => "stockholm",
            "url" => "https://api.sunrise-sunset.org/json?lat=59.3293&lng=18.0686&tzid=Europe/Stockholm",
        ],
        "Madrid" => [
            "id" => "madrid",
            "url" => "https://api.sunrise-sunset.org/json?lat=40.4167&lng=-3.7033&tzid=Europe/Madrid",
        ],
        "Prague" => [
            "id" => "prague",
            "url" => "https://api.sunrise-sunset.org/json?lat=50.0878&lng=14.4205&tzid=Europe/Prague",
        ],
        "Budapest" => [
            "id" => "budapest",
            "url" => "https://api.sunrise-sunset.org/json?lat=47.4983&lng=19.0408&tzid=Europe/Budapest",
        ],
        "Tirane" => [
            "id" => "tirane",
            "url" => "https://api.sunrise-sunset.org/json?lat=41.3275&lng=19.818irana&tzid=Europe/Tirane",
        ],
        "Sarajevo" => [
            "id" => "sarajevo",
            "url" => "https://api.sunrise-sunset.org/json?lat=43.8563&lng=18.4131&tzid=Europe/Sarajevo",
        ],
        "Podgorica" => [
            "id" => "podgorica",
            "url" => "https://api.sunrise-sunset.org/json?lat=42.4417&lng=19.2667&tzid=Europe/Podgorica",
        ],
        "Skopje" => [
            "id" => "skopje",
            "url" => "https://api.sunrise-sunset.org/json?lat=42.0046&lng=21.43&tzid=Europe/Skopje",
        ],
        "Warsaw" => [
            "id" => "warsaw",
            "url" => "https://api.sunrise-sunset.org/json?lat=52.2297&lng=21.0122&tzid=Europe/Warsaw",
        ],
        "Belgrade" => [
            "id" => "belgrade",
            "url" => "https://api.sunrise-sunset.org/json?lat=44.8189&lng=20.4689&tzid=Europe/Belgrade",
        ],
        "Bratislava" => [
            "id" => "bratislava",
            "url" => "https://api.sunrise-sunset.org/json?lat=48.145&lng=17.107&tzid=Europe/Bratislava",
        ],
        "Ljubljana" => [
            "id" => "ljubljana",
            "url" => "https://api.sunrise-sunset.org/json?lat=46.0569&lng=14.5058&tzid=Europe/Ljubljana",
        ],
        "Pristina" => [
            "id" => "pristina",
            "url" => "https://api.sunrise-sunset.org/json?lat=42.663876&lng=21.164085&tzid=Europe/Pristina",
        ],    
    
    // UTC +0.00 H (Western European Time Zone, WET)
        "Dublin" => [
            "id" => "dublin",
            "url" => "https://api.sunrise-sunset.org/json?lat=53.3498&lng=-6.2603&tzid=Europe/Dublin",
        ],
        "Reykjavik" => [
            "id" => "reykjavik",
            "url" => "https://api.sunrise-sunset.org/json?lat=64.1353&lng=-21.8952&tzid=Atlantic/Reykjavik",
        ],
        "Lisbon" => [
            "id" => "lisbon",
            "url" => "https://api.sunrise-sunset.org/json?lat=38.7167&lng=-9.1333&tzid=Europe/Lisbon",
        ],
        "London" => [
            "id" => "london",
            "url" => "https://api.sunrise-sunset.org/json?lat=51.5085&lng=-0.1257&tzid=Europe/London",
        ],
    
];

// Connect to the database
try {
    $pdo = new PDO($dsn, $db_user, $db_pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int) $e->getCode());
}

foreach ($urls as $location => $data) {
    $url = $data['url']; // Access the URL from the nested array

    $data = file_get_contents($url);
    if ($data !== false) {
        $data_array = json_decode($data, true);
        if ($data_array['status'] === 'OK') {
            $results = $data_array['results'];
            $sunrise = $results['sunrise'];
            $sunset = $results['sunset'];
            $solar_noon = $results['solar_noon'];
            $day_length = $results['day_length'];

            $stmt = $pdo->prepare("INSERT INTO sunrise_sunset_data (location, sunrise, sunset, solar_noon, day_length) VALUES (?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE sunrise=VALUES(sunrise), sunset=VALUES(sunset), solar_noon=VALUES(solar_noon), day_length=VALUES(day_length)");
            $stmt->execute([$location, $sunrise, $sunset, $solar_noon, $day_length]);
            
        }
    }
}
$sql = "SELECT * FROM sunrise_sunset_data";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll();
?>