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
include('header.html');
?>

<?php
$dbconn = new Database();
// Establish connection using server
$db = $dbconn->getConnection();

if ($db['status'] == '0') {
    die("Connection failed while inserting data: " . $db['message']);
} else {
    $connection = $db['connection'];
}
// POST the form inputs into variables to inserted
$locationName  = filter_input(INPUT_POST, 'locationName');
$reviewTitle   = filter_input(INPUT_POST, 'reviewTitle');
$reviewer      = filter_input(INPUT_POST, 'reviewer');
$rating        = filter_input(INPUT_POST, 'rating');
$reviewDetails = filter_input(INPUT_POST, "reviewDetails");

// Query to INSERT into database.
$sql = "INSERT INTO reviews (location_name, review_title, reviewer, rating, review_details) VALUES ('$locationName', '$reviewTitle', '$reviewer', '$rating', '$reviewDetails')";
if (mysqli_query($connection, $sql)) {
    echo "You have successfully uploaded a review of " . $locationName . "! You have given a rating of: " . $rating . "<br>" . "Thank you for your review :)";
} else {
    echo "Review Error: " . $sql . "<br>" . mysqli_error($connection);
}
mysqli_close($conn);

include('footer.html');
