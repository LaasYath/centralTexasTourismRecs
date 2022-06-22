<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="sitemapStyle.css">
    <script type="module" src="sitemapFunctions.js"> </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> SITEMAP | Central Texas Tourism Reccomendations! </title>
</head>
<body>
    <!-- Menu Bar - Links -->
    <div class="menuButtons">
        <button type="button" id="homeButton" onmouseover="var logo = document.getElementById('homeLogo');
                                                            logo.src = 'darkWebLogo.png';" 
                                              onmouseout="var logo = document.getElementById('homeLogo');
                                                            logo.src='weblogo.png';"> 
        <a href="http://localhost:81/homeFiles/home.php"> <img id="homeLogo" src="webLogo.png" alt="Logo" width="35%" height="90%"> </a> </button>
        <button type="button" > <a href="http://localhost:81/browseFiles/browse.php"> ATTRACTIONS </a> </button>
        <button type="button"> <a href="http://localhost:81/hotelFiles/hotel.php"> HOTELS </a> </button>
        <button type="button"> <a href="http://localhost:81/contactFiles/contactForm.php"> CONTACT </a> </button>
        <button type="button"> <a href="http://127.0.0.1:5500/faqFiles/faq.html"> FAQ </a> </button>
        <form id="topSearch" action="/searchFiles/search.php" method="POST">
            <input title="Type Activity, Location, Price, Zipcode, Date, etc." id="search" type="text" name="searchBar" placeholder="Search...">
            <button id="submitSearch" type="submit" name="submitSearch"> &#128269 </button>
        </form>
    </div>

    <!-- Back to top button -->
    <a title="Back to Top" href="#homeLogo" class="top" id="top"> &uarr; </a>

    <!-- Heading -->
    <h2 id="heading"> Sitemap </h2>
    <div class="mapBlurb">
        <p> Located below are quick links to all the information posted on this website, sorted by page. </p>
    </div>

    <ul id="links">
        <li class="pageLinks"> <a href=”http://localhost:81/homeFiles/home.php”> Home Page </a>
            <li class="pageSect1"> <a href=”http://localhost:81/homeFiles/home.php#upcoming”> Upcoming Events </a> </li>
            <li class="pageSect1"> <a href=”http://locahost:81/homeFiles/home.php#explore”> Things to Explore </a>
                <li class="pageSect2"> <a href=”http://locahost:81/homeFiles/home.php#ans1”> History </a> </li>
                <li class="pageSect2"> <a href=”http://locahost:81/homeFiles/home.php#ans2”> Music</a> </li> 
                <li class="pageSect2"> <a href=”http://locahost:81/homeFiles/home.php#ans3”> Dining </a> </li> 
                <li class="pageSect2"> <a href=”http://locahost:81/homeFiles/home.php#ans4”> Family </a> </li> 
                <li class="pageSect2"> <a href=”http://locahost:81/homeFiles/home.php#ans5”> Shopping </a> </li> 
                <li class="pageSect2"> <a href=”http://locahost:81/homeFiles/home.php#ans3”> Outdoors </a> </li> 
            </li>
        </li>
        <li class="pageLinks"> <a href="http://localhost:81/browseFiles/browse.php"> Attractions Page </a>
            <li class="pageSect1"> Browse various activities and filter by price, category, location, and more!</li>
        </li>
        <li class="pageLinks"> <a href="http://localhost:81/hotelFiles/hotel.php"> Hotels Page </a>
            <li class="pageSect1"> Browse various hotels and filter by price, category, location, and more!</li>
        </li>
        <li class="pageLinks"> <a href="http://localhost:81/contactFiles/contact.php"> Contact Page </a>
            <li class="pageSect1"> Fill out our contact form with any questions and we will be back with you shortly! </li>
        </li>
        <li class="pageLinks"> <a href="http://127.0.0.1:5500/faqFiles/faq.php"> FAQ Page </a>
            <li class="pageSect1"> <a href="http://127.0.0.1:5500/faqFiles/faq.html#ans"> What's so special about Central Texas? </a> </li>
            <li class="pageSect1"> <a href="http://127.0.0.1:5500/faqFiles/faq.html#ans2"> How much does it cost to visit? </a> </li>
            <li class="pageSect1"> <a href="http://127.0.0.1:5500/faqFiles/faq.html#ans3"> Are there kid-friendly activities? </a> </li>
            <li class="pageSect1"> <a href="http://127.0.0.1:5500/faqFiles/faq.html#ans4"> What is the weather like? </a> </li>
            <li class="pageSect1"> <a href="http://127.0.0.1:5500/faqFiles/faq.html#ans5"> What does the city life look like? </a> </li>
            <li class="pageSect1"> <a href="http://127.0.0.1:5500/faqFiles/faq.html#ans6"> Are there any lakes or beaches? </a> </li>
        </li>
        <li class="pageLinks"> <a href="http://localhost:81/searchFiles/search.php"> Search Page </a>
            <li class="pageSect1"> Search for hotels, upcoming events, or attractions all in one place! </li>
        </li>
        <li class="pageLinks"> <a href="http://localhost:81/extra/about.php"> About Page </a>
            <li class="pageSect1"> <a href="http://localhost:81/extra/about.php#aboutSect"> About Site </a> </li>
            <li class="pageSect1"> <a href="http://localhost:81/extra/about.php#visitorSect"> Visitor Centers </a>
                <li class="pageSect2"> <a href="http://localhost:81/extra/about.php#aInfo"> Austin </a> </li>
                <li class="pageSect2"> <a href="http://localhost:81/extra/about.php#rrInfo"> Round Rock </a> </li> 
                <li class="pageSect2"> <a href="http://localhost:81/extra/about.php#gtInfo"> Georgetown </a> </li> 
            </li>
        </li>

        <li class="pageLinks"> <a href="http://localhost:81/extra/privacy.php"> Privacy Page </a>
            <li class="pageSect1"> <a href="http://localhost:81/extra/privacy.php?cookieUse"> Cookie Use </a> </li>
            <li class="pageSect1"> <a href="http://localhost:81/extra/privacy.php?contactSecurity"> Security </a> </li>
        </li>
    </ul>


    <!-- bottom bar, back to top button, and help nav bot -->
    <?php
        include "../footer.php";
    ?>
</body>
</html>