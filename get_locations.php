<?php
include('database.php');

$dbconn = new Database();
// Establish connection using server
$db = $dbconn->getConnection();

if ($db['status'] == '0') {
    die("Connection failed while getting data: " . $db['message']);
} else {
    $connection = $db['connection'];
}

$search = filter_input(INPUT_GET, 'search');
if (true) {
    //$id = $_GET['search'];
    $search_term = "%$search%";
    $sql = "SELECT id, name, phone_number, longitude, latitude FROM locations WHERE name LIKE $search_term";
    $result = $connection->query($sql);
    echo $result;
} else {
    $sql = "SELECT id, name, phone_number, longitude, latitude FROM locations";
    $result = $connection->query($sql);
    echo $result;
}

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] . " " . $row["name"] . " " . $row["phone_number"] . " " . $row["longitude"] . " " . $row["latitude"] . "<br>";
    }
} else {
    echo "No results";
}

$connection->close();
