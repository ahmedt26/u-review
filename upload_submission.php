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
include('validate_data.php');
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
$name         = filter_input(INPUT_POST, 'name');
$phone_number = filter_input(INPUT_POST, 'phone_number');
$latitude     = filter_input(INPUT_POST, 'latitude');
$longitude    = filter_input(INPUT_POST, 'longitude');

// Query to INSERT into database.
$sql = "INSERT INTO locations (name, phone_number, latitude, longitude) VALUES (?, ?, ?, ?)";
$stmt = $connection->prepare($sql);
$stmt->bind_param('ssdd', $name, $phone_number, $latitude, $longitude);
if ($stmt->execute()) {
  // Notify the user of success
  $stmt->execute();
  $result = $stmt->get_result();
  echo '<br> <h3> Location Upload Success ! </h3><br>';
  echo "You have successfully uploaded " . $name . " to our database! Thank you for your submission. :)";
} else {
  // Notify the user of failure
  echo '<br> <h3> Location Upload Failure ! </h3><br>';
  // echo "Server-Side Review Error: " . $sql . "<br>" . mysqli_error($connection);
}
$stmt->close();
mysqli_close($conn);

include('footer.php');
