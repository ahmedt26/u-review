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
    <title>UReview - Sign Up Confirmation </title>
    <meta property="og:title" content="UReview - Sign Up Confirmation">
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
include('validate_data.php');
include('connection.php');
?>

<?php
// POST the form inputs into variables to inserted
// Filters input for POSTing
$username = filter_input(INPUT_POST, 'username');
$firstName = filter_input(INPUT_POST, 'firstName');
$lastName = filter_input(INPUT_POST, 'lastName');
$email = filter_input(INPUT_POST, 'email');
$userPassword = filter_input(INPUT_POST, "userPassword");
$userPasswordConfirm = filter_input(INPUT_POST, "passwordConfirm");
// Check if each input is valid

// Checks if each form input is valid, and notifies th user
if (isLegal($username)) {
    if (isLegal($firstName)) {
        if (isLegal($lastName)) {
            if (isLegal($email)) {
                if (isLegal($userPassword)) {

                    // Query to INSERT into database.
                    $sql = "INSERT INTO users (user_name, first_name, last_name, email_address, pass_word) VALUES ('$username', '$firstName', '$lastName', '$email', '$userPassword')";
                    if (mysqli_query($connection, $sql)) {
                        echo "<br>" . "You have successfully registered as a member of UReview, " . $username . "! <br>" . " You can now give reviews and add locations.";
                    } else {
                        echo "<br> Server-side Registration Error: " . $sql . "<br>" . mysqli_error($connection);
                    }
                    mysqli_close($conn);
                } else {
                    echo "<br> Passwords are not valid! ";

                    if ($userPassword != $userPasswordConfirm) {
                        echo "<br> Passwords also do not match!";
                    }
                }
            } else {
                echo "<br> Email input is not valid!";
            }
        } else {
            echo "<br> Last Name input is not valid!";
        }
    } else {
        echo "<br> First Name input is not valid!";
    }
} else {
    echo "<br> Username input is not valid!";
}


include('footer.html');
