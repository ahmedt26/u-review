<!-- The Log-In Page -->
<template>
  <div class="login">
    <TheHeader />
    <body class="d-flex flex-column min-vh-100">
      <!-- The Log In Card -->
      <!-- The username and password will be sent to the server-side for user authentication
      m and p classes indicate padding, t means top, auto essentially will expand as much as possible
      py means padding vertically (px is horizontal) and the numbers are preset values of padding -->
      <div class="mt-auto">
        <div class="d-flex justify-content-center">
          <div class="pt-auto card px-3 text-center px-4 bg-dark">
            <h4 class="py-2 text-white">Log In to UReview</h4>
            <div>
              <span class="text-white">Don't have an account?</span>
              <a href="./registration.html" class="text-decoration-none text-warning">Sign Up</a>
            </div>
            <div id="login-username" class="mt-3 px-3 text-white">
              <input class="form-control" placeholder="Username" aria-label="Input Username" />
            </div>
            <div id="login-password" class="mt-3 px-3 text-white">
              <input class="form-control" type="password" placeholder="Password" aria-label="Input Password" />
            </div>
            <div class="mt-3 d-grid px-3 text-white">
              <button class="btn btn-warning btn-block btn-signup text-uppercase" aria-label="Log In Button">
                <span>Log In</span>
              </button>
            </div>
            <div class="px-3">
              <!--- A checkbox to confirm that the user is indeed human.-->
              <div class="mt-2 form-check d-flex flex-row">
                <input class="form-check-input" type="checkbox" value="" id="login-bot-check" aria-label="Checkbox to check if you are human." /> <label class="form-check-label ms-2 py-2 text-white"> I'm not a Bot. </label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </body>
    <TheFooter />
  </div>
</template>

<script>
export default {
  name: "Login",
}
</script>
