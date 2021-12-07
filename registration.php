<!--
  UReview Sign Up Page
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
  <title>UReview - Sign Up</title>
  <meta property="og:title" content="UReview - Sign Up">
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

  <!-- The Sign Up Page-->
  <div class="mt-auto">
    <div class="d-flex justify-content-center">
      <!-- A self-sizing card with a dark background -->
      <div class="pt-auto card px-3 text-center px-4 bg-dark">
        <form name="registrationForm" class="was-validated" action="register_user.php" method="POST">
          <h4 class="py-2 text-white">Create a UReview Account</h4>
          <!-- Link to log-in page if user has an account-->
          <div> <span class="text-white">Already have an account?</span>
            <a href="./login.php" class="text-decoration-none text-warning">Log In</a>
          </div>
          <!-- These inputs will be used to create new users in the database
            The various form controls are inputs which indicate they can be typed in-->
          <div class="mt-3 px-3 text-white">
            <input id="username" name="username" class="form-control" placeholder="Username" required>
            <div class="valid-feedback"> Nice username!</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
          <!-- First and Last Name -->
          <div class="input-group px-3 mt-3 text-white justify-content-center">
            <input id="firstName" name="firstName" type="text" class="form-control" placeholder="First Name" aria-label="First Name" required>
            <input id="lastName" name="lastName" type="text" class="form-control" placeholder="Last Name" aria-label="Last Name" required>
            <div class="valid-feedback"> Good to go.</div>
            <div class="invalid-feedback">Please fill out these fields.</div>
          </div>
          <!-- E-Mail -->
          <div class="mt-3 px-3 text-white">
            <input id="email" name="email" class="form-control" type="email" placeholder="E-mail" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Enter a valid e-mail address</div>
          </div>
          <!-- Password -->
          <div class="mt-3 px-3 text-white">
            <input id="userPassword" name="userPassword" class="form-control" type="password" placeholder="Password" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Choose a strong password</div>
          </div>
          <!-- Confirm the Password -->
          <div class="mt-3 px-3 text-white">
            <input id="passwordConfirm" name="passwordConfirm" class="form-control" type="password" placeholder="Confirm Password" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Confirm your strong password.</div>
          </div>
          <!-- After all the inputs are checked for valid inputs, the user will be able to sign up.-->
          <div class="my-3 d-grid px-3 text-white">
            <input type="hidden" name="form_submitted" value="1">
            <input type="submit" class="btn btn-warning btn-block btn-signup text-uppercase" aria-label="Sign Up Button" value="Sign Up" required>
            </input>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php include('footer.html'); ?>

</body>

</html>