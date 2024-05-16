<?php
require_once '../php/test.php'; // Adjust the path as necessary

try {
    // Connect to the database
    $pdo = new PDO($dsn, $db_user, $db_pass, $options);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the country parameter is provided
    if (isset($_GET['country'])) {
        // Get the country ID from the request
        $countryId = $_GET['country'];

        // Get data from database
        $stmt = $pdo->prepare("SELECT sunrise, sunset, solar_noon, day_length FROM sunrise_sunset_data WHERE location = :location");
        $stmt->bindParam(':location', $countryId);   // Assign $countryId to location SQL entry
        $stmt->execute();
        $sunsetData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (empty($sunsetData)) {
            http_response_code(404);
            echo json_encode(["message" => "No sunsetData found."]);
            return;
        };

        // Initialize arrays to save sunsetData
        $sunrise = [];
        $sunset = [];
        $solar_noon = [];
        $day_length = [];

        // Loop through data and assign to arrays
        foreach ($sunsetData as $data) {
            $sunrise[] = (string)$data['sunrise'];
            $sunset[] = (string)$data['sunset'];
            $solar_noon[] = (string)$data['solar_noon'];
            $day_length[] = (string)$data['day_length'];
        };

        // Prepare array structure
        $sunsetResult = [
            "sunrise" => $sunrise,  //Assign $sunrise to JSON entry
            "sunset" => $sunset,
            "solar_noon" => $solar_noon,
            "day_length" => $day_length
        ];

        // Return JSON response
        header('Content-Type: application/json');
        echo json_encode($sunsetResult);
    } else {
        // If no country parameter is provided, return an error message
        echo json_encode(['error' => 'No country parameter provided']);
        exit; // Ensure no additional content is echoed
    }
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
