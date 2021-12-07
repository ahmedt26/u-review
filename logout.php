<?php
session_start();
include('header.php');

$_SESSION["logged_in"] = false;
unset($_SESSION["username"]);
unset($_SESSION["firstName"]);
unset($_SESSION["password"]);

echo 'You have been successfully logged out';

include('footer.php');
?>