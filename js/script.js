async function fetchData() {
    try {
        const response = await fetch('https://520260-4.web.fhgr.ch/php/load.php');
        console.log(response); // Log the response object
        
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        
        const contentType = response.headers.get('content-type');
        if (contentType && contentType.includes('application/json')) {
            const responseBody = await response.text();
            const data = JSON.parse(responseBody);
            //console.log(data);
            return data;
        } else {
            throw new Error('Invalid response format');
        }
    } catch (error) {
        console.log(error);
    }
}

fetchData();
