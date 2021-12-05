<?php

//  A function which registers the user into the database.
include('database.php');
include('header.html');
$dbconn = new Database();
// Establish connection using server
$dbconn -> getConnection();

// POST the form inputs into variables to inserted
$username = filter_input(INPUT_POST, 'username');
$firstName = filter_input(INPUT_POST, 'firstName');
$lastName = filter_input(INPUT_POST, 'lastName');
$email = filter_input(INPUT_POST, 'email');
$userPassword = filter_input(INPUT_POST, "userPassword");

// Query to INSERT into database.
$sql = "INSERT INTO users (user_name, first_name, last_name, email_address, pass_word) VALUES ('$username', '$firstName', '$lastName', '$userPassword', '$email')";
if (mysqli_query($conn, $sql)) {
    echo "You have successfully registered as a member of UReview, " . $username . "! <br>" . " You can now give reviews and add locations.";
} else {
    echo "Registration Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

include('footer.html');