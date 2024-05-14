<?php
require_once 'transform.php';
require_once '../config/config.php';
require_once '../html/europemap.html';

$urls = [    
    // UTC +3.00 H (Eastern European Time Zone, EET)    
        "finland" => "https://api.sunrise-sunset.org/json?lat=60.1709&lng=24.9375",
        "estonia" => "https://api.sunrise-sunset.org/json?lat=59.4369&lng=24.7530",
        "latvia" => "https://api.sunrise-sunset.org/json?lat=56.9496&lng=24.1052",
        "lithuania" => "https://api.sunrise-sunset.org/json?lat=54.6897&lng=25.2799",
        "ukraine" => "https://api.sunrise-sunset.org/json?lat=50.4501&lng=30.5234",
        "moldova" => "https://api.sunrise-sunset.org/json?lat=47.0167&lng=28.8333",
        "romania" => "https://api.sunrise-sunset.org/json?lat=44.4268&lng=26.1025",
        "bulgaria" => "https://api.sunrise-sunset.org/json?lat=42.6970&lng=23.3240",
        "greece" => "https://api.sunrise-sunset.org/json?lat=37.9760&lng=23.7360",

    // UTC + 2.00 H (Central European Time Zone, CET)
        "switzerland" => "https://api.sunrise-sunset.org/json?lat=46.948090&lng=7.447440",
        "germany" => "https://api.sunrise-sunset.org/json?lat=52.520008&lng=13.404954",
        "thenetherlands" => "https://api.sunrise-sunset.org/json?lat=52.370216&lng=4.895168",
        "norway" => "https://api.sunrise-sunset.org/json?lat=59.912731&lng=10.746090",
        "belgium" => "https://api.sunrise-sunset.org/json?lat=50.8466&lng=4.3517",
        "denmark" => "https://api.sunrise-sunset.org/json?lat=55.6760&lng=12.5683",
        "france" => "https://api.sunrise-sunset.org/json?lat=48.8534&lng=2.3488",
        "italy" => "https://api.sunrise-sunset.org/json?lat=41.9028&lng=12.4964",
        "croatia" => "https://api.sunrise-sunset.org/json?lat=45.8150&lng=15.9819",
        "luxembourg" => "https://api.sunrise-sunset.org/json?lat=49.8153&lng=6.1296",
        "austria" => "https://api.sunrise-sunset.org/json?lat=48.2082&lng=16.3728",
        "sweden" => "https://api.sunrise-sunset.org/json?lat=59.3293&lng=18.0686",
        "spain" => "https://api.sunrise-sunset.org/json?lat=40.4167&lng=-3.7033",
        "czechrepublic" => "https://api.sunrise-sunset.org/json?lat=50.0878&lng=14.4205",
        "hungary" => "https://api.sunrise-sunset.org/json?lat=47.4983&lng=19.0408",
        "albania" => "https://api.sunrise-sunset.org/json?lat=41.3275&lng=19.818irana",
        "bosniaandherzegovnia" => "https://api.sunrise-sunset.org/json?lat=43.8563&lng=18.4131",
        "montenegro" => "https://api.sunrise-sunset.org/json?lat=42.4417&lng=19.2667",
        "macedonia" => "https://api.sunrise-sunset.org/json?lat=42.0046&lng=21.43",
        "poland" => "https://api.sunrise-sunset.org/json?lat=52.2297&lng=21.0122",
        "serbia" => "https://api.sunrise-sunset.org/json?lat=44.8189&lng=20.4689",
        "slovakia" => "https://api.sunrise-sunset.org/json?lat=48.145&lng=17.107",
        "slovenia" => "https://api.sunrise-sunset.org/json?lat=46.0569&lng=14.5058",
    
    
    // UTC +0.00 H (Western European Time Zone, WET)
        "irland" => "https://api.sunrise-sunset.org/json?lat=53.3498&lng=-6.2603",
        "island" => "https://api.sunrise-sunset.org/json?lat=64.1353&lng=-21.8952",
        "portugal" => "https://api.sunrise-sunset.org/json?lat=38.7167&lng=-9.1333",
        "uk" => "https://api.sunrise-sunset.org/json?lat=51.5085&lng=-0.1257",

    
];
?>
<?php
// Connect to the database
try {
    $pdo = new PDO($dsn, $db_user, $db_pass, $options);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Check if the country parameter is provided
if (isset($_GET['country'])) {
    // Get the country ID from the request
    $countryId = $_GET['country'];

    // Query the database to fetch data for the specified country
    $sql = "SELECT * FROM sunrise_sunset_data WHERE location = :country";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':country' => $countryId]);
    
    // Fetch the data as an associative array
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if data was found
    if ($data) {
        // Output the data as JSON
        echo json_encode($data);
    } else {
        // If no data was found for the specified country, return an error message
        echo json_encode(['error' => 'No data found for the specified country']);
    }
} else {
    // If no country parameter is provided, return an error message
    echo json_encode(['error' => 'No country parameter provided']);
}
?>


