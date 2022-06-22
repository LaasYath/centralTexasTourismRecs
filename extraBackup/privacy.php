<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="privacyStyle.css">
    <script type="module" src="privacyFunctions.js"> </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> PRIVACY | Central Texas Tourism Reccomendations! </title>
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
    <h2 id="heading"> Privacy Policy </h2>
    <div class="privacyBlurb">
        <p> Central Texas Tourism Recommendations! Privacy Policy (Created by Laasya Yatham. &copy 2022 Laasya Yatham. All Rights Reserved.) </p>
        <p> Last Updated: 06/22/2022 </p>
    </div>

    <div id="policy">
        <h3> Common Terms and Definitions </h3>
        <ul>
            <li> User Data: Any information that is stored long term as a result of an action or input from the user. </li>
            <li> Personal Data: Data revealing personal information about the user, including their name and email. </li>
            <li> External Sites: Any websites without the domain of <i> http://localhost:81 </i> and <i> http://127.0.0.1:5500 </i> </li>
        </ul>

        <h3 id="cookieUse"> Data Being Collected & What We Use It For </h3>
        <ul> 
            <li> We don’t collect any of your personal data without your consent. Our site is made so that anyone, anywhere, can access our content without the extra hassle of logging in. </li>
            <li> If you choose to fill out the contact form, your name, email, subject, and message input will be sent as an email to our team. That information remains on our server from anywhere from one day to two weeks. We do not share or provide this information with any external third parties. </li>
            <li> We solely use functionality cookies. Accepting the use of cookies also allows us to collect user data, but we do not collect any of your personal information. We use cookies to hide the popup/splash image on the home page when entering the website. We also use sessions, or long term cookies, to remember your favorite attractions. If you opt out, both of these features will be turned off. </li>
        </ul>

        <h3 id="contactSecurity"> Contact Form Security </h3>
        <ul>
            <li> As stated before, if you choose to fill out the contact form, your input will be stored in our servers for a limited period of time (the maximum amount being two weeks).  </li>
            <li> We process your data securely. Our source code, or background code of the website, that can normally be viewed in the browser, has been encrypted to protect your data from malicious hackers. </li>
            <li> We use <a href="https://en.wikipedia.org/wiki/Simple_Mail_Transfer_Protocol" target="_blank"> <u> Secure Mail Transfer Protocol </u> </a> and <a href="https://www.hmailserver.com/" target="_blank"> <u> hMailServer </u> </a> to send and receive all messages safely. </li>
            <li>We also do our best to prevent our website from potential hackers with functions to scan data for malicious code and either replace or delete anything that could potentially harm us or our users. </li>
        </ul>

        <h3> Third Parties </h3>
        <ul>
            <li> We do not have any integrations or social buttons (third party apps) embedded within our site. No third parties will have access to your information.  </li>
            <li> Our website does contain numerous external websites. As these sites are governed by the privacy policy of third parties, we do not have any jurisdiction over the use of cookies in external sites and will not be held accountable for any ill actions that occur outside of our web domain. We do not encourage or endorse any of the content represented on the external sites unless otherwise stated. </li>
        </ul>

        <h3> User Rights </h3>
        <ul>
            <li> Users have the ability to opt out of the use of cookies and sessions on our popup/splash page located on the home page. If you would like to delete previously existing cookie information, users can delete information stored in our cookies and sessions in their own browser. </li>
            <li> If users would like to clear their contact information from our servers, they can include that in the contact email or reach out to our staff directly at <u> yathlaas@gmail.com </u> </li>
        </ul>

        <h3> Policy Updates </h3>
        <ul>
            <li> If there has been an update to our privacy policy, the prior version will still be available and linked to this page. We will clear all cookies, sessions, and emails on our server. The following time the user visits the page, they will be asked to give consent to our potentially new cookie uses and privacy policy. </li>
        </ul>
    </div>

    

    <!-- bottom bar, back to top button, and help nav bot -->
    <?php
        echo $_SERVER["REQUEST_URI"];
        if ($_SERVER["REQUEST_URI"] == "/extra/privacy.php?contactSecurity") {
            echo '<script type="text/JavaScript">
                var item2 = document.getElementById("contactSecurity");
                console.log(item2);
                item2.style.backgroundColor = "yellow";
            </script>';
        } else if ($_SERVER["REQUEST_URI"] == "/extra/privacy.php?cookieUse") {
            echo '<script type="text/JavaScript">
                var item = document.getElementById("cookieUse");
                console.log(item);
                item.style.backgroundColor = "yellow";
            </script>';
        }
        include "../footer.php";
    ?>
</body>
</html>