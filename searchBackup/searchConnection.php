<?php

    // establishing/configuring connection
    $dbServerName = "localhost:3307";
    $dbUserName = "root";
    $dbPwd = "root";
    $dbName = "mysql";

    $conn = new mysqli($dbServerName, $dbUserName, $dbPwd, $dbName);

    // If error occurs, terminate connection
    if ($conn->connect_error) {
        die('Connect Error (' . $conn->connect_errno . ') '. $conn->connect_error);
    }

?>