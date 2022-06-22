<?php
    // establishing connection
    include "browseConnection.php";

    session_start();
    // $_SESSION["faves"] = array();
    // $faves = $_SESSION["faves"];
    // print_r($faves);
    // array_push($faves, "Inner Space Caverns");
    // print_r($faves);
    // $_SESSION["faves"] = $faves;
    if (!isset($_SESSION["faves"])) {
        $_SESSION["faves"] = array();
    }
    $faves = $_SESSION["faves"];
    $add = "Inner Space Caverns";
    if (!(in_array($add, $faves))) {
        array_push($faves, "Inner Space Caverns");
    }
    
    // print_r($faves);
    $_SESSION["faves"] = $faves;

?>

<!-- Start of html Portion -->
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="browseStyle.css">
    <script type="module" src="browseFunctions.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> BROWSE | Central Texas Tourism Reccomendations! </title>
</head>
<body>
    <!-- Array of checkbox names -->
    <?php
        $boxes = array('price0', 'priceLow', 'priceMid', 'priceHigh',
        'cityAustin', 'cityRoundrock', 'cityGeorgetown',
        'envtIndoor', 'envtOutdoor', 
        'typeHistory', 'typeMusic', 'typeDining', 'typeFamily', 'typeParks', 'typeMisc',
        'maskRequired', 'maskRecommended', 'maskOptional');

        $prefer = array();

        // Checks if user has been redirected by bot, and display appropriate results
        if($_SERVER['REQUEST_URI'] == "/browseFiles/browse.php?dining") {
            array_push($prefer, "typeDining");
        } else if($_SERVER['REQUEST_URI'] == "/browseFiles/browse.php?music") {
            array_push($prefer, "typeMusic");
        } else if($_SERVER['REQUEST_URI'] == "/browseFiles/browse.php?history") {
            array_push($prefer, "typeHistory");
        } else if($_SERVER['REQUEST_URI'] == "/browseFiles/browse.php?outdoors") {
            array_push($prefer, "envtOutdoor");
        } else if($_SERVER['REQUEST_URI'] == "/browseFiles/browse.php?miscellaneous") {
            array_push($prefer, "typeMisc");
        } else if($_SERVER['REQUEST_URI'] == "/browseFiles/browse.php?family") {
            array_push($prefer, "typeFamily");
        }

        // Adds checked boxes to seperate list ($prefer)
        foreach($boxes as $box) {
            if(isset($_POST[$box])) {
                array_push($prefer, $box);
            }
        }

        // Clear Preferences
        if(isset($_POST['clear']) && ($_POST['clear'] == "clear")) {
            $prefer = array();
        } 
    ?>

    

    <!-- Menu Bar - Links -->
    <div class="menuButtons">
        <button type="button" id="homeButton"onmouseover="var logo = document.getElementById('homeLogo');
                                                        logo.src = 'darkWebLogo.png';" 
                                            onmouseout="var logo = document.getElementById('homeLogo');
                                                        logo.src='weblogo.png';">
        <a href="http://localhost:81/homeFiles/home.php"> <img id="homeLogo" src="webLogo.png" alt="Logo" width="35%" height="90%"> </a> </button>
        <button type="button" id="pageButton" > <a href="http://localhost:81/browseFiles/browse.php"> ATTRACTIONS </a> </button>
        <button type="button"> <a href="http://localhost:81/hotelFiles/hotel.php"> HOTELS </a> </button>
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
    <h2 id="heading"> Attractions </h2>
    <p id="blurb"> To filter recommendations, make sure to select your preferences using the bar to the left!</p>
    <hr>

    <!-- Checkboxes/Filter Options -->
    <form id="filtersForm" action = "browse.php" method="post">
        <div class="filters">

            <!-- Price Checkboxes -->
            <h3> Price <button type="button" id="priceView" onclick="var answer = document.getElementById('priceOptions');
                                var viewButton = document.getElementById('priceView');
                                let compStyles = window.getComputedStyle(answer);
                                if (compStyles.display == 'none') {
                                    answer.style.display = 'block';
                                    viewButton.innerHTML = '-';
                                } else if (compStyles.display == 'block') {
                                    answer.style.display = 'none';
                                    viewButton.innerHTML = '+';
                                }"> + </button></h3> </h3>
            <div id="priceOptions">
                <input type="checkbox" name="price0" value="0" class="priceCheckboxes" 
                    <?php 
                        if (isset($prefer)) {
                            if(in_array('price0', $prefer)) {
                                echo 'checked';
                            }
                        }
                    ?>
                >
                <label for="price0"> Free</label>
                <br>

                <input type="checkbox" name="priceLow" value="20" class="priceCheckboxes"
                    <?php 
                        if (isset($prefer)) {
                            if(in_array('priceLow', $prefer)) {
                                echo 'checked';
                            }
                        }
                    ?>
                >
                <label for="priceLow"> $ </label>
                <br>

                <input type="checkbox" name="priceMid" value="50" class="priceCheckboxes"
                    <?php 
                        if (isset($prefer)) {
                            if(in_array('priceMid', $prefer)) {
                                echo 'checked';
                            }
                        }
                    ?>
                >
                <label for="priceMid"> $$ </label>
                <br>

                <input type="checkbox" name="priceHigh" value="1000" class="priceCheckboxes"
                    <?php 
                        if (isset($prefer)) {
                            if(in_array('priceHigh', $prefer)) {
                                echo 'checked';
                            }
                        }
                    ?>
                >
                <label for="priceHigh"> $$$ </label>
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
                            if(in_array('cityAustin', $prefer)) {
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
                            if(in_array('cityRoundrock', $prefer)) {
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
                            if(in_array('cityGeorgetown', $prefer)) {
                                echo 'checked';
                            }
                        }
                    ?>
                >
                <label for="georgetown"> Georgetown </label>
            </div>

            <!-- Environtment Checkboxes -->
            <h3> Environment <button type="button" id="envtView" onClick="var answer = document.getElementById('envtOptions');
                                var viewButton = document.getElementById('envtView');
                                let compStyles = window.getComputedStyle(answer);
                                if (compStyles.display == 'none') {
                                    answer.style.display = 'block';
                                    viewButton.innerHTML = '-';
                                } else if (compStyles.display == 'block') {
                                    answer.style.display = 'none';
                                    viewButton.innerHTML = '+';
                                }"> + </button></h3>
            <div id="envtOptions">
                <input type="checkbox" name="envtIndoor" value="Indoor" class="envtCheckboxes"
                    <?php 
                        if (isset($prefer)) {
                            if(in_array('envtIndoor', $prefer)) {
                                echo 'checked';
                            }
                        }
                    ?>
                >
                <label for="indoor"> Indoor </label>
                <br>

                <input type="checkbox" name="envtOutdoor" value="Outdoor" class="envtCheckboxes"
                    <?php 
                        if (isset($prefer)) {
                            if(in_array('envtOutdoor', $prefer)) {
                                echo 'checked';
                            }
                        }
                    ?>
                >
                <label for="outdoor"> Outdoor </label>
                <br>
            </div>

            <!-- Type Checkboxes -->
            <h3> Type <button type="button" id="typeView" onClick="var answer = document.getElementById('typeOptions');
                                var viewButton = document.getElementById('typeView');
                                let compStyles = window.getComputedStyle(answer);
                                if (compStyles.display == 'none') {
                                    answer.style.display = 'block';
                                    viewButton.innerHTML = '-';
                                } else if (compStyles.display == 'block') {
                                    answer.style.display = 'none';
                                    viewButton.innerHTML = '+';
                                }"> + </button></h3>
            <div id="typeOptions">
                <input type="checkbox" name="typeHistory" value="history" id="history"class="typeCheckboxes"
                    <?php 
                        if (isset($prefer)) {
                            if(in_array('typeHistory', $prefer)) {
                                echo 'checked';
                            }
                        }
                    ?>
                >
                <label for="typeHistory"> History </label>
                <br>

                <input type="checkbox" name="typeMusic" value="music" class="typeCheckboxes"
                    <?php 
                        if (isset($prefer)) {
                            if(in_array('typeMusic', $prefer)) {
                                echo 'checked';
                            }
                        }
                    ?>
                >
                <label for="typeMusic"> Music </label>
                <br>

                <input type="checkbox" name="typeDining" value="dining" class="typeCheckboxes"
                    <?php 
                        if (isset($prefer)) {
                            if(in_array('typeDining', $prefer)) {
                                echo 'checked';
                            }
                        }
                    ?>
                >
                <label for="typeDining"> Dining </label>
                <br>

                <input type="checkbox" name="typeFamily" value="family" class="typeCheckboxes"
                    <?php 
                        if (isset($prefer)) {
                            if(in_array('typeFamily', $prefer)) {
                                echo 'checked';
                            }
                        }
                    ?>
                >
                <label for="typeFamily"> Family </label>
                <br>

                <input type="checkbox" name="typeParks" value="parks" class="typeCheckboxes"
                    <?php 
                        if (isset($prefer)) {
                            if(in_array('typeParks', $prefer)) {
                                echo 'checked';
                            }
                        }
                    ?>
                >
                <label for="typeParks"> Parks </label>
                <br>
                
                <input type="checkbox" name="typeMisc" value="miscellaneous" class="typeCheckboxes"
                    <?php 
                        if (isset($prefer)) {
                            if(in_array('typeMisc', $prefer)) {
                                echo 'checked';
                            }
                        }
                    ?>
                >
                <label for="typeMisc"> Miscellaneous </label>
                <!-- includes fishing, farming, rodeos, shopping, parks-->
            </div>

            <!-- Mask Checkboxes -->
            <h3> Mask Protocols <button type="button" id="maskView" onClick="var answer = document.getElementById('maskOptions');
                                var viewButton = document.getElementById('maskView');
                                let compStyles = window.getComputedStyle(answer);
                                if (compStyles.display == 'none') {
                                    answer.style.display = 'block';
                                    viewButton.innerHTML = '-';
                                } else if (compStyles.display == 'block') {
                                    answer.style.display = 'none';
                                    viewButton.innerHTML = '+';
                                }"> + </button></h3>
            <div id="maskOptions">
                <input type="checkbox" name="maskRequired" value="Required" class="maskCheckboxes"
                    <?php 
                        if (isset($prefer)) {
                            if(in_array('maskRequired', $prefer)) {
                                echo 'checked';
                            }
                        }
                    ?>
                >
                <label for="required"> Required </label>
                <br>

                <input type="checkbox" name="maskRecommended" value="Recommended" class="maskCheckboxes"
                    <?php 
                        if (isset($prefer)) {
                            if(in_array('maskRecommended', $prefer)) {
                                echo 'checked';
                            }
                        }
                    ?>
                >
                <label for="recommended"> Recommended </label>
                <br>

                <input type="checkbox" name="maskOptional" value="Optional" id="op" class="maskCheckboxes"
                    <?php 
                        if (isset($prefer)) {
                            if(in_array('maskOptional', $prefer)) {
                                echo 'checked';
                            }
                        }
                    ?>
                >
                <label for="optional"> Optional </label>
            </div>

            <!-- Preference Buttons -->
            <br>
            <button type="submit" name="update" class="preferButtons"> Update Preferences </button>
            <br>
            <br>
            <button type="submit" name="clear" class="preferButtons" value="clear"> Clear Preferences/Search </button>
            <br>
            <br>
        </div>
    </form>

    <?php 
        if($_SERVER["REQUEST_URI"] != "/browseFiles/browse.php") {
            echo '<script type="text/JavaScript">
                document.getElementById("filtersForm").submit();
            </script>';
        }
    ?>

    <form class="pageSearch" action="browse.php" method="POST">
        <input title="Search by Name, Location, Category, etc." id="searchBar" type="text" name="searchBarPage" placeholder="Search...">
        <button type="submit" id="submitSearchPage" name="submitSearchPage"> &#128269  </button>
    </form>

    <!-- Displays checkboxes if box has been selected -->
    <?php 
        foreach($prefer as $preference) {
            if (str_contains($preference, "price") == true) {
                echo "<script type='text/JavaScript'> 
                    var answer = document.getElementById('priceOptions');
                    answer.style.display = 'block';
                    var viewButton = document.getElementById('priceView');
                    viewButton.innerHTML = '-';
                </script>";
            } else if (str_contains($preference, "city") == true) {
                echo "<script type='text/JavaScript'> 
                    var answer = document.getElementById('locOptions');
                    answer.style.display = 'block';
                    var viewButton = document.getElementById('locView');
                    viewButton.innerHTML = '-';
                </script>";
            } else if (str_contains($preference, "envt") == true) {
                echo "<script type='text/JavaScript'> 
                    var answer = document.getElementById('envtOptions');
                    answer.style.display = 'block';
                    var viewButton = document.getElementById('envtView');
                    viewButton.innerHTML = '-';
                </script>";
            } else if (str_contains($preference, "type") == true) {
                echo "<script type='text/JavaScript'> 
                    var answer = document.getElementById('typeOptions');
                    answer.style.display = 'block';
                    var viewButton = document.getElementById('typeView');
                    viewButton.innerHTML = '-';
                </script>";
            } else if (str_contains($preference, "mask") == true) {
                echo "<script type='text/JavaScript'> 
                    var answer = document.getElementById('maskOptions');
                    answer.style.display = 'block';
                    var viewButton = document.getElementById('maskView');
                    viewButton.innerHTML = '-';
                </script>";
            }
        }
    ?>

    <!-- Print Initial Results Table -->
    <div id="ogResults">
        <!-- Query for ALL Results -->
        <?php 
        // Remove Previous Results
        echo '<script type="text/JavaScript"> 
        document.getElementById(\'searchTable\').remove();
        </script>'
    ;
        echo '<script type="text/JavaScript"> 
        document.getElementById(\'resultsTable\').remove();
        </script>'
    ;
            $allQuery = 'SELECT * FROM attractions';
            $results = $conn->query($allQuery);
            while ($rows=($results->fetch_assoc())) {
                $price = "";
                if($rows['price'] <=0) {
                    $price = "Free";
                } else if ($rows['price'] <=20) {
                    $price = "$";
                } else if ($rows['price'] <=50) {            
                    $price = "$$";
                } else {
                    $price = "$$$";
                }
        ?>
                <div onclick="addFave(this)" class="topics">
                    <img title=<?php echo ('"' . $rows["cite"] . '"')?> class="topicImgs" src= <?php echo $rows["img"] ?>>
                    <a href=<?php echo ('"' . $rows['link'] . '"'); ?> target="_blank"> <h4 class="topicTitles" > <?php echo $rows["name"] ?> </h4> </a>
                    <p class="descrips"> <?php echo $price . " | " . $rows['location'] . " | " . $rows['envt'] . " | " . $rows['category'] . " | "?> <a target="_blank" href=<?php echo ('"' . $rows['citeLink'] . '"'); ?>> Attribution </a> </p>
                 </div>     
        <?php
            }
        ?>
    </div>

    <?php
        if ((($_SERVER["REQUEST_URI"] == "/browseFiles/browse.php?dining") || ($_SERVER["REQUEST_URI"] == "/browseFiles/browse.php?music"))) {
      // Remove Previous Results
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
        $jointQuery = 'SELECT DISTINCT * FROM attractions WHERE ';

        // Adds to query for each preference
        foreach ($prefer as $preference) {
            // checks if this is the last preference
            if ( ($_POST[$prefer[count($prefer)-1]]) == ($_POST[$preference]) ) {
                // checks to see which where clause we need to query by
                if( str_contains($preference, "price") == true ) {
                    $jointQuery = $jointQuery . 'price<=' . $_POST[$preference];
                } else if ( str_contains($preference, "city") == true )  {
                    $jointQuery = $jointQuery . 'location="' . $_POST[$preference] . '"';
                } else if ( str_contains($preference, "envt") == true ) {
                    $jointQuery = $jointQuery . 'envt like "%' . $_POST[$preference] . '%"';
                } else if ( str_contains($preference, "type") == true ) {
                    $jointQuery = $jointQuery . 'category like "%' . $_POST[$preference] . '%"';
                } else if ( str_contains($preference, "mask") == true ) {
                    $jointQuery = $jointQuery . 'masks="' . $_POST[$preference] . '"';
                } 
            } else {
                // checks to see which where clause we need to query by
                if( str_contains($preference, "price") == true ) {
                    $jointQuery = $jointQuery . 'price<=' . $_POST[$preference] . ' OR ';
                } else if ( str_contains($preference, "city") == true ) {
                    $jointQuery = $jointQuery . 'location="' . $_POST[$preference] . '" OR ';
                } else if ( str_contains($preference, "envt") == true ) {
                    $jointQuery = $jointQuery . 'envt like "%' . $_POST[$preference] . '%" OR ';
                } else if ( str_contains($preference, "type") == true ) {
                    $jointQuery = $jointQuery . 'category like "%' . $_POST[$preference] . '%" OR ';
                } else if ( str_contains($preference, "mask") == true ) {
                    $jointQuery = $jointQuery . 'masks="' . $_POST[$preference] . '" OR ';
                }
            }
        }
    ?> 

    <?php 
        // Checks if preferences have been set
        if (!empty($prefer)) {
            // Remove Previous Results
            echo '<script type="text/JavaScript"> 
                document.getElementById(\'ogResults\').remove();
                </script>'
            ;
            echo '<script type="text/JavaScript"> 
                document.getElementById(\'searchTable\').remove();
                </script>'
            ;
    ?>
        <!-- Filtered Attractions Table -->
            <div id="resultsTable">
                <?php 
                    // Filter based query
                    $resultsJQ = $conn->query($jointQuery);
                    // iterates through results list
                    while ($rowsJQ=($resultsJQ->fetch_assoc())) {
                        $price = "";
                        if($rowsJQ['price'] <=0) {
                            $price = "Free";
                        } else if ($rowsJQ['price'] <=20) {
                            $price = "$";
                        } else if ($rowsJQ['price'] <=50) {            
                            $price = "$$";
                        } else {
                            $price = "$$$";
                        }
                ?>
                        <div class="topics2">
                            <img title=<?php echo ('"' . $rowsJQ["cite"] . '"')?> class="topicImgs2" src= <?php echo $rowsJQ["img"] ?>>
                            <a href=<?php echo ('"' . $rowsJQ['link'] . '"'); ?> target="_blank"> <h4 class="topicTitles2" > <?php echo $rowsJQ["name"] ?> </h4> </a>
                            <p class="descrips2"> <?php echo $price . " | " . $rowsJQ['location'] . " | " . $rowsJQ['envt'] . " | Masks: " . $rowsJQ['masks'] . " | " . $rowsJQ['category'] . " | "?> <a target="_blank" href=<?php echo ('"' . $rowsJQ['citeLink'] . '"'); ?>> Attribution </a> </p>
                        </div>
                <?php
                    }
                ?>
            </div>
    <?php
        }
    ?>

    <!-- Page Search -->
    <?php
        function cleanData($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        if (isset($_POST["submitSearchPage"]) && ($_POST["searchBarPage"] != "")) {
            // make sure search is not an sql injection, protects tables/database
            $search = $_POST["searchBarPage"];
            $search = cleanData($search);
            $search = $conn -> real_escape_string($search);

            //  Query for ALL Results
            $searchQuery = 'SELECT DISTINCT * FROM attractions WHERE name like "%' . $search . '%" OR blurb LIKE "%' . $search . '%" OR envt LIKE "%' .$search . '%" OR category LIKE "%' .$search . '%" OR location LIKE "%' .$search . '%"';
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
                <h4  id="numResults"> There is <?php echo $numResults ?> result: </h4>
    <?php
            }
    ?>
        <div id="searchTable">
            <?php
                // Output results
                while ($rowsS=($searchResults->fetch_assoc())) {
                    $price = "";
                    if($rowsS['price'] <=0) {
                        $price = "Free";
                    } else if ($rowsS['price'] <=20) {
                        $price = "$";
                    } else if ($rowsS['price'] <=50) {            
                        $price = "$$";
                    } else {
                        $price = "$$$";
                    }
            ?>
                    <div class="topics3">
                        <img title=<?php echo ('"' . $rowsS["cite"] . '"')?> class="topicImgs3" src= <?php echo $rowsS["img"] ?>>
                        <a href=<?php echo ('"' . $rowsS['link'] . '"'); ?> target="_blank"> <h4 class="topicTitles3" > <?php echo $rowsS["name"] ?> </h4> </a>
                        <p class="descrips3"><?php echo $price . " | " . $rowsS['location'] . " | " . $rowsS['envt'] . " | Masks: " . $rowsS['masks'] . " | " . $rowsS['category'] . " | " ?> <a target="_blank" href=<?php echo ('"' . $rowsS['citeLink'] . '"'); ?>> Attribution </a> </p>
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
        } else {
            echo '<script type="text/JavaScript"> 
                document.getElementById(\'noResults\').remove();
                </script>'
            ;
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
 

