<?php
require_once 'transform.php';
require_once '../config/config.php';

$urls = [
    "Data Set Bern" => "https://api.sunrise-sunset.org/json?lat=46.948090&lng=7.447440",
    "Data Set Oslo" => "https://api.sunrise-sunset.org/json?lat=59.912731&lng=10.746090"
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
        print_r($data_array); // Or you can format it as per your requirement
        echo "<br><br>";
    }

    else {
        // Display an error message if data fetching fails
        echo "Error fetching data from $name ($url)<br><br>";
    }

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
 // Assuming $results contains the array of data
    // Bind parameters and execute the statement to insert data

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

