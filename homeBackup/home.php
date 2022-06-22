<?php
    // establishing connection
    include "homeConnection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="homeStyle.css">
    <script type="module" src="homeFuncs.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> HOME | Central Texas Tourism Reccomendations!</title>
</head>
<body id="body">
    <!-- Creating Cookies -->
    <?php 
        session_start();
    ?>

    <!-- Menu Bar Buttons (Links to other pages) -->
    <div class="menuButtons">
        <button type="button" id="pageButton"> <a href="http://localhost:81/homeFiles/home.php"> <img id="homeLogo" src="darkWebLogo.png" alt="Logo"> </a> </button>
        <button type="button"> <a href="http://localhost:81/browseFiles/browse.php"> ATTRACTIONS </a> </button>
        <button  type="button"> <a href="http://localhost:81/hotelFiles/hotel.php"> HOTELS </a> </button>
        <button type="button"> <a href="http://localhost:81/contactFiles/contactForm.php"> CONTACT </a> </button>
        <button type="button"> <a href="http://127.0.0.1:5500/faqFiles/faq.html"> FAQ </a> </button> 
        <form id="topSearch" action="/searchFiles/search.php" method="POST">
            <input title="Type Activity, Location, Price, Zipcode, Date, etc." id="search" type="text" id="pageButton" name="searchBar" placeholder="Search...">
            <button  id="submitSearch" type="submit" name="submitSearch"> &#128269 </button>
        </form>
    </div>

    <!-- Back to top button -->
    <a title="Back to Top" href="#pageButton" class="top" id="top"> &uarr; </a>

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
    <div id="upcoming" class="sectTitles">
        <h2> This Month Events </h2>
    </div>

    <div class="shading">
        <?php
            $month = date("m");
            $year = date("Y");
            $futureQuery = 'SELECT * FROM futureevents WHERE date like "%' . $month . '%" AND date not like "%' . $month . '/' . $year . '%"';
            $results = $conn->query($futureQuery);
            while ($rows=($results->fetch_assoc())) {
        ?>
                <div class="topics">
                    <a href=<?php echo '"' . $rows["link"] . '"'; ?> target="_blank"> <img class="topicImgs" title=<?php echo '"' . $rows["cite"] . '"'; ?> src= <?php echo $rows["img"]; ?>> </a>
                    <a class="topicLinks" href=<?php echo '"' . $rows["link"] . '"'; ?> target="_blank"> <h4 class="topicTitles" > <?php echo $rows["name"]; ?> </h4> </a>
                    <p class="descrips"> <?php echo $rows["blurb"]; ?> | <a class="topicLinks" target="_blank" href=<?php echo '"' . $rows["citeLink"] . '"'; ?>> Attribution </a> </p>
                </div>
        <?php
            }
        ?>
    </div>

    <div class="sectTitles">
        <h2 id="explore"> Things To Explore </h2>
    </div>

    <div class="shading">
        <!-- Blurbs Contain image, title, and quick description of category-->
        <!-- History Blurb -->
        <a href="http://localhost:81/browseFiles/browse.php?history">
            <div class="topics">
                <img title="History Image of Texas State Capitol (LoneStarMike - Own Work - CC BY 3.0)" class="topicImgs" src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/df/TexasStateCapitol-2010-01.JPG/1200px-TexasStateCapitol-2010-01.JPG?20100821134114">
                <!-- <canvas id="histCanvas"> </canvas> -->
                <h4 id="histTitle" class="topicTitles">  History </h4>
                <a id="attribution" href="https://commons.wikimedia.org/wiki/File:TexasStateCapitol-2010-01.JPG"> Attribution </a>
                <p class="descrips"> From the Mexican Revolution, to where we are today, Central Texas is embedded with history. Find museums commemorating heroes and artists, and stop by the Texas State Capitol in Austin! </p>
            </div>
        </a>

        <!-- Music Blurb -->
        <a href="http://localhost:81/browseFiles/browse.php?music">
            <div class="topics">
                <img title="Moody Amphitheater Performance (Ralph Aversen - flickr - CC BY NC 2.0)" class="topicImgs"src="https://live.staticflickr.com/65535/52095236396_09990ee484_c.jpg">
                <!-- <canvas id="musicCanvas"> </canvas> -->
                <a id="attribution" href="https://flic.kr/p/2nntGNY"> Attribution </a>
                <h4 id="musicTitle" class="topicTitles">  Music </h4>
                <p class="descrips"> Austin is the live music capitol of the world so be ready for some crazy concerts! </p>
            </div>
        </a>

        <!-- Dining Blurb -->
        <a href="http://localhost:81/browseFiles/browse.php?dining">
            <div  class="topics">
                <img title="Texas Size Round Rock Donut (Roy Niswanger - flickr - CC BY 2.0)" class="topicImgs" src="https://live.staticflickr.com/4095/4784481028_6cdc631306_b.jpg">
                <!-- <canvas id="musicCanvas"> </canvas> -->
                <a  id="attribution" href="https://www.flickr.com/photos/motleypixel/4784481028/in/photostream/"> Attribution </a>
                <h4 id="funTitle" class="topicTitles">  Dining </h4>
                <p class="descrips"> Southern food is a staple of our culture here in Texas. Experience the taste of your favorite classic dishes from the best! </p>
            </div> 
        </a>
    </div>
        <br>

    <div class="shading">

        <!-- Family Blurb -->
        <a href="http://localhost:81/browseFiles/browse.php?family">
            <div class="topics">
                <img title="Inner Space Cavern 2016 (Brad Fults - Inner Space Caverns - CC BY 2.0)" class="topicImgs" src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/db/Inner_Space_Cavern_2016.jpg/1200px-Inner_Space_Cavern_2016.jpg?20170101085837">
                <!-- <canvas id="musicCanvas"> </canvas> -->
                <a  id="attribution" href="https://commons.wikimedia.org/wiki/File:Inner_Space_Cavern_2016.jpg"> Attribution </a>
                <h4 id="funTitle" class="topicTitles">  Family </h4>
                <p class="descrips"> Find fun things to do for the whole family with kid, teen, and adult friendly activities! </p>
            </div> 
        </a>

        <!-- Shopping Blurb -->
        <a href="http://localhost:81/browseFiles/browse.php?miscellaneous">
            <div class="topics">
                <img title="Doman Phase 2 (Larry D. Moore - Wikimedia Commons - CC BY-SA 3.0)" class="topicImgs" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9d/Domain_phase_2.jpg/1200px-Domain_phase_2.jpg?20120822233121">
                <!-- <canvas id="musicCanvas"> </canvas> -->
                <a  id="attribution" href="Doman Phase 2 (Larry D. Moore - Wikimedia Commons - CC BY-SA 3.0)"> Attribution </a>
                <h4 id="funTitle" class="topicTitles">  Shopping </h4>
                <p class="descrips"> Who doesn't love shopping? Whether you prefer outlet malls, modern shops, or small boutiques, Central Texas is booming with businesses that are sure to surprise you! </p>
            </div> 
        </a>

        <!-- Outdoors Blurb -->
        <a href="http://localhost:81/browseFiles/browse.php?outdoors">
            <div class="topics">
                <img title="Outdoors Image of Lake Georgetown Park (Austex - Own Work - CC BY SA 3.0)" class="topicImgs" src="https://upload.wikimedia.org/wikipedia/commons/7/74/GeorgetownParksBH.jpg?20110219135358">
                <!-- <canvas id="musicCanvas"> </canvas> -->
                <a  id="attribution" href="https://commons.wikimedia.org/wiki/File:GeorgetownParksBH.jpg"> Attribution </a>
                <h4 id="funTitle" class="topicTitles">  Outdoors </h4>
                <p class="descrips"> Strap in for some fun at one of Central Texas' many parks! Go kayaking, fishing, or swimming with the whole family!</p>
            </div> 
        </a>
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
            <p id="siteDescrip"> This is your one stop site for finding fun things to do in Central Texas!
                You'll find dining, rich history, wonder in the great outdoors, and so much more! Get started
                right now!
                <br>
                <br>
                This website also uses cookies, by clicking "Let's go!", you agree to our <a target="_blank"
                href="http://localhost:81/extra/privacy.php"> privacy policy </a> and consent to the use of cookies.
            </p>
        </div>

        <!-- Texas Image -->
        <img id="popupTexas" src="newSplashImg.png">
        <!-- Exit Button -->
        <input id="popupGo" type="button" value="Let's Go!" onclick="const boxes = Array.from(document.getElementsByClassName('popup'));
                                                                    boxes.forEach(box => {
                                                                        box.style.visibility = 'hidden';
                                                                        body.style.overflowX = 'scroll';
                                                                        body.style.overflowY = 'scroll';
                                                                    });  
                                                                    var today = new Date();
                                                                    var expire = new Date();
                                                                    expire.setTime(today.getTime() + 3600000*24*7);
                                                                    document.cookie = 'popup=clicked' + '; expires='+expire.toGMTString();">
        <input id="popupNo" type="button" value="Opt Out" onclick="const boxes = Array.from(document.getElementsByClassName('popup'));
                                                                    boxes.forEach(box => {
                                                                        box.style.visibility = 'hidden';
                                                                        body.style.overflowX = 'scroll';
                                                                        body.style.overflowY = 'scroll';
                                                                    });">

    </div>

    <!-- Hides popup if visited in the past week -->
    <?php
    // setcookie("popup=clicked");
        if(isset($_COOKIE["popup"]) && $_COOKIE["popup"]=="clicked") {
            echo "<script text='text/Javascript'>
                const boxes = Array.from(document.getElementsByClassName('popup'));

                boxes.forEach(box => {
                    box.style.visibility = 'hidden';
                    body.style.overflowX = 'scroll';
                    body.style.overflowY = 'scroll';
                });
            </script>";
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