<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> CONTACT | Central Texas Tourism Reccomendations! </title>
    <link rel="stylesheet" href="formStyle.css">
</head>
<body>
    <!-- Meny Buttons (Link to Other Pages) -->
    <div class="menuButtons">
        <button type="button"> <a href="http://localhost:5500/homeFiles/home.html"> HOME </a> </button>
        <button type="button"> <a href="http://localhost:81/browseFiles/browse.php"> ATTRACTIONS </a> </button>
		<button type="button" id="pageButton"> <a href="http://localhost:81/contactFiles/contactForm.php"> CONTACT </a> </button>
        <button type="button"> <a href="http://localhost:5500/faqFiles/faq.html"> FAQ </a> </button>
    </div>

    <!-- Heading -->
    <h2 id="heading"> Contact </h2>
    <div class="contactBlurb">
        <p> Please fill out this form if you have any questions or comments and someone on our team will get back to your shortly!</p>
        <br>
        <p id="required"> <b> * </b> Required </p>
    </div>

    <!-- Email Form -->
    <div class="emailForm">
        <p id="formName"> SEND E-MAIL </p>
        <form class="contact-form" action="contactForm2.php" method="post">
            <div class="inputFields">
                <input type="text" name="name" placeholder="Name"> <p> <b>*</b> </p>
                <br>
                <input type="text" name="mail" placeholder="Your email"> <p> <b>*</b> </p>
                <br>
                <input type="text" name="subject" placeholder="Subject"> <p> <b>*</b> </p>
            </div>
            <textarea name="message" placeholder="Message" id="emailMessage"></textarea> <p> <b>*</b> </p>
            <br>
            <button type="submit" name="submit"> SEND MAIL </button>
        </form>

        <!-- Email Sent Confirmation & Error Messages-->
        <p> 
			<?php 
				if ($_SERVER['REQUEST_URI'] == "/contactFiles/contactForm.php?mailsent") {
					echo "Mail Sent!";
				} else if ($_SERVER['REQUEST_URI'] == "/contactFiles/contactForm.php?errorRequired") {
					echo "Please fill out all required fields before submitting";
				} else if ($_SERVER['REQUEST_URI'] == "/contactFiles/contactForm.php?errorChars") {
					echo "Name accepts letters and whitespace characters only.";
				} else if ($_SERVER['REQUEST_URI'] == "/contactFiles/contactForm.php?errorEmail") {
					echo "Please enter a valid email.";
				}
            ?> 
        </p>
    </div>
</body>
</html>