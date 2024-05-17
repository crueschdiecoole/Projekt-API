<?php
// Include the database configuration
require_once '../config/config.php';

header('Content-Type: application/json');

try {
    // Connect to the database
    $pdo = new PDO($dsn, $db_user, $db_pass, $options);

    // Get the country parameter from the URL
    $country = isset($_GET['country']) ? $_GET['country'] : '';

    if (empty($country)) {
        echo json_encode(['error' => 'Country parameter is required']);
        exit;
    }

// Prepare the SQL query to fetch the latest data for the specified country
$stmt = $pdo->prepare("
    SELECT * 
    FROM sunrise_sunset_data 
    WHERE location = :country 
    ORDER BY timestamp DESC 
    LIMIT 1
"); // Adjust column name if necessary
$stmt->bindParam(':country', $country, PDO::PARAM_STR);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Filter out entries without content (this should only be necessary if your data might have incomplete entries even in the latest row)
$filteredData = array_filter($data, function($entry) {
    return !empty($entry['sunrise']) && 
           !empty($entry['location']) && 
           !empty($entry['sunset']) && 
           !empty($entry['solar_noon']) && 
           !empty($entry['day_length']);
});

    // Encode the filtered array into JSON format
    $jsonData = json_encode(array_values($filteredData));
    
    // Check if json_encode failed
    if ($jsonData === false) {
        // If there was an error, return a JSON error message
        echo json_encode(['error' => 'JSON encoding error: ' . json_last_error_msg()]);
        exit;
    }

    // Echo the JSON data
    echo $jsonData;
} catch (PDOException $e) {
    // Database connection error
    echo json_encode(['error' => 'Database connection failed: ' . $e->getMessage()]);
}
?>
