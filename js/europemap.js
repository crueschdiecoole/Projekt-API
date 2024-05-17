var countries = [
    { id: "berne", pathId: "switzerland-path" },
    { id: "reykjavik", pathId: "island-path" },
    { id: "london", pathId: "uk-path" },
    { id: "dublin", pathId: "irland-path" },
    { id: "oslo", pathId: "norway-path" },
    { id: "stockholm", pathId: "sweden-path" },
    { id: "helsinki", pathId: "finland-path" },
    { id: "paris", pathId: "france-path" },
    { id: "lisbon", pathId: "portugal-path" },
    { id: "madrid", pathId: "spain-path" },
    { id: "rome", pathId: "italy-path" },
    { id: "brussels", pathId: "belgium-path" },
    { id: "amsterdam", pathId: "thenetherlands-path" },
    { id: "luxembourg", pathId: "luxembourg-path" },
    { id: "berlin", pathId: "germany-path" },
    { id: "copenhagen", pathId: "denmark-path" },
    { id: "zagreb", pathId: "croatia-path" },
    { id: "budapest", pathId: "hungary-path" },
    { id: "tirane", pathId: "albania-path" },
    { id: "warsaw", pathId: "poland-path" },
    { id: "minsk", pathId: "belarus-path" },
    { id: "athens", pathId: "greece-path" },
    { id: "tallinn", pathId: "estonia-path" },
    { id: "riga", pathId: "latvia-path" },
    { id: "vilnius", pathId: "lithuania-path" },
    { id: "kiev", pathId: "ukraine-path" },
    { id: "prague", pathId: "czechrepublic-path" },
    { id: "bratislava", pathId: "slovakia-path" },
    { id: "chisinau", pathId: "moldova-path" },
    { id: "bucharest", pathId: "romania-path" },
    { id: "sofia", pathId: "bulgaria-path" },
    { id: "ankara", pathId: "turkey-path" },
    { id: "skopje", pathId: "macedonia-path" },
    { id: "sarajevo", pathId: "bosniaandherzegovina-path" },
    { id: "podgorica", pathId: "montenegro-path" },
    { id: "belgrade", pathId: "serbia-path" },
    { id: "pristina", pathId: "kosovo-path" },
    { id: "ljubljana", pathId: "slovenia-path" },
    { id: "vienna", pathId: "austria-path"}
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
async function handleClick(countryId) {
    console.log('Clicked on country:', countryId);

    // Send a fetch request to load.php with the clicked country's ID
    fetch(`https://520260-4.web.fhgr.ch/php/unload.php?country=${countryId}`)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                console.error(data.error);
            } else {

                console.log(data);
                var sunrise = data.sunrise;
                var sunset = data.sunset;
                var solarNoon = data.solar_noon;
                var dayLength = data.day_length;

                // Display the data on the webpage
                document.getElementById("dataOutput").innerHTML =
                    `<p>Sunrise: ${sunrise}</p>
                     <p>Sunset: ${sunset}</p>
                     <p>Solar Noon: ${solarNoon}</p>
                     <p>Day Length: ${dayLength}</p>`;
            }
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });


}