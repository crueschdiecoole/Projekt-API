<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server Connection Example</title>
</head>
<body>
    <h1>Server Connection Example</h1>
    <?php
    // URL of the server endpoint
    $serverUrl = 'https://520260-4.web.fhgr.ch';

    // Make a request to the server
    $response = file_get_contents($serverUrl);

    // Display the response
    echo "<p>Response from server:</p>";
    echo "<pre>" . htmlspecialchars($response) . "</pre>";
    ?>
</body>
</html>
