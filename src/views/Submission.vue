<!-- The Log-In Page -->
<template>
  <div class="submission">
    <TheHeader />
    <!-- Add Location Card -->
    <div class="mt-auto">
      <!-- auto-adjust margins -->
      <div class="d-flex justify-content-center">
        <div class="pt-auto card px-3 text-center px-4 bg-dark">
          <h4 class="py-2 text-white">Add a Location</h4>
          <!-- Link for write review page if user wants to write a review for an existing location-->
          <div>
            <span class="text-white">Want to write a review instead?</span>
            <a href="./writereview.html" class="text-decoration-none text-warning">Write a Review</a>
          </div>
          <!-- Series of input forms, these inputs will be checked for correct type of input.-->
          <div class="mt-3 px-3 text-white"><input class="form-control" type="text" placeholder="Name" aria-label="Name of Location" /></div>
          <div class="mt-3 px-3 text-white"><input class="form-control" type="tel" placeholder="Phone Number" aria-label="Phone Number" /></div>
          <div class="mt-3 px-3 text-white"><input class="form-control" type="text" placeholder="Latitude" aria-label="Latitude" /></div>
          <div class="mt-3 px-3 text-white"><input class="form-control" type="text" placeholder="Longitude" aria-label="Longitude" /></div>
          <hr />
          <!-- User will be able upload a reasonably sized image (~2MB) from their device.
            the input type=file means this button will open up the explorer so the user can find the image to upload from their device-->
          <div class="mt-3 px-3 text-white justify-content-center">
            <input class="btn-dark text-white" type="file" id="addLocationFile" name="locationImage" aria-label="Choose file to upload" />
            <button class="btn btn-block btn-signup text-uppercase btn-outline-warning" aria-label="Button for Uploading Image"><span>Upload Image</span></button>
          </div>

          <hr />
          <!-- Purposeful spacing between the two buttons-->
          <!-- When all inputs completed, the user can add the location-->
          <div class="mt-3 d-grid px-3 text-white">
            <button class="btn btn-warning btn-block btn-signup text-uppercase" aria-label="Button for Add Location">
              <span>Add Location</span>
            </button>
          </div>
          <div class="px-3">
            <div class="mt-2 form-check d-flex flex-row">
              <input class="form-check-input" type="checkbox" value="" id="submissionCheckBox" aria-label="Checkbox to check if you are human." /> <label class="form-check-label ms-2 py-2 text-white"> I'm not a Bot. </label>
            </div>
          </div>
        </div>
      </div>
    </div>
    <TheFooter />
  </div>
</template>

<script>
export default {
  name: "Submission",
}
</script>
