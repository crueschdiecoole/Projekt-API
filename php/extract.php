<?php
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
}
?>






