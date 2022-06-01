<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="homeStyle.css">
    <script src="homeFunctions.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> HOME | Central Texas Tourism Reccomendations!</title>
</head>
<body id="body">
    <!-- Menu Bar Buttons (Links to other pages) -->
    <div class="menuButtons">
        <button onmouseover="changeBg(this)" onmouseout="changeBgBack(this)" type="button" id="pageButton"> <a href="http://localhost:5500/homeFiles/home.html"> <img id="homeLogo" src="darkWebLogo.png" alt="Logo"> </a> </button>
        <button onmouseover="changeBg(this)" onmouseout="changeBgBack(this)" type="button"> <a href="http://localhost:81/browseFiles/browse.php"> ATTRACTIONS </a> </button>
        <button onmouseover="changeBg(this)" onmouseout="changeBgBack(this)" type="button"> <a href="http://localhost:81/hotelFiles/hotel.php"> PLACES TO STAY </a> </button>
        <button onmouseover="changeBg(this)" onmouseout="changeBgBack(this)" type="button"> <a href="http://localhost:81/contactFiles/contactForm.php"> CONTACT </a> </button>
        <button onmouseover="changeBg(this)" onmouseout="changeBgBack(this)" type="button"> <a href="http://localhost:5500/faqFiles/faq.html"> FAQ </a> </button>
    </div>

    <!-- About Texas, Endorsing the Website -->
    <div id="blurb">
        <!-- Blurb about website -->
        <h1 id="title"> Welcome to Central Texas! </h1>
        <p id="aboutBlurb"> This is your one stop site for finding fun things to do in Central Texas! 
            Find a variety of different attractions, from museums to rodeos, all right here! You can 
            even filter by price, location, and distance! Get started by heading over to our 
            <a id="blurbLink" href="http://localhost:81/browse.php"> attractions</a> page!
        </p>
    </div>

    <div class="sectTitles">
        <h2> Upcoming Events </h2>
    </div>

    <div class="shading">
    <?php
        echo "hi";
    ?>
    </div>

    <div class="sectTitles">
        <h2> Things To Explore </h2>
    </div>

    <div class="shading">
        <!-- Blurbs Contain image, title, and quick description of category-->
        <!-- History Blurb -->
        <div onmouseover="changeTxt(this)" onmouseout="changeTxtBack(this)"  class="topics">
            <img id="histImg" class="topicImgs" src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/df/TexasStateCapitol-2010-01.JPG/1200px-TexasStateCapitol-2010-01.JPG?20100821134114">
            <!-- <canvas id="histCanvas"> </canvas> -->
            <h4 id="histTitle" class="titles">  History </h4>
            <p class="descrips"> From the Mexican Revolution, to where we are today, Central Texas is embedded with history. Find a variety of museums commemorating heroes and artists, and stop by the Texas State Capitol in Austin! </p>
        </div>

        <!-- Music Blurb -->
        <div onmouseover="changeTxt(this)" onmouseout="changeTxtBack(this)"  class="topics">
            <img id="musicImg" class="topicImgs"src="https://austinpartybusrental.com/wp-content/uploads/2021/08/acl-live-feature-edited.jpg">
            <!-- <canvas id="musicCanvas"> </canvas> -->
            <h4 id="musicTitle" class="titles">  Music </h4>
            <p class="descrips"> Austin is the live music capitol of the world so be ready for some crazy concerts! </p>
        </div>

        <!-- Fun Blurb -->
        <div onmouseover="changeTxt(this)" onmouseout="changeTxtBack(this)"  class="topics">
            <img id="funImg" class="topicImgs" src="https://upload.wikimedia.org/wikipedia/commons/7/74/GeorgetownParksBH.jpg?20110219135358">
            <!-- <canvas id="musicCanvas"> </canvas> -->
            <h4 id="funTitle" class="titles">  Fun </h4>
            <p class="descrips"> Strap in for some fun at one of Central Texas' many parks! Go kayaking, fishing, or swimming with the whole family!</p>
        </div> 
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
        <img id="popupTexas"src="https://www.maxpixel.net/static/photo/2x/United-States-America-State-Geography-Map-Texas-43792.png">
        <!-- Exit Button -->
        <input id="popupX" type="button" value="&#x2715" onClick="hidePopup()">
    </div>
</body>
</html>