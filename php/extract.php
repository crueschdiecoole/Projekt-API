<?php

$url1 = "https://api.sunrise-sunset.org/json?lat=46.948090&lng=7.447440";
$url2 = "https://api.sunrise-sunset.org/json?lat=59.912731&lng=10.746090";

$data1 = file_get_contents($url1);
$data2 = file_get_contents($url2);

$data1_array = json_decode($data1, true);
$data2_array = json_decode($data2, true);

displayData($data1_array, 'Bern');
displayData($data2_array, 'Oslo');

function displayData($data_array, string $key) {
    if (isset($data_array[$key])) {
        echo "<h2>Data from {$key}:</h2>";
        echo $data_array[$key] . "<br>";
    } else {
        echo "<h2>Data for {$key} not available</h2>";
    }
}
function fetchData(string $url) {
    return json_decode(file_get_contents($url), true);
}
function extractData(&$data) {
    $data = [
        'sunrise' => $data['sunrise'],
        'sunset' => $data['sunset'],
        'day_length' => $data['day_length'],
        'solar_noon' => $data['solar_noon'],
    ];
}
/* Check if the function calls returned valid data */
if ($data1_array === null || $data2_array === null) {
    echo "Error: Unable to fetch data from the API";
} else {
    echo "Data fetching successful.<br>";
}

if ($results === null) {
    echo "Error: Unable to extract data from the API response";
} else {
    echo "Data extraction successful.<br>";
}
?>





