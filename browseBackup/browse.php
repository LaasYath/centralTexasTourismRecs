<?php
    // establishing connection to table
    include "browseConnection.php";

    // session_start();
    // $_SESSION["faves"] = array();
    // $faves = $_SESSION["faves"];
    // print_r($faves);
    // array_push($faves, "Inner Space Caverns");
    // print_r($faves);
    // $_SESSION["faves"] = $faves;
    // if (!isset($_SESSION["faves"])) {
    //     $_SESSION["faves"] = array();
    // }
    // $faves = $_SESSION["faves"];
    // $add = "Inner Space Caverns";
    // if (!(in_array($add, $faves))) {
    //     array_push($faves, "Inner Space Caverns");
    // }
    
    // // print_r($faves);
    // $_SESSION["faves"] = $faves;

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
    <?php
        // Array of checkbox names
        $boxes = array('price0', 'priceLow', 'priceMid', 'priceHigh',
        'cityAustin', 'cityRoundrock', 'cityGeorgetown',
        'envtIndoor', 'envtOutdoor', 
        'typeHistory', 'typeMusic', 'typeDining', 'typeFamily', 'typeParks', 'typeMisc',
        'maskRequired', 'maskRecommended', 'maskOptional');

        // list of checked boxes
        $prefer = array();

        // Adds checked boxes to seperate list ($prefer)
        foreach($boxes as $box) {
            if(isset($_POST[$box])) {
                array_push($prefer, $box);
            }
        }

        // Checks if user has been redirected by bot or from blurbs on home page, displays appropriate results
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


        // Clear Preferences
        if(isset($_POST['clear']) && ($_POST['clear'] == "clear")) {
            $prefer = array();
        }
        
    ?>

    

    <!-- Menu Bar - Header -->
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
            <h3> Price <button type="button" id="priceView" onclick=<?php echo changeSign('price'); ?>> + </button></h3>
            <div id="priceOptions">
                <input type="checkbox" name="price0" value="0" class="priceCheckboxes" <?php checked("price0", $prefer);?> >
                <label for="price0"> Free</label>
                <br>

                <input type="checkbox" name="priceLow" value="20" class="priceCheckboxes" <?php checked("priceLow", $prefer);?>>
                <label for="priceLow"> $ </label>
                <br>

                <input type="checkbox" name="priceMid" value="50" class="priceCheckboxes" <?php checked("priceMid", $prefer);?>>
                <label for="priceMid"> $$ </label>
                <br>

                <input type="checkbox" name="priceHigh" value="1000" class="priceCheckboxes" <?php checked("priceHigh", $prefer);?>>
                <label for="priceHigh"> $$$ </label>
            </div>

            <!-- Location Checkboxes -->
            <h3> Location <button type="button" id="locView" onClick=<?php echo changeSign('loc'); ?>> + </button></h3>
            <div id="locOptions">
                <input type="checkbox" name="cityAustin" value="Austin" class="locationCheckboxes" <?php checked("cityAustin", $prefer);?>>
                <label for="austin"> Austin </label>
                <br>

                <input type="checkbox" name="cityRoundrock" value="Round Rock" class="locationCheckboxes" <?php checked("cityRoundrock", $prefer);?>>
                <label for="roundrock"> Round Rock </label>
                <br>

                <input type="checkbox" name="cityGeorgetown" value="Georgetown" class="locationCheckboxes" <?php checked("cityGeorgetown", $prefer);?>>
                <label for="georgetown"> Georgetown </label>
            </div>

            <!-- Environtment Checkboxes -->
            <h3> Environment <button type="button" id="envtView" onClick=<?php echo changeSign('envt'); ?>> + </button></h3>
            <div id="envtOptions">
                <input type="checkbox" name="envtIndoor" value="Indoor" class="envtCheckboxes" <?php checked("envtIndoor", $prefer);?>>
                <label for="indoor"> Indoor </label>
                <br>

                <input type="checkbox" name="envtOutdoor" value="Outdoor" class="envtCheckboxes" <?php checked("envtOutdoor", $prefer);?>>
                <label for="outdoor"> Outdoor </label>
                <br>
            </div>

            <!-- Type Checkboxes -->
            <h3> Type <button type="button" id="typeView" onClick=<?php echo changeSign('type'); ?>> + </button></h3>
            <div id="typeOptions">
                <input type="checkbox" name="typeHistory" value="history" id="history"class="typeCheckboxes"<?php checked("typeHistory", $prefer);?> >
                <label for="typeHistory"> History </label>
                <br>

                <input type="checkbox" name="typeMusic" value="music" class="typeCheckboxes" <?php checked("typeMusic", $prefer);?>>
                <label for="typeMusic"> Music </label>
                <br>

                <input type="checkbox" name="typeDining" value="dining" class="typeCheckboxes" <?php checked("typeDining", $prefer);?>>
                <label for="typeDining"> Dining </label>
                <br>

                <input type="checkbox" name="typeFamily" value="family" class="typeCheckboxes" <?php checked("typeFamily", $prefer);?> >
                <label for="typeFamily"> Family </label>
                <br>

                <input type="checkbox" name="typeParks" value="parks" class="typeCheckboxes" <?php checked("typeParks", $prefer);?>>
                <label for="typeParks"> Parks </label>
                <br>
                
                <input type="checkbox" name="typeMisc" value="miscellaneous" class="typeCheckboxes" <?php checked("typeMisc", $prefer);?>>
                <label for="typeMisc"> Miscellaneous </label>
                <!-- includes fishing, farming, rodeos, shopping, parks-->
            </div>

            <!-- Mask Checkboxes -->
            <h3> Mask Protocols <button type="button" id="maskView" onClick=<?php echo changeSign('mask'); ?>> + </button></h3>
            <div id="maskOptions">
                <input type="checkbox" name="maskRequired" value="Required" class="maskCheckboxes"<?php checked("maskRequired", $prefer);?>>
                <label for="required"> Required </label>
                <br>

                <input type="checkbox" name="maskRecommended" value="Recommended" class="maskCheckboxes" <?php checked("maskRecommended", $prefer);?>>
                <label for="recommended"> Recommended </label>
                <br>

                <input type="checkbox" name="maskOptional" value="Optional" id="op" class="maskCheckboxes" <?php checked("maskOptional", $prefer);?>>
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

    <!-- Submits Form (Sets results if user is coming from another page) -->
    <?php 
        if($_SERVER["REQUEST_URI"] != "/browseFiles/browse.php") {
            echo '<script type="text/JavaScript">
                document.getElementById("filtersForm").submit();
            </script>';
        }
    ?>

    <!-- Page Search -->
    <form class="pageSearch" action="browse.php" method="POST">
        <input title="Search by Name, Location, Category, etc." id="searchBar" type="text" name="searchBarPage" placeholder="Search...">
        <button type="submit" id="submitSearchPage" name="submitSearchPage"> &#128269  </button>
    </form>

    <?php 
        //  Displays checkboxes if box has been selected when filters are updated
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
        <?php 
            // Remove Previous Results
            clearResults();
            clearSearch();

            // Display all results
            $allQuery = 'SELECT * FROM attractions';
            $results = $conn->query($allQuery);
            while ($rows=($results->fetch_assoc())) {
                $price = "";
                $price = getSymbol($rows['price']);
        ?>
                <!-- Outputs individual activity block w/ info -->
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
        // Checks if user coming from bot links
        if ((($_SERVER["REQUEST_URI"] == "/browseFiles/browse.php?dining") || ($_SERVER["REQUEST_URI"] == "/browseFiles/browse.php?music"))) {
            // Remove Previous Results
            clearOg();
            clearSearch();           
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
            clearOg();
            clearSearch();            
    ?>
        <!-- Filtered Attractions Table -->
                <?php 
                    // Filter based query
                    $resultsJQ = $conn->query($jointQuery);
                ?>
            <div id="resultsTable">
                <?php
                    // iterates through results list
                    while ($rowsJQ=($resultsJQ->fetch_assoc())) {
                        $price = "";
                        $price = getSymbol($rowsJQ['price']);
                ?>
                        <!-- Outputs result blocks w/ info -->
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

    <!-- Page Search Functionality -->
    <?php
        // cleanData($data) created formatted version of parameter, devoid of possible scripting hacks
        // $data - String (user input)
        // return{String} - returns a string
        function cleanData($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        if (isset($_POST["submitSearchPage"]) && ($_POST["searchBarPage"] != "")) {
            $search = $_POST["searchBarPage"];
            $search = cleanData($search);
            // make sure search is not an sql injection, protects tables/database
            $search = $conn -> real_escape_string($search);

            //  Query for ALL possible Results
            $searchQuery = 'SELECT DISTINCT * FROM attractions WHERE name like "%' . $search . '%" OR blurb LIKE "%' . $search . '%" OR envt LIKE "%' .$search . '%" OR category LIKE "%' .$search . '%" OR location LIKE "%' .$search . '%"';
            $searchResults = $conn->query($searchQuery);
            $numResults = mysqli_num_rows($searchResults);

            // Remove Previous Results
            clearOg();
            clearResults();

            if ($numResults > 1) {
    ?> 
                <h4 class="numResults"> There are <?php echo $numResults ?> results: </h4>
    <?php
            } else if ($numResults == 0) {
    ?>
                <!-- output for zero results in search -->
                <h4 class="numResults"> There are <?php echo $numResults ?> results: </h4>
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
                <h4  class="numResults"> There is <?php echo $numResults ?> result: </h4>
    <?php
            }
    ?>
            <div id="searchTable">
                <?php
                    // Output results
                    while ($rowsS=($searchResults->fetch_assoc())) {
                        $price = "";
                        $price = getSymbol($rowsS['price']);
                ?>
                        <!-- search results block w/ info -->
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
            // keeps search value displayed after user hits enter
            echo "<script type='text/JavaScript'>
                var searchBar = document.getElementById('searchBar');
                searchBar.value='" . $search . "'
            </script>";
        } else {
            clearNoResults();
        }
    ?>

    <!-- Clear Search Tips if not needed -->
    <?php
        if(isset($_POST['clear']) && ($_POST['clear'] == "clear")) {
            clearNoResults();
        } 
    ?>

    <hr>

    <!-- bottom bar -->
    <?php
        // establishing connection
        include "../footer.php";

        // changeSign($start)
        // @desc displays filter section if respective checkbox selected
        // @param {String} div name
        // @return {String} prints "checked", changes style of attribute section 
        function changeSign($start) {
            echo '"let filterId = `' . $start . 'Options`;
            let viewButtonId = `' . $start . 'View`;
            console.log(`function is doing the job`);
            let filter = document.getElementById(filterId);
            let viewButton = document.getElementById(viewButtonId);
            let compStyles = window.getComputedStyle(filter);
            if (compStyles.display == `none`) {
                filter.style.display = `block`;
                viewButton.innerHTML = `-`;
            } else if (compStyles.display == `block`) {
                filter.style.display = `none`;
                viewButton.innerHTML = `+`;
            }"';
        }

        // checked($name, $prefer)
        // @desc makes sure selected checkboxes remain checked on update
        // @param {String} input name
        // @param {Array} list of user selected checkboxes
        // @return {String} prints "checked", changes style of attribute section 
        function checked($name, $prefer) {
            foreach($prefer as $preference) {
                if($preference == $name) {
                echo "checked";
                }
            }
        }

        // getSymbol($price)
        // @descrip returns appropriate price symbol
        // @param {Integer} cost of event
        // @return {String} symbol relative to price
        function getSymbol($price) {
            $symbol = "";
            if($price <=0) {
                $symbol = "Free";
            } else if ($price <=20) {
                $symbol = "$";
            } else if ($price <=50) {            
                $symbol = "$$";
            } else {
                $symbol = "$$$";
            }
            return $symbol;
        }

        // clearSearch() 
        // @descrip clears any search results
        function clearSearch() {
            echo '<script type="text/JavaScript"> 
                var searchTable = document.getElementById(\'searchTable\');
                if (searchTable != null) {
                    searchTable.remove();
                }
            </script>';
        }

        // clearOg()
        // @descrip clears any original results
        function clearOg() {
            echo '<script type="text/JavaScript"> 
                var ogTable = document.getElementById(\'ogResults\');
                if (ogTable != null) {
                    ogTable.remove();
                }
            </script>';
        }

        // clearResults()
        // @descrip clears any filtered results
        function clearResults() {
            echo '<script type="text/JavaScript"> 
                var resultsTable = document.getElementById(\'resultsTable\')
                if (resultsTable != null) {
                    resultsTable.remove();
                }
            </script>';
        }

        // clearNoResults()
        // @descrip clears search advice
        function clearNoResults() {
            echo '<script type="text/JavaScript"> 
                var noResults = document.getElementById(\'noResults\');
                if (noResults != null) {
                    noResults.remove();
                }
            </script>';
        }
    ?>
</body>
</html>