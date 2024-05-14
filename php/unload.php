<?php
require_once '../php/load.php'; // Adjust the path as necessary

try {
    // Connect to the database
    $pdo = new PDO($dsn, $db_user, $db_pass, $options);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// SQL statement to delete all data from the table
$sql = "DELETE FROM sunrise_sunset_data";

// Prepare the statement
$stmt = $pdo->prepare($sql);

// Execute the statement to delete data
if ($stmt->execute()) {
    echo "All data from sunrise_sunset_data table has been successfully removed.\n";
} else {
    echo "Error removing data from sunrise_sunset_data table.\n";
}
?>
