<?php
include('database.php');
include('connection.php');

$sql = "SELECT id, location_name, review_title, reviewer, rating, review_details FROM reviews";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] . " " . $row["location_name"] . " " . $row["review_title"] . " " . $row["reviewer"] . " " . $row["rating"] . " " . $row["review_details"] . "<br>";
    }
} else {
    echo "No results";
}

$connection->close();
