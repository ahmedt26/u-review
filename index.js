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

// Below are functions that act as rudimentary form validation.
// I will explain the first one, as the rest follow the same system.

// This function validates the Login form.
// When a submission button is pressed, this function will activate
// and check whether the form is correctly filled out.
// If not, the user will be notified through red outline in each incorrect field
function validateLogin() {

  // This variable holds whether one of the forms are invalid
  var isInvalid = false;
  // Each of these 'if' statements check if a field in not filled in
  if (document.loginForm.username.value == "") {
    // These commands change the styling of each form element to a red outline
    // as well as update the placeholder text to notify the user
    document.loginForm.username.style.borderColor = "#dc3545";
    document.loginForm.username.style.borderWidth = "3px";
    document.loginForm.username.placeholder = "Please provide your username!";
    // alert("Please provide your Username!");
    document.loginForm.username.focus();
    isInvalid = true;
    // If the field is correctly filled, then remove the error outline on submission click
  } else {
    document.loginForm.username.style.borderColor = "black";
    document.loginForm.username.style.borderWidth = "3px";
    document.loginForm.username.placeholder = "Enter Username...";
  }
  if (document.loginForm.password.value == "") {
    document.loginForm.password.style.borderColor = "#dc3545";
    document.loginForm.password.style.borderWidth = "3px";
    document.loginForm.password.placeholder = "Please provide your Password!";
    // alert("Please provide your Password!");
    document.loginForm.password.focus();
    isInvalid = true;
  } else {
    document.loginForm.password.style.borderColor = "black";
    document.loginForm.password.style.borderWidth = "3px";
    document.loginForm.password.placeholder = "Enter Password...";
  }
  // If any of the input fields are invalid, the form is invalid and will not be sent to server
  if (isInvalid) {
    return false;
  }
  // If all fields are valid, the function will return true and be sent to server
  return (true);
}

function validateRegistration() {
  var isInvalid = false;
  if (document.registrationForm.username.value == "") {
    document.registrationForm.username.style.borderColor = "#dc3545";
    document.registrationForm.username.style.borderWidth = "3px";
    document.registrationForm.username.placeholder = "Please provide your username!";
    document.registrationForm.username.focus();
    isInvalid = true;
  } else {
    document.registrationForm.username.style.borderColor = "black";
    document.registrationForm.username.style.borderWidth = "1px";
    document.registrationForm.username.placeholder = "Enter Username...";
  }
  if (document.registrationForm.firstName.value == "") {
    document.registrationForm.firstName.style.borderColor = "#dc3545";
    document.registrationForm.firstName.style.borderWidth = "3px";
    document.registrationForm.firstName.placeholder = "Please provide your first name!";
    document.registrationForm.firstName.focus();
    isInvalid = true;
  } else {
    document.registrationForm.firstName.style.borderColor = "black";
    document.registrationForm.firstName.style.borderWidth = "3px";
    document.registrationForm.firstName.placeholder = "Enter First Name...";
  }
  if (document.registrationForm.lastName.value == "") {
    document.registrationForm.lastName.style.borderColor = "#dc3545";
    document.registrationForm.lastName.style.borderWidth = "3px";
    document.registrationForm.lastName.placeholder = "Please provide your last name!";
    document.registrationForm.lastName.focus();
    isInvalid = true;
  } else {
    document.registrationForm.lastName.style.borderColor = "black";
    document.registrationForm.lastName.style.borderWidth = "3px";
    document.registrationForm.lastName.placeholder = "Enter Last Name...";
  }
  if (document.registrationForm.email.value == "") {
    document.registrationForm.email.style.borderColor = "#dc3545";
    document.registrationForm.email.style.borderWidth = "3px";
    document.registrationForm.email.placeholder = "Please provide your email!";
    document.registrationForm.email.focus();
    isInvalid = true;
  } else {
    document.registrationForm.email.style.borderColor = "black";
    document.registrationForm.email.style.borderWidth = "3px";
    document.registrationForm.email.placeholder = "Enter Email...";
  }
  if (document.registrationForm.password.value == "") {
    document.registrationForm.password.style.borderColor = "#dc3545";
    document.registrationForm.password.style.borderWidth = "3px";
    document.registrationForm.password.placeholder = "Please provide your password!";
    document.registrationForm.password.focus();
    isInvalid = true;
  } else {
    document.registrationForm.password.style.borderColor = "black";
    document.registrationForm.password.style.borderWidth = "3px";
    document.registrationForm.password.placeholder = "Enter Password...";
  }
  if (document.registrationForm.passwordConfirm.value != document.registrationForm.password.value) {
    document.registrationForm.passwordConfirm.style.borderColor = "#dc3545";
    document.registrationForm.passwordConfirm.style.borderWidth = "3px";
    document.registrationForm.passwordConfirm.placeholder = "Passwords do not match!";
    document.registrationForm.passwordConfirm.focus();
    isInvalid = true;
  } else {
    document.registrationForm.passwordConfirm.style.borderColor = "black";
    document.registrationForm.passwordConfirm.style.borderWidth = "3px";
    document.registrationForm.passwordConfirm.placeholder = "Confirm Password...";
  }
  if (isInvalid) {
    return false;
  }
  return (true);
}

