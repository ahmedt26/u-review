<?php 

// Create a new Database object
$dbconn = new Database();
// Establish connection using server
$db = $dbconn->getConnection();

// Check if the database is successfully established
if ($db['status'] == '0') {
    die("Error - Connection Failure: " . $db['message']);
} else {
    $connection = $db['connection'];
}
?>