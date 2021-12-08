// Initialize and add the map
function initMap() {
  let currentLocation = { lat: 0, lng: 0 };
  if ('geolocation' in navigator) {
    // If it is supported, get the users location
    navigator.geolocation.getCurrentPosition(onFinish);
  } else {
    onFinish({ coords: { latitude: 43.255203, longitude: -79.843826 } })
  }
}

function onFinish(position) {
  let currentLocation = { lat: 0, lng: 0 };
  currentLocation.lat = position.coords.latitude;
  currentLocation.lng = position.coords.longitude;
  // Create a google maps map, and place it in the div with id 'map'
  // Zoom in and center the map at Current Location
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 12,
    center: currentLocation,
  });

  // This portion of the code is used to set the markers and labels
  // Get the all the locations by getting elements by id "locationInfo" into locations
  // Get all the elements with p tag and store into info
  // Get the name of the locations by h5 tag and store in nameInfo
  const locations = document.getElementById("locationInfo");
  const info = locations.getElementsByTagName("p");
  const nameInfo = locations.getElementsByTagName("h5");

  // Run a loop that goes through all the elements in info and nameInfo and extracts the information needed
  // Information extracted is the name of the location, the id, longitude and latitude.
  for (let i = 0; i < info.length; i += 4) {
    let name = nameInfo[i].innerHTML;
    let locationID = info[i + 1].innerHTML.split(" ")[1]
    let lng = info[i + 2].innerHTML.split(" ")[1]
    let lat = info[i + 3].innerHTML.split(" ")[1]
    lng = parseFloat(lng);
    lat = parseFloat(lat);

    // Create a content string for the label using the variables previous set
    const contentString =
      '<div id="content>' +
      '<div id="contentTitle">' +
      `<h6>${name}</h6>` +
      '</div>' +
      '<div id="contentBody">' +
      `<p>Latitude: ${lat} <br> Longitude: ${lng} </p>` +
      `<a href="individual_page.php?id=${locationID}">Go to ${name}</a>` +
      '</div>' +
      '</div>';

    // Call addMarker function to add a marker to the map
    addMarker({ coords: { lat, lng }, content: contentString, map: map })
  }
}

function addMarker(param) {
  // Create a google maps marker
  // Place it on the map at the location of entered coordinates.
  const marker = new google.maps.Marker({
    position: param.coords,
    map: param.map,
  });

  if (param.content) {
    // Create a google maps info window
    // Set the content to what we stored in 'contentString'
    const infoWindow = new google.maps.InfoWindow({
      content: param.content,
    });

    // Add a listener to the marker
    // If the marker is clicked, open up the info window
    marker.addListener("click", () => {
      infoWindow.open(
        param.map,
        marker
      );
    });
  }

}

// Initialize and add the map
function initIndividualMap() {
  // Specific location map

  // This portion of the code is used to set the markers and labels
  // Get the location by getting elements by id "individualLocationInfo" into location
  // Get all the elements with h4 tag and store into info
  const location = document.getElementById("individualLocationInfo");
  const info = location.getElementsByTagName("h4");

  // Extract the longitude and latitude of the location
  let latitude = info[1].innerHTML.split(" ")[2]
  let longitude = info[2].innerHTML.split(" ")[2]
  latitude = parseFloat(latitude);
  longitude = parseFloat(longitude);

  // Store the information into locationSpot
  const locationSpot = { lat: latitude, lng: longitude };

  // Create a google maps map, and place it in the div with id 'individualMap'
  // Zoom in and center the map at the specific location
  const individualMap = new google.maps.Map(document.getElementById("individualMap"), {
    zoom: 14,
    center: locationSpot,
  });

  // Create a google maps marker
  // Place it on the map at the location of the specific location.
  const marker = new google.maps.Marker({
    position: locationSpot,
    map: individualMap,
  });
}

function getUserLocation() {
  // Get element with id 'latitude' and 'longitude' and store it in result
  let lat = document.getElementById("latitude")
  let long = document.getElementById("longitude")

  // Check if geolocation is supported by the browser
  // If it is supported, get the users location
  // Update the values of latitude and longitude to display the users location
  // If not supported, change value of latitude and longitude to 0
  if ('geolocation' in navigator) {
    // If it is supported, get the users location
    //
    navigator.geolocation.getCurrentPosition((position) => {
      lat.value = position.coords.latitude;
      long.value = position.coords.longitude;
    });
  } else {
    lat.value = 0;
    long.value = 0;
  }
}