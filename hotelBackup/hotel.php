<?php
    // establishing connection
    include "hotelConnection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> HOTELS | Central Texas Tourism Reccomendations! </title>
    <link rel="stylesheet" href="hotelStyle.css">
    <script type="module" src="hotelFunctions.js"></script>
</head>
<body>
    <!-- Array of checkbox names -->
    <?php
        $boxes = array('rating', 'cityAustin', 'cityRoundrock', 'cityGeorgetown');

        $prefer = array();
        $sect = array();

        // Adds checked boxes to seperate list ($prefer)
        foreach($boxes as $box) {
            if(isset($_POST[$box])) {
                array_push($prefer, $_POST[$box]);
                array_push($sect, $box);
            }
        }

        // Clear Preferences
        if(isset($_POST['clear']) && ($_POST['clear'] == "clear")) {
            $prefer = array();
            $sect = array();
        } 
    ?>

    <!-- Meny Buttons (Link to Other Pages) -->
    <div class="menuButtons">
        <button type="button" onmouseover="var logo = document.getElementById('homeLogo');
                                        logo.src = 'darkWebLogo.png';" 
                              onmouseout="var logo = document.getElementById('homeLogo');
                                        logo.src='weblogo.png';"> 
        <a href="http://localhost:81/homeFiles/home.php"> <img id="homeLogo" src="webLogo.png" alt="Logo"> </a> </button>
        <button type="button"> <a href="http://localhost:81/browseFiles/browse.php"> ATTRACTIONS </a> </button>
        <button type="button" id="pageButton"> <a href="http://localhost:81/hotelFiles/hotel.php"> HOTELS </a> </button>
		<button type="button"> <a href="http://localhost:81/contactFiles/contactForm.php"> CONTACT </a> </button>
        <button type="button"> <a href="http://127.0.0.1:5500/faqFiles/faq.html"> FAQ </a> </button>
        <form id="topSearch" action="/searchFiles/search.php" method="POST">
            <input title="Type Activity, Location, Price, Zipcode, Date, etc." id="search" type="text" name="searchBar" placeholder="Search...">
            <button id="submitSearch" type="submit" name="submitSearch"> &#128269 </button>
        </form>
    </div>

    <!-- Back to top button -->
    <a title="Back to Top" href="#pageButton" class="top" id="top"> &uarr; </a>

    <!-- Heading -->
    <h2 id="heading"> Hotels </h2>
    <p id="blurb"> Browse through our carefully curated list of hotels that is sure to meet all your needs and your budget! Use the buttons to the left to filter results!</p>
    <hr>

    <!-- Checkboxes/Filter Options -->
    <form action = "hotel.php" method="post">
        <div class="filters">
            <!-- Rating Dropdown -->
            <h3> Rating <button type="button" id="rateView" onClick="var answer = document.getElementById('rateOptions');
                                var viewButton = document.getElementById('rateView');
                                let compStyles = window.getComputedStyle(answer);
                                if (compStyles.display == 'none') {
                                    answer.style.display = 'block';
                                    viewButton.innerHTML = '-';
                                } else if (compStyles.display == 'block') {
                                    answer.style.display = 'none';
                                    viewButton.innerHTML = '+';
                                }"> + </button></h3>
            <div id="rateOptions">
                <select name="rating" id="rating">
                    <option value="default"> </option>
                    <option value="hl" 
                        <?php 
                            if (isset($prefer)) {
                                if(in_array('hl', $prefer)) {
                                    echo 'selected';
                                }
                            }
                        ?>
                    >Highest to Lowest</option>
                    <option value="lh"
                        <?php 
                            if (isset($prefer)) {
                                if(in_array('lh', $prefer)) {
                                    echo 'selected';
                                }
                            }
                        ?>
                    >Lowest to Highest</option>
                </select>

            </div>

            <!-- Location Checkboxes -->
            <h3> Location <button type="button" id="locView" onClick="var answer = document.getElementById('locOptions');
                                var viewButton = document.getElementById('locView');
                                let compStyles = window.getComputedStyle(answer);
                                if (compStyles.display == 'none') {
                                    answer.style.display = 'block';
                                    viewButton.innerHTML = '-';
                                } else if (compStyles.display == 'block') {
                                    answer.style.display = 'none';
                                    viewButton.innerHTML = '+';
                                }"> + </button></h3>
            <div id="locOptions">
                <input type="checkbox" name="cityAustin" value="Austin" class="locationCheckboxes"
                    <?php 
                        if (isset($prefer)) {
                            if(in_array('Austin', $prefer)) {
                                echo 'checked';
                            }
                        }
                    ?>
                >
                <label for="austin"> Austin </label>
                <br>

                <input type="checkbox" name="cityRoundrock" value="Round Rock" class="locationCheckboxes"
                    <?php 
                        if (isset($prefer)) {
                            if(in_array('Round Rock', $prefer)) {
                                echo 'checked';
                            }
                        }
                    ?>
                >
                <label for="roundrock"> Round Rock </label>
                <br>

                <input type="checkbox" name="cityGeorgetown" value="Georgetown" class="locationCheckboxes"
                    <?php 
                        if (isset($prefer)) {
                            if(in_array('Georgetown', $prefer)) {
                                echo 'checked';
                            }
                        }
                    ?>
                >
                <label for="georgetown"> Georgetown </label>
            </div>

            <!-- Preference Buttons -->
            <br>
            <br>
            <br>
            <button type="submit" name="update" class="preferButtons"> Update Preferences </button>
            <br>
            <br>
            <button type="submit" name="clear" class="preferButtons" value="clear"> Clear Preferences/Search </button>
            <br>
            <br>
        </div>
    </form>

    <form class="pageSearch" action="hotel.php" method="POST">
        <input title="Type Name, Location, or Rating" id="searchBar" type="text" name="searchBar" placeholder="Search...">
        <button type="submit" id="submitSearchPage" name="submitSearchPage"> &#128269 </button>
    </form>

    <?php
        foreach($sect as $preference) {
            if (str_contains($preference, "city") == true) {
                echo "<script type='text/JavaScript'> 
                    var answer = document.getElementById('locOptions');
                    answer.style.display = 'block';
                    var viewButton = document.getElementById('locView');
                    viewButton.innerHTML = '-';
                </script>";
            } else if (str_contains($preference, "rating") == true) {
                if ($_POST[$preference] != "default") {
                    echo "<script type='text/JavaScript'> 
                        var answer = document.getElementById('rateOptions');
                        answer.style.display = 'block';
                        var viewButton = document.getElementById('rateView');
                    viewButton.innerHTML = '-';
                    </script>";
                }
            }
        }
    ?>

    <!-- Print Initial Results Table -->
    <div id="ogResults">
        <!-- Query for ALL Results -->
        <?php 
            $allQuery = 'SELECT * FROM hotels';
            $results = $conn->query($allQuery);
            while ($rows=($results->fetch_assoc())) {
        ?>
                <div class="topics">
                    <img title=<?php echo '"' . $rows['cite'] . '"' ?> class="topicImgs" src= <?php echo $rows["img"] ?>>
                    <a href=<?php echo ('"' . $rows['link'] . '"'); ?> target="_blank"> <h4 class="topicTitles" > <?php echo $rows["name"] ?> </h4> </a>
                    <p class="descrips"> <?php echo $rows["location"] . " | " . $rows["rating"] . " Stars | " ?> <a href=<?php echo '"' . $rows["citeLink"] . '"'?> target="_blank"> Citation </a> </p>
                 </div>     
        <?php
            }
        ?>
    </div>

    <?php
        // Checks if preferences have been made (clears original table)
        if(count($prefer) != 0) {
            echo '<script type="text/JavaScript"> 
                document.getElementById(\'ogResults\').remove();
                </script>'
            ;
            echo '<script type="text/JavaScript"> 
                document.getElementById(\'searchTable\').remove();
                </script>'
            ;
        }

        // Query statement
        $jointQuery = 'SELECT DISTINCT * FROM hotels ';

        // Adds to query for each preference
        $locations = 0;
        $order = "";
        foreach ($prefer as $preference) {
            if ($preference == "Austin" || $preference == "Georgetown" || $preference == "Round Rock") {
                $locations += 1;
            }
        }
        foreach ($prefer as $preference) {
            if ($locations > 0 && (str_contains($jointQuery, "WHERE")) == false) {
                $jointQuery = $jointQuery . ' WHERE ';
            }
            if ($preference != $prefer[count($prefer) -1]  && $locations > 1) {
                if ($preference == "Austin" || $preference == "Georgetown" || $preference == "Round Rock") {
                    $jointQuery = $jointQuery . ' location = "' . $preference . '" OR ';
                } else if ($preference == "lh") {
                    $order = ' ORDER BY rating ASC';
                } else if ($preference == "hl") {
                    $order = ' ORDER BY rating DESC';
                }
            } else if ($preference == "lh") {
                $order = ' ORDER BY rating ASC';
            } else if ($preference == "hl") {
                $order = ' ORDER BY rating DESC';
            } else {
                if ($locations > 0 && $preference!="default") {
                    $jointQuery = $jointQuery . ' location = "' . $preference . '" ';
                }
            }
        }
        $jointQuery = $jointQuery . $order;
    ?> 

    <!-- Filtered Attractions Table -->
    <div id="resultsTable">
        <?php 
            // Checks if preferences have been set
            if (!empty($prefer)) {
        ?>
        <?php 
            }

            // Filter based query
            $resultsJQ = $conn->query($jointQuery);
            if (!empty($prefer)) {
                // iterates through results list
                while ($rowsJQ=($resultsJQ->fetch_assoc())) {
        ?>
                    <div class="topics2">
                        <img title=<?php echo '"' . $rowsJQ['cite'] . '"' ?> class="topicImgs2" src= <?php echo $rowsJQ["img"] ?>>
                        <a href=<?php echo ('"' . $rowsJQ['link'] . '"'); ?> target="_blank"> <h4 class="topicTitles2" > <?php echo $rowsJQ["name"] ?> </h4> </a>
                        <p class="descrips2"> <?php echo $rowsJQ["location"] . " | " . $rowsJQ["rating"] . " Stars | " ?> <a href=<?php echo '"' . $rowsJQ["citeLink"] . '"'?> target="_blank"> Citation </a> </p>
                    </div>
            <?php
                }
            }
        ?>
    </div>

    <!-- Page Search -->
    <?php
        function cleanData($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        if (isset($_POST["submitSearchPage"]) && ($_POST["searchBar"] != "")) {
            // make sure search is not an sql injection, protects tables/database
            $search = $_POST["searchBar"];
            $search = cleanData($search);
            $search = $conn -> real_escape_string($search);

            //  Query for ALL Results
            $searchQuery = 'SELECT DISTINCT * FROM hotels WHERE name like "%' . $search . '%" OR location LIKE "%' . $search . '%" OR rating LIKE "%' .$search . '%"';
            $searchResults = $conn->query($searchQuery);
            $numResults = mysqli_num_rows($searchResults);

            // Remove Previous Results
            echo '<script type="text/JavaScript"> 
                document.getElementById(\'ogResults\').remove();
                </script>'
            ;
            echo '<script type="text/JavaScript"> 
                document.getElementById(\'resultsTable\').remove();
                </script>'
            ;
            if ($numResults > 1) {
    ?> 
                <h4 id="numResults"> There are <?php echo $numResults ?> results: </h4>
    <?php
            } else if ($numResults == 0) {
    ?>
                <h4 id="numResults"> There are <?php echo $numResults ?> results: </h4>
                <div id="noResults">
                    <p id="helpBlurb"> There were no relavent searches. Try again using unique keywords or check out our sitemap for quick links to all of our content! </p>
                    <ul id="searchTips"> 
                        <li> Check your spelling </li>
                        <li> Try generic keywords </li>
                        <li> Try fewer key words </li>
                        <li> Try different keywords </li>
                    </ul>
                </div>
    <?php
            }else {
    ?>
                <h4 id="numResults"> There is <?php echo $numResults ?> result: </h4>
    <?php
            }
    ?>
        <div id="searchTable">
            <?php
                // Output results
                while ($rowsS=($searchResults->fetch_assoc())) {
            ?>
                    <div class="topics3">
                        <img title=<?php echo '"' . $rowsS['cite'] . '"' ?> class="topicImgs3" src= <?php echo $rowsS["img"] ?>>
                        <a href=<?php echo ('"' . $rowsS['link'] . '"'); ?> target="_blank"> <h4 class="topicTitles3" > <?php echo $rowsS["name"] ?> </h4> </a>
                        <p class="descrips3"> <?php echo $rowsS["location"] . " | " . $rowsS["rating"] . " Stars | " ?> <a href=<?php echo '"' . $rowsS["citeLink"] . '"'?> target="_blank"> Citation </a></p>
                    </div>     
            <?php
                }
            ?>
        </div>
    <?php
            echo "<script type='text/JavaScript'>
            var searchBar = document.getElementById('searchBar');
            searchBar.value='" . $search . "'
            </script>";
        } 
    ?>

    <!-- Clear Search Tips if not needed -->
    <?php
        if(isset($_POST['clear']) && ($_POST['clear'] == "clear")) {
            echo '<script type="text/JavaScript"> 
                document.getElementById(\'noResults\').remove();
                </script>'
            ;
        } 
    ?>

    <hr>

    <!-- bottom bar -->
    <?php
        // establishing connection
        include "../footer.php";
    ?>
</body>
</html>