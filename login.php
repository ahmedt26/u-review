<!--
  UReview Log In Page
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
  <title>UReview - Log In</title>
  <meta property="og:title" content="UReview - Log In">
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


  <!-- The Log In Card -->
  <!-- The username and password will be sent to the server-side for user authentication
      m and p classes indicate padding, t means top, auto essentially will expand as much as possible
      py means padding vertically (px is horizontal) and the numbers are preset values of padding -->
  <div class="mt-auto">
    <div class="d-flex justify-content-center">
      <div class="pt-auto card px-3 text-center px-4 bg-dark">
        <!-- The Form -->
        <form name="loginForm" onsubmit="return validateLogin()">
          <h4 class="py-2 text-white">Log In to UReview</h4>
          <div> <span class="text-white">Don't have an account?</span>
            <a href="./registration.html" class="text-decoration-none text-warning">Sign Up</a>
          </div>
          <!-- Username Input -->
          <div class="mt-3 px-3 text-white">
            <input id="login-username" name="username" class="form-control" placeholder="Username" aria-label="Input Username">
          </div>
          <!-- Password Input -->
          <div class="mt-3 px-3 text-white">
            <input id="login-password" name="password" class="form-control" type="password" placeholder="Password" aria-label="Input Password">
          </div>
          <!--  Log in Button -->
          <div class="my-3 d-grid px-3 text-white">
            <input type="submit" class="btn btn-warning btn-block btn-signup text-uppercase" aria-label="Log In Button" value="Log In">
            </input>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php include('footer.html'); ?>

</body>

</html>