// Define an array of country IDs and their corresponding path IDs
var countries = [
    { id: "Berne", pathId: "switzerland-path" },
    { id: "Reykjavik", pathId: "island-path" },
    { id: "London", pathId: "uk-path" },
    { id: "Dublin", pathId: "irland-path" },
    { id: "Oslo", pathId: "norway-path" },
    { id: "Stockholm", pathId: "sweden-path" },
    { id: "Helsinki", pathId: "finland-path" },
    { id: "Paris", pathId: "france-path" },
    { id: "Lisbon", pathId: "portugal-path" },
    { id: "Madrid", pathId: "spain-path" },
    { id: "Rome", pathId: "italy-path" },
    { id: "Brussels", pathId: "belgium-path" },
    { id: "Amsterdam", pathId: "thenetherlands-path" },
    { id: "Luxembourg", pathId: "luxembourg-path" },
    { id: "Berlin", pathId: "germany-path" },
    { id: "Copenhagen", pathId: "denmark-path" },
    { id: "Zagreb", pathId: "croatia-path" },
    { id: "Budapest", pathId: "hungary-path" },
    { id: "Tirane", pathId: "albania-path" },
    { id: "Warsaw", pathId: "poland-path" },
    { id: "Minsk", pathId: "belarus-path" },
    { id: "Athens", pathId: "greece-path" },
    { id: "Tallinn", pathId: "estonia-path" },
    { id: "Riga", pathId: "latvia-path" },
    { id: "Vilnius", pathId: "lithuania-path" },
    { id: "Kiev", pathId: "ukraine-path" },
    { id: "Prague", pathId: "czechrepublic-path" },
    { id: "Bratislava", pathId: "slovakia-path" },
    { id: "Chisinau", pathId: "moldova-path" },
    { id: "Bucharest", pathId: "romania-path" },
    { id: "Sofia", pathId: "bulgaria-path" },
    { id: "Ankara", pathId: "turkey-path" },
    { id: "Skopje", pathId: "macedonia-path" },
    { id: "Sarajevo", pathId: "bosniaandherzegovina-path" },
    { id: "Podgorica", pathId: "montenegro-path" },
    { id: "Belgrade", pathId: "serbia-path" },
    { id: "Pristina", pathId: "kosovo-path" },
    { id: "Ljubljana", pathId: "slovenia-path" },
    { id: "Vienna", pathId: "austria-path" },

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
}