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

    // Checks if submit has been clicked
    if(isset($_POST['submit'])) {

        // Checks if all required fields are filled out
        if($_POST['name'] != "" && $_POST['subject'] != "" && $_POST['mail'] != "" && $_POST['message'] != "") {
            
            // Obtains user input - cleanData() returns corresponding user input
            $name = cleanData($_POST['name']);
            $subject = cleanData($_POST['subject']);
            $message = cleanData($_POST['message']);

            // Checks for legitimacy of email
            if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
                header("Location: contactForm.php?errorEmail");
                
            } else {
                $mailFrom = cleanData($_POST['mail']);

                // Email Template
                $mailTo = "sandhya_yatham@yahoo.com";
                $headers = "From: " . $mailFrom;
                $txt = "You have received an email from " . $name . ".\n\n" . $message;

                // Sends Email
                mail($mailTo, $subject, $txt, $headers);

                // Changes URL
                header("Location: contactForm.php?mailsent");
            }
        }
        else {
            header("Location: contactForm.php?errorRequired");
        }
    }
?>