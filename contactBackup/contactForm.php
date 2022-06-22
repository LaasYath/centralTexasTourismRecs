<?php
    session_start();

    if (!isset($_SESSION["faves"])) {
        $_SESSION["faves"] = array();
    }
    $faves = $_SESSION["faves"];
    // print_r($faves);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="formStyle.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script type="module" src="contactFuncs.js"> </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> CONTACT | Central Texas Tourism Reccomendations! </title>
</head>
<body>
    <!-- Meny Buttons (Link to Other Pages) -->
    <div class="menuButtons">
        <button type="button" onmouseover="var logo = document.getElementById('homeLogo');
                                        logo.src = 'darkWebLogo.png';" 
                              onmouseout="var logo = document.getElementById('homeLogo');
                                        logo.src='weblogo.png';"> 
        <a href="http://localhost:81/homeFiles/home.php"> <img id="homeLogo" src="webLogo.png" alt="Logo" width="35%" height="90%"> </a> </button>
        <button type="button"> <a href="http://localhost:81/browseFiles/browse.php"> ATTRACTIONS </a> </button>
        <button type="button"> <a href="http://localhost:81/hotelFiles/hotel.php"> HOTELS </a> </button>
		<button type="button" id="pageButton"> <a href="http://localhost:81/contactFiles/contactForm.php"> CONTACT </a> </button>
        <button type="button"> <a href="http://127.0.0.1:5500/faqFiles/faq.html"> FAQ </a> </button>
        <form id="topSearch" action="/searchFiles/search.php" method="POST">
            <input title="Type Activity, Location, Price, Zipcode, Date, etc." id="search" type="text"  name="searchBar" placeholder="Search...">
            <button  id="submitSearch" type="submit" name="submitSearch"> &#128269 </button>
        </form>
    </div>

    <!-- Back to top button -->
    <a title="Back to Top" href="#pageButton" class="top" id="top"> &uarr; </a>

    <!-- Heading -->
    <h2 id="heading"> Contact </h2>
    <div class="contactBlurb">
        <p> Please fill out this form if you have any questions or comments and someone on our team will get back to your shortly!</p>
        <p id="required"> <b> * </b> Required </p>
    </div>

    <!-- Email Form -->
    <div class="emailForm">
        <p id="formName"> SEND E-MAIL </p>
        <form class="contact-form" action="contactForm.php" method="post">
            <div class="inputFields">
                <input id="userName" type="text" name="name" placeholder="Name"> <p class="asterisk"> <b> * </b> </p>
                <br>
                <input id="address" type="text" name="mail" placeholder="Your email"> <p class="asterisk"> <b>*</b> </p>
                <br>
                <input id="subject" type="text" name="subject" placeholder="Subject"> <p class="asterisk"> <b>*</b> </p>
            </div>
            <textarea name="message" placeholder="Message" id="emailMessage"></textarea> <p class="asterisk"> <b>*</b> </p>
            <br>
            <button id="subForm" type="submit" name="submit"> SEND MAIL </button>
        </form>
        <?php 
            // cleanData($data) created formatted version of parameter, devoid of possible scripting hacks
            // $data - String (user input)
            // return{String} - returns a string
            function cleanData($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            if(isset($_POST['submit'])) {
                // Obtains user input - cleanData() returns corresponding user input
                $name = cleanData($_POST['name']);
                $subject = cleanData($_POST['subject']);
                $message = cleanData($_POST['message']);
                $mailFrom = cleanData($_POST['mail']);

                if($_POST['name'] != "" && $_POST['subject'] != "" && $_POST['mail'] != "" && $_POST['message'] != "") {
                    if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))  {

                        // Email Template
                        $mailTo = "yathlaas@gmail.com";
                        $headers = "From: " . $mailFrom  . "\r\n" . "CC: yathlaas@gmail.com";
                        $txt = "You have received an email from " . $name . ".\n\n" . $message;

                        // Sends Email
                        mail($mailTo, $subject, $txt, $headers);

                        // Changes URL
                        $mailFrom = $headers = $txt = $name = $subject = $message = "";
                        echo "Mail Sent!";
                    } else {
                        echo '<script type="text/javascript">
                            var name = document.getElementById("userName");
                            name.value = "' . $name . '";

                            var email = document.getElementById("address");
                            email.value = "' . $mailFrom . '";

                            var sub = document.getElementById("subject");
                            sub.value = "' . $subject . '";

                            var message = document.getElementById("emailMessage");
                            message.value = "' . $message . '";
                        </script>';
                        echo "Please enter a valid email address";
                    }
                } else {
                    echo '<script type="text/javascript">
                        var name = document.getElementById("userName");
                        name.value = "' . $name . '";

                        var email = document.getElementById("address");
                        email.value = "' . $mailFrom . '";

                        var sub = document.getElementById("subject");
                        sub.value = "' . $subject . '";

                        var message = document.getElementById("emailMessage");
                        message.value = "' . $message . '";
                    </script>';
                    echo "Please fill out all required fields.";
                }
            }
        ?>
    </div>

    <br>
    <br>
    <br>
    <hr>

    <!-- bottom bar -->
    <?php
        // bottom bar, navigation bot
        include "../footer.php";
    ?>
</body>
</html>