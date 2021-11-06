<!-- The Registration Page -->
<template>
  <div class="registration">
    <TheHeader />
    <body class="d-flex flex-column min-vh-100">
      <!-- The Sign Up Page-->
      <div class="mt-auto">
        <div class="d-flex justify-content-center">
          <!-- A self-sizing card with a dark background -->
          <div class="pt-auto card px-3 text-center px-4 bg-dark">
            <h4 class="py-2 text-white">Create a UReview Account</h4>
            <!-- Link to log-in page if user has an account-->
            <div>
              <span class="text-white">Already have an account?</span>
              <a href="./login.html" class="text-decoration-none text-warning">Log In</a>
            </div>
            <!-- These inputs will be used to create new users in the database
          The various form controls are inputs which indicate they can be typed in-->
            <div class="mt-3 px-3 text-white"><input id="signup-username" class="form-control" placeholder="Username" /></div>
            <div class="input-group px-3 mt-3 text-white justify-content-center">
              <input id="signup-first-name" type="text" class="form-control" placeholder="First Name" aria-label="First Name" />
              <input id="signup-last-name" type="text" class="form-control" placeholder="Last Name" aria-label="Last Name" />
            </div>
            <div class="mt-3 px-3 text-white"><input id="signup-email" class="form-control" type="email" placeholder="E-mail" /></div>
            <div class="mt-3 px-3 text-white"><input id="signup-email-confirm" class="form-control" type="email" placeholder="Confirm E-Mail" /></div>
            <div class="mt-3 px-3 text-white"><input id="signup-pass" class="form-control" type="password" placeholder="Password" /></div>
            <div class="mt-3 px-3 text-white"><input id="signup-pass-confirm" class="form-control" type="password" placeholder="Confirm Password" /></div>
            <!-- After all the inputs are checked for valid inputs, the user will be able to sign up.-->
            <div class="mt-3 d-grid px-3 text-white">
              <button id="signup-button" class="btn btn-warning btn-block btn-signup text-uppercase">
                <span>Sign Up</span>
              </button>
            </div>
            <div class="px-3">
              <div class="mt-2 form-check d-flex flex-row">
                <input class="form-check-input" type="checkbox" value="" id="signup-bot-check" aria-label="Checkbox to check if you are human." /> <label class="form-check-label ms-2 py-2 text-white"> I'm not a Bot. </label>
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
  name: "Registration",
}
</script>
