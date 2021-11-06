<!-- The WriteReview Page -->
<template>
  <div class="writereview">
    <TheHeader />
    <body class="d-flex flex-column min-vh-100">
      <!-- Write Review Card -->
      <div class="mt-auto">
        <div class="d-flex justify-content-center">
          <div class="pt-auto card px-3 text-center px-4 bg-dark">
            <h4 class="py-2 text-white">Write a Review</h4>
            <div>
              <span class="text-white">Want to add a location instead?</span>
              <!-- Link for add-location page -->
              <a href="./submission.html" class="text-decoration-none text-warning">Add a Location</a>
            </div>
            <!-- Name of location is a text-->
            <div class="mt-3 px-3 text-white"><input class="form-control" type="text" placeholder="Name" aria-label="Input name" /></div>
            <!-- The Rating out of five-->
            <div class="mt-3 px-3 text-white"><input class="form-control" type="number" min="1" max="5" placeholder="Star Rating (out of five)" aria-label="Select a star rating" /></div>
            <!-- The title for the review-->
            <div class="mt-3 px-3 text-white"><input class="form-control" type="text" placeholder="Review Title" aria-label="Title of Review" /></div>
            <!-- The review details -->
            <div class="mt-3 px-3 text-white"><input class="form-control" type="text" placeholder="Review Details" aria-label="Details of Review" /></div>
            <div class="mt-3 d-grid px-3 text-white">
              <button class="btn btn-warning btn-block btn-signup text-uppercase" aria-label="Button to Upload Review">
                <span>Write Review</span>
              </button>
            </div>
            <div class="px-3">
              <!-- When all inputs are added, the user can upload their review. -->
              <div class="mt-2 form-check d-flex flex-row">
                <input class="form-check-input" type="checkbox" value="" id="review-not-bot-check" aria-label="Checkbox to check if you are human." />
                <label class="form-check-label ms-2 py-2 text-white"> I'm not a Bot. </label>
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
  name: "WriteReview",
}
</script>
