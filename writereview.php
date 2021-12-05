<!--
  UReview Write Review Page
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
  <title>UReview - Write a Review</title>
  <meta property="og:title" content="UReview - Write a Review">
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <script src="index.js"></script>
</head>

<!-- The entire webpage must fill the entire viewport,
  and columns will stretch to fit-->

<body class="d-flex flex-column min-vh-100">

  <?php include('header.html'); ?>

  <!-- Write a Review Card -->
  <div class="mt-auto">
    <div class="d-flex justify-content-center">
      <div class="pt-auto card px-3 text-center px-4 bg-dark">
        <form name="addLocationForm" action="upload_review.php">
          <h4 class="py-2 text-white">Write a Review</h4>
          <div> <span class="text-white">Want to add a location instead?</span>
            <!-- Link for add-location page -->
            <a href="./submission.php" class="text-decoration-none text-warning">Add a Location</a>
          </div>
          <!-- Name of location is a text-->
          <div class="mt-3 px-3 text-white">
            <input class="form-control" name="locationName" type="text" placeholder="Name" aria-label="Input name">
          </div>
          <!-- The Reviewer-->
          <div class="mt-3 px-3 text-white">
            <input class="form-control" name="reviewer" type="text" placeholder="Reviewer Name" aria-label="Input Reviewer Name">
          </div>
          <!-- The Rating out of five-->
          <div class="mt-3 px-3 text-white">
            <input class="form-control" name="rating" type="number" min="0" max="5" placeholder="Star Rating (out of five)" aria-label="Select a star rating">
          </div>
          <!-- The title for the review-->
          <div class="mt-3 px-3 text-white">
            <input class="form-control" name="reviewTitle" type="text" placeholder="Review Title" aria-label="Title of Review">
          </div>
          <!-- The review details -->
          <div class="mt-3 px-3 text-white">
            <input class="form-control" name="reviewDetails" type="text" placeholder="Review Details" aria-label="Details of Review">
          </div>
          <div class="my-3 d-grid px-3 text-white">
            <input name="uploadButton" type="submit" class="btn btn-warning btn-block btn-signup text-uppercase" aria-label="Button to Upload Review" value="Write Review">
            </input>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php include('footer.html'); ?>
</body>

</html>