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

    <!-- Menu Bar - Change into Links! -->
    <div class="menuButtons">
            <button type="button"> <a href="http://localhost:5500/homeFiles/home.html"> HOME </a> </button>
            <button type="button" id="pageButton"> <a href="http://localhost:81/browse.php"> BROWSE </a> </button>
            <button type="button"> <a href="http://localhost:81/contactForm.php"> CONTACT </a> </button>
            <button type="button"> <a href="http://localhost:5500/faqFiles/faq.html"> FAQ </a> </button>
            <button type="button"> <a href="http://localhost:5500/aboutFiles/about.html"> ABOUT </a> </button>
    </div>

    <div>
        <h2 id="heading"> Attractions </h2>
        <p id="blurb"> To display recommendations, make sure to select your preferences using the bar to the left! </p>
        <hr>
    </div>

    <!-- Checkboxes/Filter Options -->
    <form action = "browse.php" method="post">
    <div class="filters">
        <h3> Price <button type="button" onClick="displayPrice()"> + </button></h3> </h3>
        <div class="priceFilter">
                <div class="priceCheckboxes">
                    <input type="checkbox" name="price0" value="0" class="priceCheckboxes">
                    <label for="price0"> Free</label>
                </div>
                <div class="priceCheckboxes">
                    <input type="checkbox" name="priceLow" value="20" class="priceCheckboxes">
                    <label for="priceLow"> $ </label>
                </div>
                <div class="priceCheckboxes">
                    <input type="checkbox" name="priceMid" value="50" class="priceCheckboxes">
                    <label for="priceMid"> $$ </label>
                </div>
                <div class="priceCheckboxes">
                    <input type="checkbox" name="priceHigh" value="1000" class="priceCheckboxes">
                    <label for="priceHigh"> $$$ </label>
                </div>
        </div>



        <h3> Location <button type="button" onClick="displayLocations()"> + </button></h3>
        <div class="locationFilter">
                <div class="locationCheckboxes">
                <input type="checkbox" name="Austin" value="Austin" class="locationCheckboxes">
                    <label for="austin"> Austin </label>
                </div>
                <div class="locationCheckboxes">
                    <input type="checkbox" name="Round_Rock" value="Round Rock" class="locationCheckboxes">
                    <label for="roundrock"> Round Rock </label>
                </div>
                <div class="locationCheckboxes">
                    <input type="checkbox" name="Georgetown" value="Georgetown" class="locationCheckboxes">
                    <label for="georgetown"> Georgetown </label>
                </div>
        </div>

        <h3> Environment <button type="button" onClick="displayEnvt()"> + </button></h3>
        <div class="envtFilter">
                <div class="envtCheckboxes">
                <input type="checkbox" name="Indoor" value="Indoor" class="envtCheckboxes">
                    <label for="indoor"> Indoor </label>
                </div>
                <div class="envtCheckboxes">
                    <input type="checkbox" name="Outdoor" value="Outdoor" class="envtCheckboxes">
                    <label for="outdoor"> Outdoor </label>
                </div>
        </div>

        <h3> Type <button type="button" onClick="displayTypes()"> + </button></h3>
        <div class="typeFilter">
                <div class="typeCheckboxes">
                <input type="checkbox" name="history" value="history" class="typeCheckboxes">
                    <label for="history"> History </label>
                </div>
                <div class="typeCheckboxes">
                    <input type="checkbox" name="music" value="music" class="typeCheckboxes">
                    <label for="music"> Music </label>
                </div>
                <div class="typeCheckboxes">
                    <input type="checkbox" name="dining" value="dining" class="typeCheckboxes">
                    <label for="dining"> Dining </label>
                </div>
                <div class="typeCheckboxes">
                    <input type="checkbox" name="family" value="family" class="typeCheckboxes">
                    <label for="family"> Family </label>
                </div>
                <div class="typeCheckboxes">
                    <input type="checkbox" name="misc" value="misc" class="typeCheckboxes">
                    <label for="misc"> Miscellaneous </label>
                    <!-- includes fishing, farming, rodeos, shopping, parks-->
                </div>
        </div>

        <h3> Mask Protocols <button type="button" onClick="displayDistance()"> + </button></h3>
        <div class="maskFilter">
            <div class="maskCheckboxes">
                <input type="checkbox" name="required" value="required" class="maskCheckboxes">
                <label for="required"> Required </label>
                <br>
                <input type="checkbox" name="recommended" value="recommended" class="maskCheckboxes">
                <label for="recommended"> Recommended </label>
                <br>
                <input type="checkbox" name="optional" value="optional" class="maskCheckboxes">
                <label for="optional"> Optional </label>
                <br>
                <br>
            </div>
        </div>
        <button type="submit" name="submit"> Update Preferences </button>
        <br>
        <br>
        <hr>
    </div>
</form>

<script type="text/javascript">
    function query
</script>


</body>
</html>

<?php

    $boxes = array('price0', 'priceLow', 'priceMid', 'priceHigh',
                   'Austin', 'Round_Rock', 'Georgetown',
                   'Indoor', 'Outdoor', 
                   'history', 'music', 'dining', 'family', 'misc');

    $prefer = array();

    foreach($boxes as $box) {
        if(isset($_POST[$box])) {
            array_push($prefer, $box);
        }
    }

    foreach($boxes as $box) {
        if(isset($_POST[$box])) {
?> <script>
            document.getElementsByName("<?php $box ?>").checked = "true";
</script>
<?php
            array_push($prefer, $box);
        }
    }
?>
 

