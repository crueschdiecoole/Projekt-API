
<?php
// Fetch data from API
$api_url = 'https://api.sunrise-sunset.org/json?lat=36.7201600&lng=-4.4203400';
$response = file_get_contents($api_url);
$data = json_decode($response, true);

// Extract relevant data
$sunrise = $data['results']['sunrise'];
$sunset = $data['results']['sunset'];
$zenith = $data['results']['solar_noon'];
$moon_phase = $data['results']['moon_phase'];

// Insert data into database
$servername = "localhost";
$username = "520260_4_1"; // Replace with your MySQL username
$password = "P2ifSLn@FKqW"; // Replace with your MySQL password
$database = "520260_4_1"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data into database table
$sql = "INSERT INTO sunrise_sunset_data (sunrise, sunset, zenith, moon_phase) VALUES ('$sunrise', '$sunset', '$zenith', '$moon_phase')";
if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully";
} else {
    echo "Error inserting data: " . $conn->error;
}

// Close connection
$conn->close();
?>
