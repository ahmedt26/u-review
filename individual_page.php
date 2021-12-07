<!--
  UReview Sample Results of Zeal Hamburgers
  Abdullah Nafees and Tahseen Ahmed
  Monday, October 4th, 2021
-->
<!DOCTYPE html>
<html prefix="og: https://ogp.me/ns#" lang="en">

<head>
    <!-- Metadata of Website -->
    <title>UReview of Zeal Hamburgers</title>
    <meta property="og:title" content="UReview of Zeal Hamburgers">
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
    <?php include('header.html'); ?>

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
        $getLocation = "SELECT id, name, phone_number, longitude, latitude FROM locations WHERE id = $id";
        $location = $connection->query($getLocation);

        $row = $location->fetch_assoc();
    }
    ?>

    <div class="container p-5 pt-3 pb-0 justify-content-center">
        <div class="d-flex justify-content-between">

            <h1 class="titleFont fw-bold"> <?php echo $row['name'] ?> </h1>

            <div class="mainStars">
                <img src="./assets/images/Star1.svg" alt="5 Star">
                <img src="./assets/images/Star1.svg" alt="5 Star">
                <img src="./assets/images/Star1.svg" alt="5 Star">
                <img src="./assets/images/Star1.svg" alt="5 Star">
                <img src="./assets/images/Star1.svg" alt="5 Star">
            </div>

        </div>

        <h4 class="textFont"><span class="fw-bold">Phone Number:</span> <?php echo $row['name'] ?> </h4>
        <h4 class="textFont"><span class="fw-bold">Latitude:</span> <?php echo $row['latitude'] ?> </h4>
        <h4 class="textFont"><span class="fw-bold">Longitude:</span> <?php echo $row['longitude'] ?> </h4>
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
        $getReviews = "SELECT id, review_title, reviewer, rating, review_details FROM reviews WHERE location_id = $id";
        $reviewsList = $connection->query($getReviews);

        if ($reviewsList->num_rows > 0) {
            while ($row = $reviewsList->fetch_assoc()) { ?>
                <div class="card bg-dark text-white my-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">

                                    <h5 class="titleFont"> <?php echo $row["review"] ?> </h5>

                                    <div class="commentStars">
                                        <?php
                                        $i = 0;
                                        while ($i < $row["rating"]) { ?>
                                            <img src="./assets/images/Star1.svg" alt="Star">
                                        <?php $i++;
                                        } ?>
                                    </div>
                                </div>

                                <p class="card-text textFont"> <?php echo $row["review_details"] ?> </p>
                            </div>
                        </div>
                    </div>
                </div>
        <?php }
        } else {
            echo "No results";
        }
        ?>

    </div>

    <!-- Footer -->
    <!--
    Creating a footer using footer tag

    'bg-dark' makes the background of the footer dark
    'text-warning' makes the text a yellow color using bootstrap
    'mt-auto' makes the top margin of the footer such that the footer always sits at the bottom of the page

    'container' creates a container, and the content is put inside the container

    'text-center' centers the footer content, in this case the text
  -->
    <?php include('footer.html'); ?>

    <!--
    Script that allows hamburger navbar menu to work properly and the google map
  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZhT3Ey8CBRDwExjeA0AiN0UQSxzSzGA0&callback=initIndividualMap&libraries=&v=weekly" async>
    </script>
</body>

</html>