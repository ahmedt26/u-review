<!--
  UReview Landing Page
  Abdullah Nafees and Tahseen Ahmed
  Monday, October 4th, 2021
-->
<!DOCTYPE html>
<!-- Open Graph Protocol Metadata Added to this page-->
<html prefix="og: https://ogp.me/ns#" lang="en">

<head>
  <!-- Metadata of Website 
    'viewport' is what screen this page is being accessed by, the scale is set to default size.
    The 'rel=icon' gives us the Logo image for the browser tabs.
    The various meta data give tab information  e.g what shows up in the tab text.
    We load up custom fonts and icons we need using links and Bootstrap, as well as a script
    to create a working hamburger for responsiveness.
  -->
  <title>UReview - Home</title>
  <meta property="og:title" content="UReview - Home">
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

  <!-- Navbar -->
  <!-- The navbar expands and shrinks according to screen resizing.
          It is also of a dark theme, and stick to the top of the user's screen

        'navbar' denote this is Bootstrap's navbar system which allows creation of navbar headers
        'container' is Bootstrap's simple layout element with default 15px padding 
      
        'navbar-expand-lg' just means the navbar will expand at the given break point (large >=992px)
        'bg-dark' and 'navbar-dark' just means the fill color will be the dark color-->

  <!-- the php include() function takes template HTML code from another .html file and puts it in the .php file. Allows for code reuse -->
  <?php include('header.html'); ?>

  <!-- h-100 means the div will be fully expanded 
        'search-top-padding' is our CSS which puts the title and search bar near the middle (40vh)-->
  <div class="d-flex flex-column h-100 search-top-padding align-items-center">
    <div class="title-push-center">
      <!-- Push content to center of div -->
      <h1 class="centered-title align-items-center">UReview</h1>
      <small class="text-muted align-self-center">Things reviewed by U</small>
    </div>
  </div>

  <!-- The Main Search Bar. It is centered and so are the contents in this div-->
  <!-- Searches will send the user to the results page (with full backend, it will show actual results)-->
  <!-- A simple button that retrieves the users location when clicked and displays it in the search bar-->
  <div class="d-flex flex-column h-100 container d-flex justify-content-center align-items-center">
    <div class="input-group col-sm-7 input-group-lg justify-content-center align-items-center">
      <input id="search" type="search" class="form-control" placeholder="Search..." aria-label="Search for something...">
    </div>
  </div>
  <?php include('footer.html'); ?>
</body>

</html>