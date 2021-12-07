<?php
// Get session data
session_start();
include('header.php');

// Unset all session data
session_unset();
// Ensure destruction of session.
session_destroy();

echo 'You have been successfully logged out';

include('footer.php');
