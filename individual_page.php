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

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];
    $sql = "SELECT id, name, phone_number, longitude, latitude FROM locations WHERE id = $id";
    $result = $connection->query($sql);

    $sql2 = "SELECT id, location_name, review_title, reviewer, rating, review_details FROM reviews WHERE location_id = $id";
    $result2 = $connection->query($sql2);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"] . " " . $row["name"] . " " . $row["phone_number"] . " " . $row["longitude"] . " " . $row["latitude"] . "<br>";
        }
    } else {
        echo "No results";
    }

    if ($result2->num_rows > 0) {
        while ($row = $result2->fetch_assoc()) {
            echo "id: " . $row["id"] . " " . $row["location_name"] . " " . $row["review_title"] . " " . $row["reviewer"] . " " . $row["rating"] . " " . $row["review_details"] . "<br>";
        }
    } else {
        echo "No results";
    }
}

$connection->close();
