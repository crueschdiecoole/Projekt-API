document.addEventListener("DOMContentLoaded", function() {
  const moon_PHASES = {
      "Mond neu": "../img/MondNeu.png",
      "Mond Sichel": "../img/MondSichel.png",
      "Mond halb": "../img/MondHalb.png",
      "Mond voll": "../img/MondVoll.png",
  };

  const getJulianDate = (date = new Date()) => {
      const time = date.getTime();
      const tzoffset = date.getTimezoneOffset();

      return (time / 86400000) - (tzoffset / 1440) + 2440587.5;
  };

  const moon_MONTH = 29.530588853;
  const getmoonAge = (date = new Date()) => {
      const percent = getmoonAgePercent(date);
      const age = percent * moon_MONTH;
      return age;
  };
  const getmoonAgePercent = (date = new Date()) => {
      return normalize((getJulianDate(date) - 2451550.1) / moon_MONTH);
  };
  const normalize = value => {
      value = value - Math.floor(value);
      if (value < 0)
          value = value + 1;
      return value;
  };

  const getmoonPhase = (date = new Date()) => {
      const age = getmoonAge(date);
      switch (true) {
          case age < 1.84566:
              return "Mond neu";
          case age < 5.53699:
              return "Mond Sichel";
          case age < 12.91963:
              return "Mond halb";
          case age < 16.61096:
              return "Mond voll";
          case age < 23.99361:
              return "Mond halb";
          case age < 27.68493:
              return "Mond Sichel";
          default:
              return "Mond Sichel";
      }
  };

  // Get reference to the HTML element
  const moonPhaseElement = document.getElementById('moon_PHASES');
  const moonAgeElement = document.getElementById('moonAge');

  // Call the functions to get the results
  const phase = getmoonPhase();
  const age = getmoonAge();

  // Set the moon phase image
  moonPhaseElement.src = moon_PHASES[phase];

  // Update the content of the HTML elements
  moonPhaseElement.alt = phase; // Set alt attribute for accessibility


    // Function to display the appropriate pop-up message and image based on moon phase
    function displayPopup() {

        var popupText = document.getElementById("popup-text");
        var popupImg = document.getElementById("popup-img");

        if (moon_PHASES === "Mond voll") {
            popupText.textContent = "WANT HEALTHIER HAIR? THEN CUT IT TODAY AND ADD A TREATMENT!";
            popupImg.src = "../img/kamm.png"; 
        } else if (moon_PHASES === "Mond halb") {
            popupText.textContent = "YOUR HAIR IS ESPECIALLY RECEPTIVE TO HAIRDYE RIGHT NOW!";
            popupImg.src = "../img/haarspray.png"; 
        } else { 
            popupText.textContent = "NOW'S THE TIME TO GET A SHORT HAIRCUT - YOUR HAIR WON'T GROW AS FAST!";
            popupImg.src = "../img/schere.png"; 
        }

        // Display the pop-up
        document.getElementById("popup").style.display = "block";
    }

    // Call the displayPopup function when the page loads
    window.onload = displayPopup;
});
