<?php
    // establishing connection
    include "browseConnection.php";
?>

<!-- Start of html Portion -->
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="browseStyle.css">
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
        <button type="button"> <a href="http://localhost:5500/homeFiles/home.html"> HOME </a> </button>
        <button type="button" id="pageButton"> <a href="http://localhost:81/browseFiles/browse.php"> ATTRACTIONS </a> </button>
        <button type="button"> <a href="http://localhost:81/contactFiles/contactForm.php"> CONTACT </a> </button>
        <button type="button"> <a href="http://localhost:5500/faqFiles/faq.html"> FAQ </a> </button>
    </div>

    <!-- Heading -->
    <h2 id="heading"> Attractions </h2>
    <p id="blurb"> To filter recommendations, make sure to select your preferences using the bar to the left! (To clear, just unselect and update!)</p>
    <hr>

    <!-- Checkboxes/Filter Options -->
    <form action = "browse.php" method="post">
        <div class="filters">

            <!-- Price Checkboxes -->
            <h3> Price <button type="button" onClick="displayPrice()"> + </button></h3> </h3>
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

            <!-- Location Checkboxes -->
            <h3> Location <button type="button" onClick="displayLocations()"> + </button></h3>
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

            <!-- Environtment Checkboxes -->
            <h3> Environment <button type="button" onClick="displayEnvt()"> + </button></h3>

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

            <!-- Type Checkboxes -->
            <h3> Type <button type="button" onClick="displayTypes()"> + </button></h3>
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

            <!-- Mask Checkboxes -->
            <h3> Mask Protocols <button type="button" onClick="displayMask()"> + </button></h3>
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

            <!-- Preference Buttons -->
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
            $allQuery = 'SELECT * FROM attractions';
            $results = $conn->query($allQuery);
            while ($rows=($results->fetch_assoc())) {
        ?>
                <!-- Rows -->
                <tr> 
                    <!-- Match Price to Symbols -->
                    <td width="25%"> <a href=<?php echo ('"' . $rows['link'] . '"'); ?> target="_blank" > <?php echo $rows['name']; ?> </a> </td>
                        <?php
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
                    
                    <!-- Prints details -->
                    <td> 
                        <?php 
                            echo $rows['blurb'] . "<br><br>"; 
                        ?>
                        <p class="details"> <?php echo $price . " | " . $rows['location'] . " | " . $rows['envt'] . " | " . $rows['category']; ?> </p> 
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
                        <td width="25%"> <a href=<?php echo ('"' . $rowsJQ['link'] . '"'); ?> target="_blank" > <?php echo $rowsJQ['name']; ?> </a> </td>
                        <!-- Matches Price to Symbol -->
                        <?php
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
                        <!-- Prints details -->
                        <td> 
                            <?php echo $rowsJQ['blurb'] . "<br><br>"; ?>
                            <p class="details"> <?php echo $price . " | " . $rowsJQ['location'] . " | " . $rowsJQ['envt'] . " | Masks: " . $rowsJQ['masks'] . " | " . $rowsJQ['category']; ?> </p>
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
</body>
</html>
 

