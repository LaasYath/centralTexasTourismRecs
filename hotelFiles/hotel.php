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
    <title> HOTEL | Central Texas Tourism Reccomendations! </title>
    <link rel="stylesheet" href="hotelStyle.css">
</head>
<body>
    <!-- Array of checkbox names -->
    <?php
        $boxes = array('rating', 'cityAustin', 'cityRoundrock', 'cityGeorgetown');

        $prefer = array();

        // Adds checked boxes to seperate list ($prefer)
        foreach($boxes as $box) {
            if(isset($_POST[$box])) {
                array_push($prefer, $_POST[$box]);
            }
        }

        // Clear Preferences
        if(isset($_POST['clear']) && ($_POST['clear'] == "clear")) {
            $prefer = array();
        } 
    ?>

    <!-- Meny Buttons (Link to Other Pages) -->
    <div class="menuButtons">
        <button type="button"> <a href="http://localhost:81/homeFiles/home.php"> <img id="homeLogo" src="webLogo.png" alt="Logo"> </a> </button>
        <button type="button"> <a href="http://localhost:81/browseFiles/browse.php"> ATTRACTIONS </a> </button>
        <button type="button" id="pageButton"> <a href="http://localhost:81/hotelFiles/hotel.php"> PLACES TO STAY </a> </button>
		<button type="button"> <a href="http://localhost:81/contactFiles/contactForm.php"> CONTACT </a> </button>
        <button type="button"> <a href="http://localhost:5500/faqFiles/faq.html"> FAQ </a> </button>
        <form action="/searchFiles/search.php" method="POST">
            <input title="Type Activity, Location, Price, Zipcode, Date, etc." id="search" type="text" name="searchBar" placeholder="Search...">
            <button title="Type Activity, Location, Price, Zipcode, Date, etc." type="submit" id="submit" name="submitSearch">  </button>
        </form>
    </div>

    <!-- Heading -->
    <h2 id="heading"> Hotels </h2>
    <p id="blurb"> Browse through our carefully curated list of hotels that is sure to meet all your needs and your budget! Use the buttons to the left to filter results!</p>
    <hr>

    <!-- Checkboxes/Filter Options -->
    <form action = "hotel.php" method="post">
        <div class="filters">
            <!-- Rating Dropdown -->
            <h3> Rating <button type="button" onClick="displayRating()"> + </button></h3>
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
            <h3> Location <button type="button" onClick="displayLoc()"> + </button></h3>
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
            <button type="submit" name="clear" class="preferButtons" value="clear"> Clear Preferences </button>
            <br>
            <br>
            <hr>
        </div>
    </form>

    <!-- Print Initial Results Table -->
    <table id="resultsTableOg">
        <!-- Columns -->
        <th> Name </th>
        <th> Details </th>
        <!-- Query for ALL Results -->
        <?php 
            $allQuery = 'SELECT * FROM hotels';
            $results = $conn->query($allQuery);
            while ($rows=($results->fetch_assoc())) {
        ?>
                <!-- Rows -->
                <tr> 
                    <!-- Match Price to Symbols -->
                    <td width="25%"> <a href=<?php echo ('"' . $rows['link'] . '"'); ?> target="_blank" > <?php echo $rows['name']; ?> </a> 
                        <br>
                    </td>
                    
                    <!-- Prints details -->
                    <td>
                        <p class="details"> <?php echo $rows['rating'] . " | " . $rows['location'] ?> </p> 
                    </td>
                </tr>

                <!-- Table Dividers -->
                <tr> 
                    <td> <hr> </td>
                    <td> <hr> </td>
                </tr>
        <?php
            }
        ?>
    </table>

    <?php
        // Checks if preferences have been made (clears original table)
        if(count($prefer) != 0) {
            echo '<script type="text/JavaScript"> 
                document.getElementById(\'resultsTableOg\').remove();
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
    ?> 

    <!-- Filtered Attractions Table -->
    <table id="resultsTable">
        <?php 
            // Checks if preferences have been set
            if (!empty($prefer)) {
        ?>
                <!-- Columns -->
                <th> Name </th>
                <th> Details </th>
        <?php 
            }

            // Filter based query
            $resultsJQ = $conn->query($jointQuery);
            if (!empty($prefer)) {
                // iterates through results list
                while ($rowsJQ=($resultsJQ->fetch_assoc())) {
        ?>
                    <!-- HTML -->
                    <!-- rows -->
                    <tr> 
                        <!-- Prints name -->
                        <td width="25%"> <a href=<?php echo ('"' . $rowsJQ['link'] . '"'); ?> target="_blank" > <?php echo $rowsJQ['name']; ?> </a> 
                        </td>
                        <!-- Prints details -->
                        <td> 
                            <p class="details"> <?php echo $rowsJQ['rating'] . " | " . $rowsJQ['location']?> </p>
                        </td>
                    </tr>
                    <!-- Table Dividers -->
                    <tr> 
                        <td> <hr> </td>
                        <td> <hr> </td>
                    </tr>
            <?php
                }
            }
        ?>
    </table>

    <hr>

    <!-- Bottom Bar -->
    <div class="bottomBar">
        <div class="bottomBar1">
            <div id="bottomLogo" class="barSect">
                <img width="100%" src="webLogo.png" alt="Logo">
            </div>
            <div id="helpLinks" class="barSect">
                <button type="button" id="third"> About </button>
                <br>
                <button type="button" id="second"> Sitemap </button>
                <br>
                <button type="button" id="first"> Privacy Policy  </button>
            </div>
        </div>
        <div class="bottomBar2">
            <p> Created by Laasya Yatham </p>
            <p> Licensed under the Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International Public License </p>
            <p> This website is not affiliated, associated, authorized, endorsed by, or in any way officially connected with the local authorities and government of Texas or any of its subsidiaries or its affiliates. Related names, marks, emblems and images are registered trademarks of their respective owners. </p>
        </div>
    </div>
</body>
</html>