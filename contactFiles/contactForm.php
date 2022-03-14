<?php

    // Contact Form information
    $usersName = $_POST['name'];
    $usersEmail = $_POST['userEmail'];
    $message = $_POST['message'];
    
    echo $usersName . "</br>";
    echo $usersEmail . "</br>";
    echo $message . "</br>";

?>