function validateAddLocation() {
  var isInvalid = false;
  if (document.addLocationForm.locationName.value == "") {
    document.addLocationForm.locationName.style.borderColor = "#dc3545";
    document.addLocationForm.locationName.style.borderWidth = "3px";
    document.addLocationForm.locationName.placeholder = "Provide Location Name!";
    // alert("Please provide your Username!");
    document.addLocationForm.locationName.focus();
    isInvalid = true;
  } else {
    document.addLocationForm.locationName.style.borderColor = "black";
    document.addLocationForm.locationName.placeholder = "Enter Location Name...";
  }
  if (document.addLocationForm.rating.value == "") {
    document.addLocationForm.rating.style.borderColor = "#dc3545";
    document.addLocationForm.rating.style.borderWidth = "3px";
    document.addLocationForm.rating.placeholder = "Provide a Rating!!";
    document.addLocationForm.rating.focus();
    isInvalid = true;
  } else {
    document.addLocationForm.rating.style.borderColor = "black";
    document.addLocationForm.rating.placeholder = "Enter a valid Rating...";
  }
  if (document.addLocationForm.reviewTitle.value == "") {
    document.addLocationForm.reviewTitle.style.borderColor = "#dc3545";
    document.addLocationForm.reviewTitle.style.borderWidth = "3px";
    document.addLocationForm.reviewTitle.placeholder = "Provide a review Title!";
    document.addLocationForm.reviewTitle.focus();
    isInvalid = true;
  } else {
    document.addLocationForm.reviewTitle.style.borderColor = "black";
    document.addLocationForm.reviewTitle.placeholder = "Enter Review Title...";
  }
  if (document.addLocationForm.reviewDetails.value == "") {
    document.addLocationForm.reviewDetails.style.borderColor = "#dc3545";
    document.addLocationForm.reviewDetails.style.borderWidth = "3px";
    document.addLocationForm.reviewDetails.placeholder = "Provide some details about the review!";
    document.addLocationForm.reviewDetails.focus();
    isInvalid = true;
  } else {
    document.addLocationForm.reviewDetails.style.borderColor = "#dc3545";
    document.addLocationForm.reviewDetails.placeholder = "Provide Review Details...";
  }
  if (isInvalid) {
    return false;
  }
  return (true);
}

function validateSubmission() {
  var isInvalid = false;
  if (document.submissionForm.locationName.value == "") {
    document.submissionForm.locationName.style.borderColor = "#dc3545";
    document.submissionForm.locationName.style.borderWidth = "3px";
    document.submissionForm.locationName.placeholder = "Provide Location Name!";
    document.submissionForm.locationName.focus();
    isInvalid = true;
  } else {
    document.submissionForm.locationName.style.borderColor = "black";
    document.submissionForm.locationName.placeholder = "Enter Location Name...";
  }
  if (document.submissionForm.phoneNumber.value == "") {
    document.submissionForm.phoneNumber.style.borderColor = "#dc3545";
    document.submissionForm.phoneNumber.style.borderWidth = "3px";
    document.submissionForm.phoneNumber.placeholder = "Enter a valid Phone Number!";
    document.submissionForm.phoneNumber.focus();
    isInvalid = true;
  } else {
    document.submissionForm.phoneNumber.style.borderColor = "black";
    document.submissionForm.phoneNumber.placeholder = "Enter Phone Number...";
  }
  if (document.submissionForm.latitude.value == "") {
    document.submissionForm.latitude.style.borderColor = "#dc3545";
    document.submissionForm.latitude.style.borderWidth = "3px";
    document.submissionForm.latitude.placeholder = "Provide Latitude!";
    document.submissionForm.latitude.focus();
    isInvalid = true;
  } else {
    document.submissionForm.latitude.style.borderColor = "black";
    document.submissionForm.latitude.placeholder = "Enter Latitude...";
  }
  if (document.submissionForm.longitude.value == "") {
    document.submissionForm.longitude.style.borderColor = "#dc3545";
    document.submissionForm.longitude.style.borderWidth = "3px";
    document.submissionForm.longitude.placeholder = "Provide valid Longitude";
    document.submissionForm.longitude.focus();
    isInvalid = true;
  } else {
    document.submissionForm.longitude.style.borderColor = "black";
    document.submissionForm.longitude.placeholder = "Enter Longitude...";
  }
  if (document.submissionForm.locationImage.files.length == 0) {
    document.submissionForm.locationImage.style.borderColor = "#dc3545";
    document.submissionForm.locationImage.style.background = "#dc3545";
    document.submissionForm.locationImage.style.borderWidth = "3px";
    document.submissionForm.locationImage.placeholder = "Upload an Image!";
    document.submissionForm.locationImage.focus();
    isInvalid = true;
  } else {
    document.submissionForm.locationImage.style.borderColor = "black";
    document.submissionForm.locationImage.style.background = "black";
    document.submissionForm.locationImage.style.borderWidth = "3px";
    document.submissionForm.locationImage.placeholder = "Upload Image...";
  }
  if (isInvalid) {
    return false;
  }
  return (true);
}