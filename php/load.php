<?php
require_once 'transform.php';
require_once '../config/config.php';

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

$item = $results; // Assuming $results contains the array of data

    // Bind parameters and execute the statement to insert data
    $stmt->bindValue(':sunrise', $item['sunrise']);
    $stmt->bindValue(':sunset', $item['sunset']);
    $stmt->bindValue(':solar_noon', $item['solar_noon']);
    $stmt->bindValue(':day_length', $item['day_length']);

    if ($stmt->execute()) {
        echo "Eintrag für '{$item['sunrise']}' wurde erfolgreich eingefügt.\n";
        echo "Eintrag für '{$item['sunset']}' wurde erfolgreich eingefügt.\n";

    } else {
        echo "Fehler beim Einfügen des Eintrags für '{$item['sunrise']}'.\n";
    }

?>

