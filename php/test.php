<?php
//EXTRACT

require_once 'transform.php';
require_once '../config/config.php';
require_once '../php/europamap.php';

$urls = [
    "Bern" => "https://api.sunrise-sunset.org/json?lat=46.948090&lng=7.447440",
    "Oslo" => "https://api.sunrise-sunset.org/json?lat=59.912731&lng=10.746090"
];

// Function to extract data from HTML content using DOMDocument
function extractDataFromHTML($html_content) {
    $data = array();

    // Create a DOMDocument object
    $dom = new DOMDocument();
    // Load HTML content
    $dom->loadHTML($html_content);

    // Here you would write your code to extract specific data from the HTML content
    // For example, to extract the title:
    $data['title'] = $dom->getElementsByTagName('title')->item(0)->nodeValue;

    // You can add more code to extract other elements as needed

    return $data;
}

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
        print_r($data_array); 
        echo "<br><br>";

        // Extract data from the HTML file
        $html_content = file_get_contents('../html/test.html');
        $extracted_data = extractDataFromHTML($html_content);
        
        // Display the extracted data
        echo "<h3>Extracted Data from HTML:</h3>";
        print_r($extracted_data);
        echo "<br><br>";
    } else {
        // Display an error message if data fetching fails
        echo "Error fetching data from $name ($url)<br><br>";
    }

    // LOAD section and database operations...
}
?>
