<!--
  UReview Sample Results of Zeal Hamburgers
  Abdullah Nafees and Tahseen Ahmed
  Monday, October 4th, 2021
-->
<?php
// Get all $_SESSION variables
session_start();
?>

<!DOCTYPE html>
<html prefix="og: https://ogp.me/ns#" lang="en">

<head>
    <!-- Metadata of Website -->
    <title>UReview</title>
    <meta property="og:title" content="UReview">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="UReview - Things Reviewed by U!">
    <meta name="author" content="Tahseen Ahmed and Abdullah Nafees">

    <!-- Links to External CSS, Logo, Icons, Fonts etc -->
    <link rel="icon" href="./assets/images/logo.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="index.js"></script>
</head>

<!--
  'd-flex' makes it a flexbox layout
  'flex-column' makes it a column
  'min-vh-100' makes the minimum height of the body 100vh

  the main purpose of this is to properly allow the footer to sit at the bottom of the page
-->

<body class="d-flex flex-column min-vh-100">
    <?php

    // Most headers will be replaced with the login header if the user is logged in.
    if (isset($_SESSION['logged_in']) && ($_SESSION['logged_in'])) {
        include('login_header.php');
    } else {
        include('header.php');
    }  ?>

    <!-- Main Images -->
    <!--
    'd-flex' makes it a flexbox layout
    'justify-content-center' makes the image centered horizontally
    'overflow: auto;' makes it so that when the images go off screen, a scrollbar is added

    then hardcoded images are linked
    'img-fluid' makes it so that the height is adjusted relative to the width, and the ratio is kept the same as original
    'width: 300px;' makes the width of the images 300px
  -->
    <div class="d-flex justify-content-center imageWidth" style="overflow: auto;">
        <img src="./assets/images/burger.jpg" class="img-fluid" alt="Burger from Zeal Burgers">
        <img src="./assets/images/burger.jpg" class="img-fluid" alt="Burger from Zeal Burgers">
        <img src="./assets/images/burger.jpg" class="img-fluid" alt="Burger from Zeal Burgers">
        <img src="./assets/images/burger.jpg" class="img-fluid" alt="Burger from Zeal Burgers">
        <img src="./assets/images/burger.jpg" class="img-fluid" alt="Burger from Zeal Burgers">
        <img src="./assets/images/burger.jpg" class="img-fluid" alt="Burger from Zeal Burgers">
        <img src="./assets/images/burger.jpg" class="img-fluid" alt="Burger from Zeal Burgers">
        <img src="./assets/images/burger.jpg" class="img-fluid" alt="Burger from Zeal Burgers">
    </div>

    <!-- Main Map -->
    <!--
    container' creates a container, and the content is put inside the container

    'individualMap' id is used to place the map there

    'd-flex' makes it a flexbox layout
    'justify-content-center' makes the image centered horizontally
    'mapHeight' is custom css that changes the hieght of the map relative to the width of the screen

    then hardcoded map image is linked, for this part we just used a map of Hamilton, same as we did in the results page.
    it will be changed to be accurate in the next part of the project
  -->
    <div class="container">
        <div id="individualMap" class="d-flex justify-content-center mapHeight"></div>
    </div>

    <!-- Main Content -->
    <!--
    'container' creates a container, and the content is put inside the container
    'p-5' creates padding around the whole container
    'pb-0' makes the padding at the bottom of the container 0, so now all sides have padding except the bottom

    'd-flex' makes it a flexbox layout
    'justify-content-between' makes it so there is an equal amount of space between each element

    'titleFont' is custom css that changes the font-size based on the width of the screen
    'fw-bold' makes the content bold

    'mainStars' is custom css that changes the size of the stars based on the width of the screen

    'textFont' is custom css that changes the size of the font based on the width of the screen
    'fw-bold' in the span makes it so just the content wrapped inside of it becomes bold
  -->
    <?php
    include('database.php');
    include('connection.php');

    // Check if id is set, and that it is not empty
    if (isset($_GET['id']) && $_GET['id'] != '') {
        // Store the value of $_GET['id'] in $id
        $id = $_GET['id'];

        // SQL query which gets a location based on id
        // Result stored in $location
        $getLocation = "SELECT id, name, phone_number, longitude, latitude FROM locations WHERE id = ?";
        $stmt = $connection->prepare($getLocation);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $location = $stmt->get_result();
        $stmt->close();

        // Store the first row from the result into $rowInfo
        $rowInfo = $location->fetch_assoc();


        // SQL query which gets all the reviews for a specific location based on id
        // Result stored in $reviewsList
        $getReviews = "SELECT id, review_title, reviewer, rating, review_details FROM reviews WHERE location_id = ?";
        $stmt = $connection->prepare($getReviews);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $reviewsList = $stmt->get_result();

        // This code is basically just calculating the average ratings for the location
        // We used int instead of float, so therefore there are no half stars.
        $sumRatings = 0;
        $numRatings = 0;
        $avgRatings = 0;
        if ($reviewsList->num_rows > 0) {
            while ($row = $reviewsList->fetch_assoc()) {
                $sumRatings += $row["rating"];
                $numRatings += 1;
            }
        }

        $stmt->close();

        $avgRatings = $sumRatings / $numRatings;
        $avgRatings = (int) $avgRatings;
    ?>

        <div class="container p-5 pt-3 pb-0 justify-content-center">
            <div class="d-flex justify-content-between">

                <!-- Display the name of the location -->
                <h1 class="titleFont fw-bold"> <?php echo $rowInfo['name']; ?> </h1>

                <div class="mainStars">
                    <?php
                    // Loop which displays the amount of stars the location has
                    $i = 0;
                    while ($i < $avgRatings) { ?>
                        <img src="./assets/images/Star1.svg" alt="Star">
                    <?php $i++;
                    } ?>
                    <?php
                    $i = 0;
                    while ($i < 5 - $avgRatings) { ?>
                        <img src="./assets/images/Star2.svg" alt="No Star">
                    <?php $i++;
                    } ?>
                </div>

            </div>

            <div id="individualLocationInfo">
                <!-- 
                    Display the phone_number
                    Display the latitude
                    Display the longitude
                -->
                <h4 class="textFont"><span class="fw-bold">Phone Number:</span> <?php echo $rowInfo['phone_number']; ?></h4>
                <h4 class="textFont"><span class="fw-bold">Latitude:</span> <?php echo $rowInfo['latitude']; ?></h4>
                <h4 class="textFont"><span class="fw-bold">Longitude:</span> <?php echo $rowInfo['longitude']; ?></h4>
            </div>

        </div>

        <!-- Main Comments-->
        <!--
    'container' creates a container, and the content is put inside the container
    'px-5' creates padding on the left and right sides of the container

    'card' is a bootstrap class which creates a card
    'bg-dark' makes the background of the card, black
    'text-white' makes the text inside the card, white
    'my-3' creates a margin on the top and bottom of the container

    'row' uses grid layout, which creates a single row

    'col-12' makes it so the content of the card takes up the whole card

    'card-body' is a bootstrap class where the main content of the card is contained

    'd-flex' makes it a flexbox layout
    'justify-content-between' makes it so there is an equal amount of space between each element

    'card-title' is a bootstrap class that is used for card titles
    'titleFont' changes the font-size based on the width of the screen

    'commentStars' is custom css changes the size of the stars in comments based on the width of the screen

    'card-text' is a bootstrap class used for the main text in cards
    'textFont' is custom css that changes the size of the font based on the width of the screen
  -->
        <div class="container px-5">
            <?php
            // SQL query which gets all the reviews for a specific location based on id
            // Result stored in $reviewsList
            $getReviews = "SELECT id, review_title, reviewer, rating, review_details FROM reviews WHERE location_id = ?";
            $stmt = $connection->prepare($getReviews);
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $reviewsList = $stmt->get_result();

            // Check if the number of reviews is greater than 0
            if ($reviewsList->num_rows > 0) {
                // While there is a next row in associative array, display the info using the HTML/PHP
                while ($row = $reviewsList->fetch_assoc()) { ?>
                    <div class="card bg-dark text-white my-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">

                                        <!-- Display the title of the review -->
                                        <h5 class="titleFont"> <?php echo $row["review_title"]; ?> </h5>

                                        <!-- Display the rating of the review -->
                                        <div class="commentStars">
                                            <?php
                                            $i = 0;
                                            while ($i < $row["rating"]) { ?>
                                                <img src="./assets/images/Star1.svg" alt="Star">
                                            <?php $i++;
                                            } ?>
                                            <?php
                                            $i = 0;
                                            while ($i < 5 - $row["rating"]) { ?>
                                                <img src="./assets/images/Star2.svg" alt="No Star">
                                            <?php $i++;
                                            } ?>
                                        </div>
                                    </div>

                                    <!-- Display the details of the review -->
                                    <p class="card-text textFont"> <?php echo $row["review_details"]; ?> </p>

                                    <p class="card-text textFont">
                                        <?php
                                        $id = $row['reviewer'];
                                        // SQL query to get the name of the reviewer using the id
                                        $getReviewer = "SELECT first_name, last_name FROM users WHERE id = ?";
                                        $stmt2 = $connection->prepare($getReviewer);
                                        $stmt2->bind_param('i', $id);
                                        $stmt2->execute();
                                        $reviewData = $stmt2->get_result();

                                        $reviewerName = $reviewerData->fetch_assoc();

                                        // Display the name of the reviewer
                                        echo '-' . $reviewerName["first_name"] . " " . $reviewerName["last_name"];

                                        $stmt2->close();

                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
        <?php }
                $stmt->close();
            }
            // If there are no locations in the result after the SQL query, then it just displays "No Results"
        } else {
            echo "No results";
        }

        if (isset($_SESSION['logged_in']) && ($_SESSION['logged_in'])) {
            include('review_btn.php');
        } else {
            echo '<br> You must be logged in to write a review!';
        }
        // Close the database connection
        $connection->close();
        ?>

        </div>

        <?php include('footer.php'); ?>
        <!--
    Script that allows hamburger navbar menu to work properly and the google map
  -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZhT3Ey8CBRDwExjeA0AiN0UQSxzSzGA0&callback=initIndividualMap&libraries=&v=weekly" async>
        </script>
</body>

</html>