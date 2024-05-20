document.addEventListener("DOMContentLoaded", function() {
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

    countries.forEach(function(country) {
        var pathElement = document.getElementById(country.pathId);
        
        if (pathElement) {
            pathElement.addEventListener("click", function() {
                handleClick(country.id);
            });

            pathElement.addEventListener("mouseenter", function() {
                this.style.fill = "lightblue";
            });

            pathElement.addEventListener("mouseleave", function() {
                this.style.fill = "none";
            });
        } else {
            console.error('Element with id ' + country.pathId + ' not found.');
        }
    });

    async function handleClick(countryId) {
        console.log('Clicked on country:', countryId);
        try {
            let response = await fetch(`https://520260-4.web.fhgr.ch/php/unload.php?country=${countryId}`);
            console.log('Fetch response:', response);

            let data = await response.json();
            console.log('Response data:', data);

            if (data.error) {
                console.error(data.error);
            } else {
                var sunrise = data[0].sunrise;
                var sunset = data[0].sunset;
                var solarNoon = data[0].solar_noon;

                // Populate data into HTML elements
                document.getElementById("sunriseData").textContent = sunrise;
                document.getElementById("solarNoonData").textContent = solarNoon;
                document.getElementById("sunsetData").textContent = sunset;

                console.log('Data displayed in output elements.');
            }
        } catch (error) {
            console.error('Error fetching data:', error);
        }
    }
});