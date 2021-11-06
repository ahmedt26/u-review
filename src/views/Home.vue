<!-- The Home Page -->
<template>
  <div class="home">
    <TheHeader />
    <body class="d-flex flex-column min-vh-100">
      <!-- Search bar for smaller screens, for when the full one disappears 
        d-xl-none means the navbar will show when it is smaller than xl size, but not larger
        we want this because the main navbar search will be shown at xl size-->
      <div>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark d-xl-none">
          <div class="container d-flex justify-content-center align-items-center">
            <form class="form-inline d-flex">
              <input class="form-control" type="search" placeholder="Search" aria-label="Search" />
              <button class="btn btn-outline-warning" type="submit"><i class="bi bi-search"></i></button>
            </form>
          </div>
        </nav>
      </div>

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
      <div class="d-flex flex-column h-100 container d-flex justify-content-center align-items-center">
        <div class="input-group col-sm-7 input-group-lg justify-content-center align-items-center">
          <input id="homeSearchBar" type="search" class="form-control" placeholder="Search..." aria-label="Search for something..." />
        </div>
      </div>
    </body>
    <TheFooter />
  </div>
</template>

<script>
export default {
  name: "Home",
}
</script>
