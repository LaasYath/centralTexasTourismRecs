<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <script src="bot.js"></script> -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Help Bot -->
    <div class="bot">
        <button title="Navigation Help Bot" id="openBot" type="button"> <img id="robotImg" src="../robot.svg"> <br> </button>
        <div id="round0">
            <h4 id="set0"> Hi! This is the Navigation Help Bot! What are you looking for today? </h4>            
            <p id="set01"> Things to Do </p>
            <p id="set02"> Visitor Information </p>
            <p id="set03"> Privacy/Cookies </p>
            <a id="set04" href="../extra/sitemap.php"> Other </a>
        </div>
        <div id="round01">
            <h4 id="set1"> Any preferences? </h4>
            <a id="set11" href="http://localhost:81/browseFiles/browse.php?dining"> Dining </a>
            <br>
            <br>
            <a id="set12" href="http://localhost:81/browseFiles/browse.php?music"> Music </a>
            <br>
            <br>
            <a id="set13" href="../homeFiles/home.php#upcoming"> Upcoming Events </a>
            <br>
            <br>
            <a id="set14" href="../extra/sitemap.php"> Other </a>
        </div>
        <div id="round02">
            <h4 id="set2"> Any of these what you're looking for? </h4>
            <a id="set21" href="../extra/about.php"> Visitor Centers </a>
            <br>
            <br>
            <a id="set22" href="http://127.0.0.1:5500/faqFiles/faq.html?weather"> Weather, </a>
            <a href="http://127.0.0.1:5500/faqFiles/faq.html?cost"> cost, </a> 
            <a href="http://127.0.0.1:5500/faqFiles/faq.html"> etc. </a>
            <br>
            <br>
            <a id="set23" href="../extra/sitemap.php"> Other </a>
        </div>
        <div id="round03">
            <h4 id="set3"> Any of these what you're looking for? </h4>
            <a id="set31" href="../extra/privacy.php"> Privacy Policy </a>
            <br>
            <br>
            <a id="set32" href="../extra/privacy.php?cookieUse"> Cookie Use </a>
            <br>
            <br>
            <a id="set33" href="../extra/privacy.php?contactSecurity"> Contact Form Security </a>
            <br>
            <br>
            <a id="set34" href="../extra/sitemap.php"> Other </a>
        </div>
    </div>

    <!-- Bottom Bar -->
    <div id="bottomBar">
            <div class="bottomBar1">
                <div id="bottomLogo" class="barSect">
                    <img width="100%" src="webLogo.png" alt="Logo">
                </div>
                <div id="helpLinks" class="barSect">
                    <button type="button" id="third"> <a href="http://localhost:81/extra/about.php"> About </a> </button>
                    <br>
                    <button type="button" id="second"> <a href="http://localhost:81/extra/sitemap.php"> Sitemap </a> </button>
                    <br>
                    <button type="button" id="first"> <a href="http://localhost:81/extra/privacy.php"> Privacy Policy </a> </button>
                </div>
            </div>
            <div class="bottomBar2">
                <p> Created by Laasya Yatham </p>
                <p> &copy 2022 Laasya Yatham. All rights reserved. </p>
                <p> This website is not affiliated, associated, authorized, endorsed by, or in any way officially connected with the local authorities and government of Texas or any of its subsidiaries or its affiliates. Related names, marks, emblems and images are registered trademarks of their respective owners. </p>
            </div>
            
    </div>
</body>
</html>