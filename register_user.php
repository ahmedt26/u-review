<?php

//  A function which registers the user into the database.
include('database.php');
$conn = mysqli_connect($servername, $username, $password, $db);
$sql = "SELECT user_name FROM users";
$result = $conn->query($sql);

// POST the form inputs into variables to inserted
$username = filter_input(INPUT_POST, 'username');
$firstName = filter_input(INPUT_POST, 'firstName');
$lastName = filter_input(INPUT_POST, 'lastName');
$userPassword = filter_input(INPUT_POST, "userPassword");
$email = filter_input(INPUT_POST, 'email');

// Query to insert into database.
$sql = "INSERT INTO users (user_name, first_name, last_name, pass_word, email_address) VALUES ('username', 'firstName', 'lastName', 'userPassword', 'email')";
if (mysqli_query($conn, $sql)) {
    echo "You have successfully registered as a member of UReview, " . $username . "! <br>" . " You can now give reviews and add locations.";
} else {
    echo "Registration Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
