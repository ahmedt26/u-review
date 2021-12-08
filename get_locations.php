<?php
// Establish DB Connection
include('database.php');
include('connection.php');
include('validate_data.php');

$search_term = "";
if (isset($_GET['search']) && $_GET['search'] != '') {
    $search = legalizeInput($_GET['search']);
    $search_term = "%$search%";
} else {
    $search_term = "%";
}

$sql = "SELECT id, name, phone_number, longitude, latitude FROM locations WHERE name LIKE '$search_term'";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] . " " . $row["name"] . " " . $row["phone_number"] . " " . $row["longitude"] . " " . $row["latitude"] . "<br>";
    }
} else {
    echo "No results";
}

$connection->close();
