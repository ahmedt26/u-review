<!--
  UReview Add Location Page
  Abdullah Nafees and Tahseen Ahmed
  Monday, October 4th, 2021
-->
<!DOCTYPE html>
<html prefix="og: https://ogp.me/ns#" lang="en">

<head>
  <!-- Metadata of Website 
        'viewport' is what screen this page is being accessed by, the scale is set to default size.
        The 'rel=icon' gives us the Logo image for the browser tabs.
        The various meta data give tab information  e.g what shows up in the tab text.
        We load up custom fonts and icons we need using links and Bootstrap, as well as a script
        to create a working hamburger for responsiveness.
      -->
  <title>UReview - Add a Location</title>
  <meta property="og:title" content="UReview - Add a Location">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="UReview - Things Reviewed by U!">
  <meta name="author" content="Tahseen Ahmed and Abdullah Nafees">

  <!-- Custom Fonts and Icons for Website -->
  <link rel="icon" href="./assets/images/logo.svg">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <script src="index.js"></script>
</head>

<!-- The entire webpage must fill the entire viewport,
  and columns will stretch to fit-->

<body class="d-flex flex-column min-vh-100">

  <?php include('header.html'); ?>

  <!-- Add Location Card -->
  <div class="mt-auto">
    <!-- auto-adjust margins -->
    <div class="d-flex justify-content-center">
      <form name="submissionForm" onsubmit="return validateSubmission()">
        <div class="pt-auto card px-3 text-center px-4 bg-dark">
          <h4 class="py-2 text-white">Add a Location</h4>
          <!-- Link for write review page if user wants to write a review for an existing location-->
          <div> <span class="text-white">Want to write a review instead?</span>
            <a href="./writereview.html" class="text-decoration-none text-warning">Write a Review</a>
          </div>
          <!-- Series of input forms, these inputs will be checked for correct type of input.-->
          <div class="mt-3 px-3 text-white">
            <input class="form-control" name="locationName" type="text" placeholder="Name" aria-label="Name of Location">
          </div>
          <div class="mt-3 px-3 text-white">
            <input class="form-control" name="phoneNumber" type="tel" placeholder="Phone Number" aria-label="Phone Number">
          </div>
          <div class="mt-3 px-3 text-white">
            <input id="latitude" class="form-control" name="latitude" type="text" placeholder="Latitude" aria-label="Latitude">
          </div>
          <div class="mt-3 px-3 text-white">
            <input id="longitude" class="form-control" name="longitude" type="text" placeholder="Longitude" aria-label="Longitude">
          </div>

          <button type="button" class="btn btn-warning mt-3 mx-auto" style="width: 50%" onclick="getUserLocation()">Get
            My Location</button>

          <hr>
          <!-- User will be able upload a reasonably sized image (~2MB) from their device.
              the input type=file means this button will open up the explorer so the user can find the image to upload from their device-->
          <div class="mt-3 px-3 text-white justify-content-center">
            <input class="btn-dark text-white" type="file" id="addLocationFile" name="locationImage" placeholder="Choose a file to upload" aria-label="Choose file to upload">
          </div>

          <hr> <!-- Purposeful spacing between the two buttons-->
          <!-- When all inputs completed, the user can add the location-->
          <div class="my-3 d-grid px-3 text-white">
            <input type="submit" class="btn btn-warning btn-block btn-signup text-uppercase" aria-label="Button for Add Location" value="Add Location"></input>
          </div>
        </div>
      </form>
    </div>
  </div>

  <?php include('footer.html'); ?>
</body>

</html>