<?php
    // establishing connection
    include "homeConnection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="searchStyle.css">
    <script src="searchFuncs.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> HOME | Central Texas Tourism Reccomendations!</title>
</head>
<body id="body">
    <!-- Menu Bar Buttons (Links to other pages) -->
    <div class="menuButtons">
        <button onmouseover="changeBg(this)" onmouseout="changeBgBack(this)" type="button" id="homeButton"> <a href="http://localhost:81/homeFiles/home.php"> <img id="homeLogo" src="webLogo.png" alt="Logo"> </a> </button>
        <button onmouseover="changeBg(this)" onmouseout="changeBgBack(this)" type="button"> <a href="http://localhost:81/browseFiles/browse.php"> ATTRACTIONS </a> </button>
        <button onmouseover="changeBg(this)" onmouseout="changeBgBack(this)" type="button"> <a href="http://localhost:81/hotelFiles/hotel.php"> PLACES TO STAY </a> </button>
        <button onmouseover="changeBg(this)" onmouseout="changeBgBack(this)" type="button"> <a href="http://localhost:81/contactFiles/contactForm.php"> CONTACT </a> </button>
        <button onmouseover="changeBg(this)" onmouseout="changeBgBack(this)" type="button"> <a href="http://localhost:5500/faqFiles/faq.html"> FAQ </a> </button> 
        <form action="search.php" method="POST">
            <input title="Type Activity, Location, Price, Zipcode, Date, etc." id="search" type="text" id="pageButton" name="searchBar" placeholder="Search...">
            <button title="Type Activity, Location, Price, Zipcode, Date, etc." onmouseover="changeBg(this)" onmouseout="changeBgBack(this)" id="pageButton" type="submit" name="submitSearch">  </button>
        </form>
    </div>

    <div>
        <?php
            function cleanData($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            if (isset($_POST["submitSearch"]) && ($_POST["searchBar"] != "")) {
                // make sure search is not an sql injection, protects tables/database
                $search = $_POST["searchBar"];
                $search = cleanData($search);
                $search = $conn -> real_escape_string($search);

                //  Query for ALL Results
                $query1 = 'SELECT DISTINCT * FROM attractions WHERE name like "%' . $search . '%" OR blurb LIKE "%' . $search . '%" OR price LIKE "%' .$search . '%" OR envt LIKE "%' .$search . '%" OR category LIKE "%' .$search . '%" OR location LIKE "%' .$search . '%" OR zip LIKE "%' . $search . '%"';
                $query2 = 'SELECT DISTINCT * FROM futureevents WHERE name like "%' . $search . '%" OR blurb LIKE "%' . $search . '%" OR date LIKE "%' .$search . '%"';
                $results1 = $conn->query($query1);
                $results2 = $conn->query($query2);
                $numResults1 = mysqli_num_rows($results1);
                $numResults2 = mysqli_num_rows($results2);
                $totalResults = $numResults1 + $numResults2;
                if ($totalResults > 1) {
        ?>
                    <!-- Page Heading -->
                    <div class="heading">
                        <h1> Search Page </h1>
                        <h2> There are <?php echo $totalResults ?>  results relating to your search. </h2>
                        <p class="blurb"> Not what you're looking for? Try again using unique keywords or check out our sitemap for quick links to all of our content! </p>
                    </div>
                    <table id="resultsTable">
                    <!-- Columns -->
                    <th> Name </th>
                    <th> Details </th>
                    <?php
                        while($rows=($results1->fetch_assoc())) {
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
                } else if ($totalResults == 1) {
        ?>
                    <!-- Page Heading -->
                    <div class="heading">
                        <h1> Search Page </h1>
                        <h2> There is <?php echo $totalResults ?>  result relating to your search. </h2>
                        <p class="blurb"> Not what you're looking for? Try again using unique keywords or check out our sitemap for quick links to all of our content! </p>
                    </div>
                    <table id="resultsTable">
                    <!-- Columns -->
                    <th> Name </th>
                    <th> Details </th>
                    <?php
                        while($rows=($results1->fetch_assoc())) {
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
                } else if ($totalResults == 0) {
        ?>
                    <!-- Page Heading -->
                    <div class="heading">
                        <h1> Search Page </h1>
                        <h2> There are 0 results relating to your search. </h2>
                        <p class="blurb"> Not what you're looking for? Try again using unique keywords or check out our sitemap for quick links to all of our content! </p>
                        <ul id="searchTips"> 
                            <li> Check your spelling </li>
                            <li> Try generic keywords </li>
                            <li> Try fewer key words </li>
                            <li> Try different keywords </li>
                        </ul>
                    </div>
        <?php
                }
            } else if (isset($_POST["submitSearch"]) && ($_POST["searchBar"] == "")) {
        ?>  
                <div class="heading">
                    <h1> Search Page </h1>
                    <p class="blurb"> Thank you for visiting our search page! Looking for something? Use the search bar in the top right of the page to browse all of our information. You can also check out our sitemap for additional help! </p>
                </div>
        <?php
            }
        ?>
    </div>

</body>
</html>