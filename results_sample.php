<!--
  UReview Results Page
  Abdullah Nafees and Tahseen Ahmed
  Monday, October 4th, 2021
-->

<?php
session_start();
?>

<!DOCTYPE html>
<html prefix="og: https://ogp.me/ns#" lang="en">

<head>
  <title>UReview - Results</title>
  <!-- Metadata of Website -->
  <meta property="og:title" content="UReview - Results">
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
  <script src="index.js" defer></script>
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

  <!-- Main -->
  <!--
    'row' uses grid layout, which creates a single row
    'row-cols-2' makes it so that there are 2 columns in the row
    'g-0' removes the gutters

    'col-md-4' makes it so that when the md breakpoint (768px) is hit, the left column takes up 4 column slots out of 12
    'col-12' makes it so that whenever the screen is smaller than 768px, the left column takes up 12 column slots, negating the other column, making it essentially only 1 column
    'height:89.65vh' makes the height of the left container 89.65vh, this is done so 'overflow: auto;' works properly (vh-92.5 was not working properly, so I had to do inline)
    'overflow: auto;' makes it so that when the images go off screen, a scrollbar is added

    '<a>' tag is used here to make the card a link, so it takes the user to an individual site
    'text-decoration-none' is used to make it so the content inside the card is not underlined due to the <a> tag

    'card' is a bootstrap class which creates a card
    'bg-dark' makes the background of the card, black
    'text-white' makes the text inside the card, white
    'rounded-0' makes it so that the edges of the card are not rounded

    'row' uses grid layout, which creates a single row, for the card
    'g-0' removes the gutters, for the card

    'col-4' makes it so that the image takes up 4 column slots out of 12
    'img-fluid' is used to make the image keep the original ratio when the width changes, the height adjusts itself

    'col-8' makes it so that the card content besides the image, takes up 8 out of 12 slots

    'card-body' is a bootstrap class where the main content of the card is contained

    'd-flex' makes it a flexbox layout
    'justify-content-between' makes it so there is an equal amount of space between each element

    'titleFont' is custom css that changes the font-size based on the width of the screen

    'resultStars' is custom css that changes the size of the stars based on the width of the screen

    'textFont' is custom css that changes the size of the font based on the width of the screen

    The above card process is repeated a number of times

    'map' id is used to place the map there
    'col-md-8' makes the map take up 8 column slots out of 12, when md breakpoint is hit
    'd-md-flex' makes it a flexbox layout when md breakpoint is hit
    'd-none' makes it so that the image does not appear when the width is less than the md breakpoint, 768px
    'height:89.65vh' makes the height of the right container 89.65vh
  -->
  <div class="row row-cols-2 g-0">
    <div class="col-md-4 col-12" style="height:89.65vh; overflow: auto;">
      <div id="locationInfo">
        <?php
        include('database.php');

        $dbconn = new Database();
        // Establish connection using server
        $db = $dbconn->getConnection();

        // If status is 0, conenction was not established
        // If status is not 0, then connection was established and $connection is set
        if ($db['status'] == '0') {
          die("Connection failed while getting data: " . $db['message']);
        } else {
          $connection = $db['connection'];
        }

        // SQL query which gets all the locations in the locations table, based on the search query.
        // Result of the SQL query is stored in $result
        $search_term = "";
        if (isset($_GET['search']) && $_GET['search'] != '') {
          $search = $_GET['search'];
          $search_term = "%$search%";
        } else {
          $search_term = "%";
        }

        $sql = "SELECT id, name, phone_number, longitude, latitude FROM locations WHERE name LIKE '$search_term'";
        $result = $connection->query($sql);

        // If the number of rows in $result, run the following script, since there are locations
        if ($result->num_rows > 0) {
          // While there is a next row in associative array, display the info using the HTML/PHP
          while ($row = $result->fetch_assoc()) { ?>
            <!-- Anchor updated to redirect to the specific individual page for that location-->
            <a href="individual_page.php?id=<?php echo $row['id'] ?>" class="text-decoration-none">
              <div class="card bg-dark text-white rounded-0">
                <div class="row g-0">
                  <div class="col-4">
                    <img src="./assets/images/burger.jpg" class="img-fluid" alt="Burger from Zeal Burgers">
                  </div>

                  <div class="col-8">
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <!-- 
                          Display the locations name 
                        
                          The reason there are 3 useless hidden h5's is due to the way the markers were set.
                          It was done in a somewhat odd way.
                        -->
                        <h5 class="titleFont"><?php echo $row["name"] ?></h5>
                        <h5 class="titleFont" hidden></h5>
                        <h5 class="titleFont" hidden></h5>
                        <h5 class="titleFont" hidden></h5>
                      </div>

                      <!-- 
                          Display phone_number of the current row
                          Display id of the current row
                          Display longitude of the current row
                          Display latitude of the current row
                      -->
                      <p class="textFont">Phone-Number: <?php echo $row["phone_number"] ?></p>
                      <p class="textFont" hidden>Id: <?php echo $row["id"] ?></p>
                      <p class="textFont">Longitude: <?php echo $row["longitude"] ?></p>
                      <p class="textFont">Latitude: <?php echo $row["latitude"] ?></p>
                    </div>
                  </div>

                </div>
              </div>
            </a>

        <?php }
          // If there are no locations in the result after the SQL query, then it just displays "No Results"
        } else {
          echo "No results";
        }

        // Close the database connection
        $connection->close();
        ?>
      </div>
    </div>

    <div id="map" class="col-md-8 d-md-flex d-none" style="height: auto;"></div>
    <!--<img id= map class="col-md-8 d-md-flex d-none" style="height: 92.5vh;" src="./assets/images/map.png" alt="Map of Hamilton">-->

  </div>

  <?php include('footer.html'); ?>

  <!--
    Script that allows hamburger navbar menu to work properly
  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZhT3Ey8CBRDwExjeA0AiN0UQSxzSzGA0&callback=initMap&libraries=&v=weekly" async>
  </script>

</body>

</html>