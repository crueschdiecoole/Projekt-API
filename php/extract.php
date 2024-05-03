<?php

// Initialize cURL session
$ch = curl_init();

// Set the URL of the API endpoint.
$url = "https://api.sunrise-sunset.org/json?lat=46.948090&lng=7.447440";



// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url); //Set URL to fetch
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the transfer as a string

// Execute cURL request and get the response
$response = curl_exec($ch); // Execute cURL session, fetch the JSON respone

// Check for errors
if(curl_errno($ch)){
    // If there is an error, handle it here
    echo 'Error: ' . curl_error($ch);
}

// Close cURL session
curl_close($ch);

// Decode JSON response
$sunData = json_decode($response, true);

// Accessing the 'results' array
$results = $sunData['results'];
extractData($results);
print_r($results);


function extractData(&$data) {
    $data = [
        'sunrise' => $data['sunrise'],
        'sunset' => $data['sunset'],
        'day_length' => $data['day_length'],
        'solar_noon' => $data['solar_noon'],
    ];
}

?>