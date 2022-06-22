<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="aboutStyle.css">
    <script type="module" src="aboutFunctions.js"> </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABOUT | Central Texas Tourism Reccomendations! </title>
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
    <h2 id="heading"> About </h2>
    <div class="aboutBlurb">
        <p> Here you can find information about this website and information regarding the visitor centers of Central Texas! </p>
    </div>

    <div class="content">

        <h3 id="aboutSect"> What we do: </h3>
        <p> This website is meant to make travelling easier. Our goal is to show you all the great things our area has to offer,
            including both beauty in the great outdoors and fun for all ages. We hope that you find activities you enjoy and that we 
            can aid you in planning your trip. We hope to see you soon!
        </p>

        <h3 id="visitorSect"> More Details: </h3>
    <a href="https://www.austintexas.org/plan-a-trip/visitor-center/"> <b> Austin Visitor Center Information: </b> </a> 
    <button type="button" id="aView" onClick="var viewButton = document.getElementById('aView');
                                var answer = document.getElementById('aInfo');
                                let compStyles = window.getComputedStyle(answer);
                                if (compStyles.display == 'none') {
                                    answer.style.display = 'block';
                                    viewButton.innerHTML = '-';
                                } else if (compStyles.display == 'block') {
                                    answer.style.display = 'none';
                                    viewButton.innerHTML = '+';
                                }" class="view"> + </button>
        <ul id="aInfo">
<pre>Physical Address:
    Austin Visitor Center: 
        602 E. Fourth St.
        Austin, TX 78701
    Visit Austin Admin: 
        111 Congress Avenue, Ste. 700
        Austin, TX 78701</pre>
    
<pre>Hours of Operation:
    Monday - Saturday: 9 am - 5 pm
    Sunday: 10 am - 5 pm </pre>

<pre>Contact: 
    Austin Visitor Center:
        (866) 462-8784
        (512) 478-0098
        tourdesk@visitaustin.org
    Visit Austin Admin:
        (800) 926-ACVB
        (512) 474-5171
        tourdesk@visitaustin.org</pre>
        </ul>
    
    <br>

    <a href="https://georgetown.org/2010/02/10/visitors-center/"> <b> Georgetown Visitor Center Information: </b> </a> 
    <button type="button" id="gtView" onClick="var viewButton = document.getElementById('gtView');
                                var answer = document.getElementById('gtInfo');
                                let compStyles = window.getComputedStyle(answer);
                                if (compStyles.display == 'none') {
                                    answer.style.display = 'block';
                                    viewButton.innerHTML = '-';
                                } else if (compStyles.display == 'block') {
                                    answer.style.display = 'none';
                                    viewButton.innerHTML = '+';
                                }" class="view"> + </button>
        <ul id="gtInfo">
<pre>Physical Address:
    Exit 261
    103 W. 7th Street
    Georgetown, Texas 78626 </pre>
<pre>Hours of Operation:
    Convention & Visitors Bureau:
        Mon – Fri: 8:00 a.m. – 5:00 p.m. 
    Visitor Information Center:
        Mon – Fri: 9:00 a.m. – 5:00 p.m.
        Sat: 9:00 a.m. – 5:00 p.m.
        Sun: 1:00 p.m. – 5:00 p.m. </pre>
<pre>Contact: 
    Convention & Visitors Bureau
        (512) 930-3545
        (512) 930-3697 (fax)
        cvb@georgetown.org </pre>
        </ul>
    
    <br>
    
    <a href="https://goroundrock.com/about-round-rock/round-rock-visitors-center/"> <b> Round Rock Visitor Center Information: </b> </a> 
    <button type="button" id="rrView" onClick=" var viewButton = document.getElementById('rrView');
                                var answer = document.getElementById('rrInfo');
                                let compStyles = window.getComputedStyle(answer);
                                if (compStyles.display == 'none') {
                                    answer.style.display = 'block';
                                    viewButton.innerHTML = '-';
                                } else if (compStyles.display == 'block') {
                                    answer.style.display = 'none';
                                    viewButton.innerHTML = '+';
                                }" class="view"> + </button>
        <ul id="rrInfo">
<pre>Physical Address:
    231 E. Main St Suite 150
    Round Rock, TX 78664 </pre>
<pre>Hours of Operation:
    Monday–Friday 8:00am-5:00pm </pre>
<pre>Contact: 
    512.218.7023 </pre>
        </ul>

    </div>

    <?php echo "<script type='text/JavaScript'>
            if (window.location.href.includes('#') == true) {
                console.log('saw id in url');
                var id = window.location.href.substr(36);
                console.log(id);
                var item = document.getElementById(id);
                item.style.display='block';
            }
        </script>";
    ?>

    <!-- bottom bar -->
    <?php
        // establishing connection
        include "../footer.php";
    ?>
</body>
</html>