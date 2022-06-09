<?php
    // establishing connection
    include "homeConnection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="homeStyle.css" media="screen">
    <script src="homeFuncs.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> HOME | Central Texas Tourism Reccomendations!</title>
</head>
<body id="body">
    <!-- Menu Bar Buttons (Links to other pages) -->
    <div class="menuButtons">
        <button onmouseover="changeBg(this)" onmouseout="changeBgBack(this)" type="button" id="pageButton"> <a href="http://localhost:81/homeFiles/home.php"> <img id="homeLogo" src="darkWebLogo.png" alt="Logo"> </a> </button>
        <button onmouseover="changeBg(this)" onmouseout="changeBgBack(this)" type="button"> <a href="http://localhost:81/browseFiles/browse.php"> ATTRACTIONS </a> </button>
        <button onmouseover="changeBg(this)" onmouseout="changeBgBack(this)" type="button"> <a href="http://localhost:81/hotelFiles/hotel.php"> PLACES TO STAY </a> </button>
        <button onmouseover="changeBg(this)" onmouseout="changeBgBack(this)" type="button"> <a href="http://localhost:81/contactFiles/contactForm.php"> CONTACT </a> </button>
        <button onmouseover="changeBg(this)" onmouseout="changeBgBack(this)" type="button"> <a href="http://localhost:5500/faqFiles/faq.html"> FAQ </a> </button> 
        <form action="search.php" method="POST">
            <input title="Type Activity, Location, Price, Zipcode, Date, etc." id="search" type="text" name="searchBar" placeholder="Search...">
            <button title="Type Activity, Location, Price, Zipcode, Date, etc." onmouseover="changeBg(this)" onmouseout="changeBgBack(this)" type="submit" id="submit" name="submitSearch">  </button>
        </form>
    </div>

    <!-- Heading: About Texas, Endorsing the Website -->
    <div id="blurb">
        <!-- Blurb about website -->
        <h1 id="title"> Welcome to Central Texas! </h1>
        <p id="aboutBlurb"> This is your one stop site for finding fun things to do in Central Texas! 
            Find a variety of different attractions, from museums to rodeos, all right here! You can 
            even filter by price, location, and distance! Get started by heading over to our 
            <a id="blurbLink" href="http://localhost:81/browse.php"> attractions</a> page!
        </p>
    </div>

    <!-- 1st Section: Upcoming Events -->
    <div class="sectTitles">
        <h2> This Month </h2>
    </div>

    <div class="shading">
        <?php
            $futureQuery = 'SELECT * FROM futureevents WHERE date like "%06%" AND date not like "%06/22%"';
            $results = $conn->query($futureQuery);
            while ($rows=($results->fetch_assoc())) {
        ?>
                <div onmouseover="changeTxt(this)" onmouseout="changeTxtBack(this)"  class="topics">
                    <img class="topicImgs" src= <?php echo $rows["img"] ?>>
                    <h4 class="topicTitles" > <?php echo $rows["name"] ?> </h4>
                    <p class="descrips"> <?php echo $rows["blurb"] ?> </p>
                </div>
        <?php
            }
        ?>
    </div>

    <div class="sectTitles">
        <h2> Things To Explore </h2>
    </div>

    <div class="shading">
        <!-- Blurbs Contain image, title, and quick description of category-->
        <!-- History Blurb -->
        <div onmouseover="changeTxt(this)" onmouseout="changeTxtBack(this)"  class="topics">
            <img class="topicImgs" src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/df/TexasStateCapitol-2010-01.JPG/1200px-TexasStateCapitol-2010-01.JPG?20100821134114">
            <!-- <canvas id="histCanvas"> </canvas> -->
            <h4 id="histTitle" class="topicTitles">  History </h4>
            <p class="descrips"> From the Mexican Revolution, to where we are today, Central Texas is embedded with history. Find a variety of museums commemorating heroes and artists, and stop by the Texas State Capitol in Austin! </p>
        </div>

        <!-- Music Blurb -->
        <div onmouseover="changeTxt(this)" onmouseout="changeTxtBack(this)"  class="topics">
            <img class="topicImgs"src="https://austinpartybusrental.com/wp-content/uploads/2021/08/acl-live-feature-edited.jpg">
            <!-- <canvas id="musicCanvas"> </canvas> -->
            <h4 id="musicTitle" class="topicTitles">  Music </h4>
            <p class="descrips"> Austin is the live music capitol of the world so be ready for some crazy concerts! </p>
        </div>

        <!-- Dining Blurb -->
        <div onmouseover="changeTxt(this)" onmouseout="changeTxtBack(this)"  class="topics">
            <img class="topicImgs" src="https://live.staticflickr.com/4095/4784481028_6cdc631306_b.jpg">
            <!-- <canvas id="musicCanvas"> </canvas> -->
            <h4 id="funTitle" class="topicTitles">  Dining </h4>
            <p class="descrips"> Southern food is a staple of our culture here in Texas. Experience the taste of your favorite classic dishes from the best! </p>
        </div> 
    </div>
        <br>

    <div class="shading">

        <!-- Family Blurb -->
        <div onmouseover="changeTxt(this)" onmouseout="changeTxtBack(this)"  class="topics">
            <img class="topicImgs" src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/db/Inner_Space_Cavern_2016.jpg/1200px-Inner_Space_Cavern_2016.jpg?20170101085837">
            <!-- <canvas id="musicCanvas"> </canvas> -->
            <h4 id="funTitle" class="topicTitles">  Family </h4>
            <p class="descrips"> Find fun things to do for the whole family with kid, teen, and adult friendly activities! </p>
        </div> 

        <!-- Shopping Blurb -->
        <div onmouseover="changeTxt(this)" onmouseout="changeTxtBack(this)"  class="topics">
            <img class="topicImgs" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9d/Domain_phase_2.jpg/1200px-Domain_phase_2.jpg?20120822233121">
            <!-- <canvas id="musicCanvas"> </canvas> -->
            <h4 id="funTitle" class="topicTitles">  Shopping </h4>
            <p class="descrips"> Who doesn't love shopping? Whether you prefer outlet malls, modern shops, or small boutiques, Central Texas is booming with businesses that are sure to surprise you! </p>
        </div> 

        <!-- Outdoors Blurb -->
        <div onmouseover="changeTxt(this)" onmouseout="changeTxtBack(this)"  class="topics">
            <img class="topicImgs" src="https://upload.wikimedia.org/wikipedia/commons/7/74/GeorgetownParksBH.jpg?20110219135358">
            <!-- <canvas id="musicCanvas"> </canvas> -->
            <h4 id="funTitle" class="topicTitles">  Outdoors </h4>
            <p class="descrips"> Strap in for some fun at one of Central Texas' many parks! Go kayaking, fishing, or swimming with the whole family!</p>
        </div> 
    </div>

    <div id="dark" class="popup">
    </div>

    <!-- 'Welcome To Central Texas' Opening Pop Up  -->
    <div class="popup">
        <!-- Text -->
        <div id="popupTitle">
            <h2> WELCOME </h2>
            <h2> TO </h2>
            <h2> CENTRAL </h2>
            <h2> TEXAS! </h2>
            <br>
            <p id="siteDescrip"> This is your one stop site for finding fun things to do in Central Texas!
                You'll find dining, rich history, wonder in the great outdoors, and so much more! Get started
                right now!
            </p>
        </div>

        <!-- Texas Image -->
        <img id="popupTexas" src="logoImg.png">
        <!-- Exit Button -->
        <input id="popupX" type="button" value="&#x2715" onClick="hidePopup()">
    </div>

    <!-- Bottom Bar -->
    <div class="bottomBar">
        <hr>
        <div>
            <img id="bottomLogo" class="bBar" src="webLogo.png" alt="Logo">
        </div>
        <div id="helpLinks" class="bBar">
            <h2 > Sitemap </h2>
            <h2> About </h2>
            <h2> Privacy Policy </h2>
        </div>
    </div>
</body>
</html>