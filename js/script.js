async function fetchData() {
    try {
        const response = await fetch('https://520260-4.web.fhgr.ch/php/unload.php');
        console.log(response); // Log the response object
        
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        
        const contentType = response.headers.get('content-type');
        console.log(contentType); // Log the content type
        
        if (contentType && contentType.includes('application/json')) {
            const responseBody = await response.text();
            console.log('Response Body:', responseBody);
            const data = JSON.parse(responseBody);
            return data;
        }
         else {
            const responseBody = await response.text();
            console.log(responseBody); // Log the response body as text
            throw new Error('Invalid response format');
        }
    } catch (error) {
        console.log(error);
    }
}

fetchData();
