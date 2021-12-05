<?php

// Establish connection using another .php file
include('connection.php');
// Get all users
$sql = "SELECT user_name FROM users";
$result = $conn->query($sql);


echo "<pre>";
print_r($result->fetch_assoc());
exit();
?>

<table class="table">
    <thead>
        <tr>
            <th scope="col"> # </th>
            <th scope="col"> Username</th>
        </tr>
    </thead>

    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td> <?php echo $row["username"]; ?> </td>
                </tr>

        <?php }
        } else {
            echo "<td colspan='2'> NO Data Available </td>";
        }
        ?>
    </tbody>
</table>

<?php
$conn->close();
?>