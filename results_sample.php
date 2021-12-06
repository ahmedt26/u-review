<!--
  UReview Results Page
  Abdullah Nafees and Tahseen Ahmed
  Monday, October 4th, 2021
-->
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

      $sql = "SELECT id, name, phone_number, longitude, latitude FROM locations";
      $result = $connection->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { ?>
          <a href="individual_sample.html" class="text-decoration-none">
            <div class="card bg-dark text-white rounded-0">
              <div class="row g-0">
                <div class="col-4">
                  <img src="./assets/images/burger.jpg" class="img-fluid" alt="Burger from Zeal Burgers">
                </div>

                <div class="col-8">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <h5 class="titleFont"> <?php echo $row["name"] ?> </h5>
                    </div>

                    <p class="textFont"> Phone Number: <?php echo $row["phone_number"] ?> </p>
                    <p class="textFont"> Longitude: <?php echo $row["longitude"] ?> </p>
                    <p class="textFont"> Latitude: <?php echo $row["latitude"] ?> </p>
                  </div>
                </div>

              </div>
            </div>
          </a>

      <?php }
      } else {
        echo "No results";
      }

      $connection->close();
      ?>

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