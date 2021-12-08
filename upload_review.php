<?php
// Get all $_SESSION variables
session_start();
?>

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
  <title>UReview - Review Upload Confirmation </title>
  <meta property="og:title" content="UReview - Review Upload Confirmation ">
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

<?php
//  A function which registers the user into the database.
include('database.php');
include('connection.php');
// Most headers will be replaced with the login header if the user is logged in.
// This should always result to header.php because only users can upload reviews.
if (isset($_SESSION['logged_in']) && ($_SESSION['logged_in'])) {
  include('login_header.php');
} else {
  include('header.php');
}
?>

<?php
// POST the form inputs into variables to inserted
$location_name  = filter_input(INPUT_POST, 'location_name');
$location_id    = (int) filter_input(INPUT_POST, 'location_id');
$reviewer_id    = $_SESSION['user_id'];
$review_title   = (filter_input(INPUT_POST, 'reviewTitle'));
$rating         = filter_input(INPUT_POST, 'rating');
$review_details = (filter_input(INPUT_POST, "reviewDetails"));

// Prepare Query to INSERT into database.
$sql = "INSERT INTO reviews (location_id, review_title, reviewer, rating, review_details) VALUES (?, ? ,? ,? ,?)";
$stmt = $connection->prepare($sql);
$stmt->bind_param('isiis', $location_id, $review_title, $reviewer_id, $rating, $review_details);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
if ($result != false) {
  // Notify the user of success
  echo '<br> <h3> Review Success ! </h3><br>';
  echo "You have successfully uploaded a review of " . $location_name . "! You have given a rating of: " . $rating . "<br>" . "Thank you for your review :)";
} else {
  // Notify the user of failure
  echo '<br> <h3> Review Failure ! </h3><br>';
  echo "Server-Side Review Error: " . $sql . "<br>" . mysqli_error($connection);
}
mysqli_close($conn);

include('footer.php');
