// Initialize and add the map
function initMap() {
    // Location of Zeal Burgers
    const zeal = { lat: 43.700504427194, lng: -79.51754724407695 };

    // Create a google maps map, and place it in the div with id 'map'
    // Zoom in and center the map at Zeal Burgers
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 10,
      center: zeal,
    });

    // Create a google maps marker
    // Place it on the map at the location of Zeal Burgers.
    const marker = new google.maps.Marker({
      position: zeal,
      map: map,
    });

    // Content displayed when marker is clicked (on results page)
    // Displays the title of the location (Zeal Burgers)
    // Displays the latitude and longitude
    // Link to the individual page
    const contentString =
        '<div id="content>' +
            '<div id="contentTitle">' +
                '<h6>Zeal Burgers</h6>' +
            '</div>' +
            '<div id="contentBody">' +
                '<p>Latitude: 43.700504427194 <br> Longitude: -79.51754724407695 </p>' +
                '<a href="individual_sample.html">Go to Zeal Burgers</a>'+
            '</div>' +
        '</div>';
    
    // Create a google maps info window
    // Set the content to what we stored in 'contentString'
    const infoWindow = new google.maps.InfoWindow({
        content: contentString,
    });

    // Add a listener to the marker
    // If the marker is clicked, open up the info window
    marker.addListener("click", () => {
        infoWindow.open(
          map,
          marker
        );
      });
  }

// Initialize and add the map
function initIndividualMap() {
    // Location of Zeal Burgers
    const zeal = { lat: 43.700504427194, lng: -79.51754724407695 };

    // Create a google maps map, and place it in the div with id 'individualMap'
    // Zoom in and center the map at Zeal Burgers
    const individualMap = new google.maps.Map(document.getElementById("individualMap"), {
      zoom: 14,
      center: zeal,
    });

    // Create a google maps marker
    // Place it on the map at the location of Zeal Burgers.
    const marker = new google.maps.Marker({
      position: zeal,
      map: individualMap,
    });
  }

function getUserLocation() {
    // Get element with id 'search' and store it in result
    let result = document.getElementById("search")

    // Check if geolocation is supported by the browser
    // If it is supported, get the users location
    // Update the placeholder to display the users location
    // If not supported, update placeholder to display that it is not supported
    if('geolocation' in navigator){
        // If it is supported, get the users location
        //
        navigator.geolocation.getCurrentPosition((position) => {
            result.placeholder = "Latitude: " + position.coords.latitude + ", Longitude: " + position.coords.longitude;
          });
    } else {
        result.placeholder = "Geolocation API not supported"
    }
}