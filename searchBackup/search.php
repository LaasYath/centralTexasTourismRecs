<?php
    // establishing connection
    include "searchConnection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="search.css">
    <script type="module" src="searchFuncs.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> SEARCH | Central Texas Tourism Reccomendations!</title>
</head>
<body id="body">
    <!-- Menu Bar Buttons (Links to other pages) -->
    <div class="menuButtons">
        <button type="button" id="homeButton" onmouseover="var logo = document.getElementById('homeLogo');
                                                            logo.src = 'darkWebLogo.png';" 
                                              onmouseout="var logo = document.getElementById('homeLogo');
                                                            logo.src='weblogo.png';">
        <a href="http://localhost:81/homeFiles/home.php"> <img id="homeLogo" src="webLogo.png" alt="Logo"> </a> </button>
        <button type="button"> <a href="http://localhost:81/browseFiles/browse.php"> ATTRACTIONS </a> </button>
        <button type="button"> <a href="http://localhost:81/hotelFiles/hotel.php">  HOTELS </a> </button>
        <button type="button"> <a href="http://localhost:81/contactFiles/contactForm.php"> CONTACT </a> </button>
        <button type="button"> <a href="http://127.0.0.1:5500/faqFiles/faq.html"> FAQ </a> </button> 
        <form id="topSearch" id="pageButton" action="search.php" method="POST">
            <input title="Type Activity, Location, Price, Zipcode, Date, etc." id="search" type="text" id="pageButton" name="searchBar" placeholder="Search...">
            <button title="Type Activity, Location, Price, Zipcode, Date, etc." id="submitSearch"type="submit" name="submitSearch"> &#128269 </button>
        </form>
    </div>

    <!-- Back to top button -->
    <a  title="Back to Top" href="#homeLogo" class="top" id="top"> &uarr; </a>

    <div>
        <?php
            function cleanData($data) {
                $data = trim($data);
                // $data = stripslashes($data);
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
                $query3 = 'SELECT DISTINCT * FROM hotels WHERE name like "%' . $search . '%" OR rating LIKE "%' . $search . '%" OR location LIKE "%' .$search . '%"';
                $results1 = $conn->query($query1);
                $results2 = $conn->query($query2);
                $results3 = $conn->query($query3);
                $numResults1 = mysqli_num_rows($results1);
                $numResults2 = mysqli_num_rows($results2);
                $numResults3 = mysqli_num_rows($results3);
                $totalResults = $numResults1 + $numResults2 + $numResults3;
                if ($totalResults > 1) {
        ?>
                    <!-- Page Heading -->
                    <div class="heading">
                        <h2 class="title"> Search Page </h2>
                        <h3> There are <?php echo $totalResults ?>  results relating to your search. </h3>
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
                    <?php
                        while($rows=($results2->fetch_assoc())) {
                    ?>
                            <!-- Rows -->
                            <tr> 
                                <!-- Match Price to Symbols -->
                                <td width="25%"> <a href=<?php echo ('"' . $rows['link'] . '"'); ?> target="_blank" > <?php echo $rows['name']; ?> </a> </td>
                                
                                <!-- Prints details -->
                                <td> 
                                    <?php 
                                        echo $rows['blurb'] . "<br><br>"; 
                                    ?>
                                    <p class="details"> <?php echo $rows['date'];?> </p> 
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
                    <?php
                        while($rows=($results3->fetch_assoc())) {
                    ?>
                            <!-- Rows -->
                            <tr> 
                                <!-- Match Price to Symbols -->
                                <td width="25%"> <a href=<?php echo ('"' . $rows['link'] . '"'); ?> target="_blank" > <?php echo $rows['name']; ?> </a> </td>
                                
                                <!-- Prints details -->
                                <td> 
                                    <?php 
                                        echo $rows['location'] . " | " . $rows['rating']; 
                                    ?>
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
                        <h2> Search Page </h2>
                        <h3> There is <?php echo $totalResults ?>  result relating to your search. </h3>
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
                    <?php
                        while($rows=($results2->fetch_assoc())) {
                    ?>
                            <!-- Rows -->
                            <tr> 
                                <!-- Match Price to Symbols -->
                                <td width="25%"> <a href=<?php echo ('"' . $rows['link'] . '"'); ?> target="_blank" > <?php echo $rows['name']; ?> </a> </td>
                                
                                <!-- Prints details -->
                                <td> 
                                    <?php 
                                        echo $rows['blurb'] . "<br><br>"; 
                                    ?>
                                    <p class="details"> <?php echo $rows['date'];?> </p> 
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
                    <?php
                        while($rows=($results3->fetch_assoc())) {
                    ?>
                            <!-- Rows -->
                            <tr> 
                                <!-- Match Price to Symbols -->
                                <td width="25%"> <a href=<?php echo ('"' . $rows['link'] . '"'); ?> target="_blank" > <?php echo $rows['name']; ?> </a> </td>
                                
                                <!-- Prints details -->
                                <td> 
                                    <?php 
                                        echo $rows['location'] . " | " . $rows['rating']; 
                                    ?>
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
                        <h2> Search Page </h2>
                        <h3> There are 0 results relating to your search. </h3>
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
                echo "<script type='text/JavaScript'>
                    var searchBar = document.getElementById('search');
                    searchBar.value='" . $search . "'
                </script>";

                // bottom bar
                // establishing connection
                include "../footer.php";
            } 
        ?>
    </div>

    <?php
        if (isset($_POST["submitSearch"]) && ($_POST["searchBar"] == "")) {
    ?>  
            <div class="heading">
                <h2> Search Page </h2>
                <p class="blurb"> Thank you for visiting our search page! Looking for something? Use the search bar in the top right of the page to browse all of our information. You can also check out our sitemap for additional help! </p>
            </div>
            <!-- bottom bar -->
            <?php
                // establishing connection
                include "../footer.php";
            ?>
    <?php
            echo "<script type='text/JavaScript'>
                var bBar = document.getElementById('bottomBar');
                bBar.style.marginTop = '150px';
            </script>";
        }

    ?>
</body>
</html>