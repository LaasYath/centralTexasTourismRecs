<?php

// establishing connection
$dbServerName = "localhost:3307";
$dbUserName = "root";
$dbPwd = "root";
$dbName = "mysql";

$conn = new mysqli($dbServerName, $dbUserName, $dbPwd, $dbName);

if ($conn->connect_error) {
    die('Connect Error (' . 
    $conn->connect_errno . ') '. 
    $conn->connect_error);
} else {
    echo "connected";
}

// Gets all of the data from attractions set
$sql = "SELECT * FROM attractions ";
$result = $conn->query($sql);
?>

<!-- Start of html Portion -->
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="browseStyle.css">
    <script src="browseFunctions.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> BROWSE | Central Texas Tourism Reccomendations! </title>
</head>
<body>

    <!-- Menu Bar - Change into Links! -->
    <div class="menuButtons">
        <button type="button" onClick="homePage()"> HOME </button>
        <button type="button" id="pageButton"> BROWSE </button>
        <button type="button" onClick="contactPage()"> CONTACT </button>
        <button type="button" onClick="faqPage()"> FAQ </button>
        <button type="button" onClick="aboutPage()"> ABOUT </button>
    </div>

    <div>
        <h2 id="heading"> Attractions </h2>
        <hr>
    </div>

    <!-- Checkboxes/Filter Options -->
    <form action = "browseRecs.php">
    <div class="filters">
        <h3> Price <button type="button" onClick="displayPrices()"> + </button></h3>
        <div class="priceFilter">
            <div class="priceCheckboxes">
                <div class="priceCheckboxes">
                    <input type="checkbox" name="price0" value="0">
                    <label for="price0"> Free</label>
                </div>
                <div class="priceCheckboxes">
                    <input type="checkbox" name="priceLow" onClick="changeRecs(this)">
                    <label for="priceLow"> $ </label>
                </div>
                <div class="priceCheckboxes">
                    <input type="checkbox" name="priceMid" onClick="changeRecs(this)">
                    <label for="priceMid"> $$ </label>
                </div>
                <div class="priceCheckboxes">
                    <input type="checkbox" name="priceHigh" onClick="changeRecs(this)">
                    <label for="priceHigh"> $$$ </label>
                </div>
            </div>
        </div>

        <h3> Location <button type="button" onClick="displayLocations()"> + </button></h3>
        <div class="locationFilter">
            <div class="locationCheckboxes">
                <div class="typeCheckboxes">
                <input type="checkbox" name="austin">
                    <label for="austin"> Austin </label>
                </div>
                <div class="locationCheckboxes">
                    <input type="checkbox" name="roundrock">
                    <label for="roundrock"> Round Rock </label>
                </div>
                <div class="locationCheckboxes">
                    <input type="checkbox" name="georgetown">
                    <label for="georgetown"> Georgetown </label>
                </div>
            </div>
        </div>

        <h3> Environment <button type="button" onClick="displayEnvt()"> + </button></h3>
        <div class="envtFilter">
            <div class="envtCheckboxes">
                <div class="typeCheckboxes">
                <input type="checkbox" name="indoor">
                    <label for="indoor"> Indoor </label>
                </div>
                <div class="envtCheckboxes">
                    <input type="checkbox" name="outdoor">
                    <label for="outdoor"> Outdoor </label>
                </div>
            </div>
        </div>

        <h3> Type <button type="button" onClick="displayTypes()"> + </button></h3>
        <div class="typeFilter">
            <div class="typeCheckboxes">
                <div class="typeCheckboxes">
                <input type="checkbox" name="history">
                    <label for="history"> History </label>
                </div>
                <div class="typeCheckboxes">
                    <input type="checkbox" name="music">
                    <label for="music"> Music </label>
                </div>
                <div class="typeCheckboxes">
                    <input type="checkbox" name="dining">
                    <label for="dining"> Dining </label>
                </div>
                <div class="typeCheckboxes">
                    <input type="checkbox" name="family">
                    <label for="family"> Family </label>
                </div>
                <div class="typeCheckboxes">
                    <input type="checkbox" name="misc">
                    <label for="misc"> Miscellaneous </label>
                    <!-- includes fishing, farming, rodeos, shopping, parks-->
                </div>
            </div>
        </div>

        <h3> Distance <button type="button" onClick="displayDistance()"> + </button></h3>
        <div class="distanceFilter">
            <input id="zipInput" type="text" placeholder="Enter Zipcode">
            <div class="distanceDropdown">
                <label for="miles"></label>
                <select name="miles" class="searchDropdown">
                    <option value="5"> Under 5 miles </option>
                    <option value="10"> Under 10 miles </option>
                    <option value="10+"> 10+ Miles </option>
                </select>
                <button type="button" id="searchIcon"> </button>
            </div>
        </div>
    </div>
    <input type="submit" name="submitBtn">
    <label for="submitBtn"> Change Preferences </label>
</from>

    <!-- Results side -->
    <div>
        <div class="searchFilter">
            <label for="type"></label>
            <select name="type" class="searchDropdown">
                <option value=""> Filter By...</option>
                <option value="history"> History </option>
                <option value="music"> Music </option>
                <option value="dining"> Dining </option>
                <option value="family"> Family </option>
                <option value="miscellaneous"> Miscellaneous </option>
            </select>
            <button type="button" id="searchIcon" onClick="resultsPage()">  </button>
        </div>
    </div>

    <div class="results">
        <!-- Making of table -->
        <table>
            <tr>
                <th> Name </th>
                <th> Blurb </th>
                <th> Details </th>
            </tr>
            <!-- Usse php to fetch data -->
            <?php
                while($rows=$result->fetch_assoc()) {
            ?>
            <tr>
                <td> <?php echo $result['name'] . "<br>"; ?> </td>
                
                </tr>
            <?php
                }
            ?>
        </table>
            </div>


</body>
</html>