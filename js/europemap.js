// Define an array of country IDs and their corresponding path IDs
var countries = [
    { id: "switzerland", pathId: "switzerland-path" },
    { id: "island", pathId: "island-path" },
    { id: "uk", pathId: "uk-path" },
    { id: "irland", pathId: "irland-path" },
    { id: "norway", pathId: "norway-path" },
    { id: "sweden", pathId: "sweden-path" },
    { id: "finland", pathId: "finland-path" },
    { id: "france", pathId: "france-path" },
    { id: "portugal", pathId: "portugal-path" },
    { id: "spain", pathId: "spain-path" },
    { id: "italy", pathId: "italy-path" },
    { id: "belgium", pathId: "belgium-path" },
    { id: "thenetherlands", pathId: "thenetherlands-path" },
    { id: "luxembourg", pathId: "luxembourg-path" },
    { id: "germany", pathId: "germany-path" },
    { id: "denmark", pathId: "denmark-path" },
    { id: "croatia", pathId: "croatia-path" },
    { id: "hungary", pathId: "hungary-path" },
    { id: "albania", pathId: "albania-path" },
    { id: "poland", pathId: "poland-path" },
    { id: "belarus", pathId: "belarus-path" },
    { id: "greece", pathId: "greece-path" },
    { id: "estonia", pathId: "estonia-path" },
    { id: "latvia", pathId: "latvia-path" },
    { id: "lithuania", pathId: "lithuania-path" },
    { id: "ukraine", pathId: "ukraine-path" },
    { id: "czechrepublic", pathId: "czechrepublic-path" },
    { id: "slovakia", pathId: "slovakia-path" },
    { id: "moldova", pathId: "moldova-path" },
    { id: "romania", pathId: "romania-path" },
    { id: "bulgaria", pathId: "bulgaria-path" },
    { id: "turkey", pathId: "turkey-path" },
    { id: "macedonia", pathId: "macedonia-path" },
    { id: "bosniaandherzegovina", pathId: "bosniaandherzegovina-path" },
    { id: "montenegro", pathId: "montenegro-path" },
    { id: "serbia", pathId: "serbia-path" },
    { id: "kosovo", pathId: "kosovo-path" },
    { id: "slovenia", pathId: "slovenia-path" },

];

// Loop through the countries array and attach event listeners
countries.forEach(function(country) {
    // Add click event listener
    document.getElementById(country.pathId).addEventListener("click", function() {
        handleClick(country.id);
    });

    // Add hover effect - mouseenter
    document.getElementById(country.pathId).addEventListener("mouseenter", function() {
        this.style.fill = "lightblue"; // Add hover effect
    });

    // Remove hover effect - mouseleave
    document.getElementById(country.pathId).addEventListener("mouseleave", function() {
        this.style.fill = "none"; // Remove hover effect
    });
});


// Define a function to handle click events on SVG paths
function handleClick(countryId) {
    console.log('Clicked on country:', countryId);

    // Send an AJAX request to load.php with the clicked country's ID
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Display the fetched data on the webpage
                document.getElementById("dataOutput").innerHTML = xhr.responseText;
            } else {
                console.error('Error fetching data:', xhr.statusText);
            }
        }
    };
    xhr.open("GET", "load.php?country=" + countryId, true);
    xhr.send();
}