<!--
  UReview Header Template for Login
  Abdullah Nafees and Tahseen Ahmed
  Tuesday, December 7th, 2021
-->

<!-- Navbar -->
<!-- The navbar expands and shrinks according to screen resizing.
          It is also of a dark theme, and stick to the top of the user's screen

        'navbar' denote this is Bootstrap's navbar system which allows creation of navbar headers
        'container' is Bootstrap's simple layout element with default 15px padding 
      
        'navbar-expand-lg' just means the navbar will expand at the given break point (large >=992px)
        'bg-dark' and 'navbar-dark' just means the fill color will be the dark color-->

<header id="uReviewHeaderLogin">
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container">
      <a href="./index.php" class="navbar-brand">
        <!-- The Logo itself is a button to the home page.-->
        <img src="./assets/images/logo.svg" alt="UReview Logo">
      </a>

      <!-- This search form is for fuller screens, and disappears when the width gets too small
                  The search is xl (larger size) and disappears when it cannot be its desired length 
                  'form-inline' places the search bar inline horizontally.
                  'd-xl-flex' means the search will expand to the xl size and 'd-none' means it disappear 
                  when it cannot be this size-->
      <form class="form-inline d-xl-flex d-none">
        <!-- A type of form, the search bar.
                    The 'btn' indicate button-like styling and the outline will be of the 'warning' color (our site's accent)-->
        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-warning" type="submit" aria-label="Navbar Search Button"><i class="bi bi-search"></i></button>
      </form>

      <!-- These buttons take you to various core features of the website
                      These buttons get compressed into a hamburger on smaller screens
                    The actual burger icon is from font-icon as indicated by 'fas' and 'fa-bars'-->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-label="Hamburger for Navbar Menu">
        <span class="navbar-toggler-icon fas fa-bars"></span>
      </button>

      <!-- Each button has a link for its respective page.-->
      <!-- m and p classes determine margin and padding, while navbar-nav class has CSS pertaining to navbar
                    This is the navbar's main buttons. 'nav-item' indicates its an option in the navbar (that gets hamburgered)
                    'ms-auto' automatically sets margins, and 'align-self-end' means the thing it self is getting pushed to the right
                  -->
      <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav ms-auto align-self-end">
          <li class="nav-item px-3">
            <a class="nav-link text-white"> Logged in as: <?php echo $_SESSION['username']; ?> </a>
          </li>
          <li class="nav-item px-3">
            <a href="./index.php" class="nav-link text-white">Home</a>
          </li>
          <!-- Sample Results page will be removed when we create backend. -->
          <li class="nav-item px-3">
            <a href="./results_sample.php" class="nav-link text-white">Sample Results</a>
          </li>
          <li class="nav-item px-3">
            <a href="./submission.php" class="nav-link text-white">Add a Location</a>
          </li>
          <!-- Writing a Review is done through the individual_page.php of a location. -->
          <!-- <li class="nav-item px-3"> 
              <a href="./writereview.php" class="nav-link text-white">Write a Review</a>
            </li> -->
          <li class="nav-item px-3">
            <a href="./logout.php" class="btn btn-warning">Log Out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>

<!-- Search bar for smaller screens, for when the full one disappears 
              d-xl-none means the navbar will show when it is smaller than xl size, but not larger
              we want this because the main navbar search will be shown at xl size-->
<div>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark d-xl-none">
    <div class="container d-flex justify-content-center align-items-center">
      <form class="form-inline d-flex">
        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-warning" type="submit"><i class="bi bi-search"></i></button>
      </form>
    </div>
  </nav>
</div>