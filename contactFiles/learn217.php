<?php

    // get = bookmark
    // post = sending data to a servier

    if(isset($_GET) && array_key_exists('name', $_GET)) {
        $name = $_GET['name'];
        if(isset($name) && !(empty($name))) {
            echo "Your name is " . $name . "<br>";
        }
        if (count($_GET) >= 3) {
            $num1 = $_GET['num'];
            echo "Number * 2 = " . $num1;
        }
    }

    // Only runs once
    $i = 0;
    do {
        echo "Ran through " . $i . " times";
    } while ($i > 0)

    $numList = [1,2,3,4];
    print_r($numList);
    // multiplies every value by every other value
    function mlt($x, $y) {
        return ($x *= y);
    }
    // 1 is default first value
    $prod = array_reduce($list, 'mlt', 1);
    print_r($dbl_list);
    
    // timezones
    date_default_timezone_set('America/New_York');
    ech "Date : " . date('I F m-d-Y g:i:s A') . "<br>";
    $impor_date = mktime(0, 0, 0, 12, 21, 1974);
    echo "Important Date: " . date('I F m-d-y g:i:s A', $impor_date) . "<br>";

    // exception handling
    function bad($num7) {
        if($num7 == 0) {
            throw new Exception("You can't divide by zero");
        }
        return $calc = 100/$num;
    }
    try {
        bad(0);
    } catch (Exception $e) {
        echo "Exception : " . $e->getMessage();
    }

    // working w/ databases and user data (using form from contact.html - added a number feature)
    // basic sanitation

    // check is email is declared
    if(isset($_POST["email"])) {
        // if post information under name "email" is NOT valid
        if(!(filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)) {
            echo "Email isn't valid <br>";
        } else {
            echo "Email is valid <br>";
        }
    }

    // 2 ways of check if the number has been declared/initialized
    if(isset($_POST["num"]) && !empty($_POST["num"])) {
        // sanitize (make sure the thing inputted is changed into a number)
        $num = filter_input(INPUT_POST, "num", FILTER_SANITIZE_NUMBER_FLOAT,
        FILTER_FLAG_ALLOW_FRACTION);
        $output = sprintf("%.1f" . "<br>", $num);
        // get rid of special characters
        echo htmlspecialchars($output) . "<br>";
    }
    // check if there is a valid url
    if (isset($_POST["website"])) {
        $web = filter_input(INPUT_POST, "website", FILTER_VALIDATE_URL);
        echo "website : " . htmlspecialchars($web) . "<br>";
    }

    // Dealing with links
    $con = '<a href="#"> Sample </a>';
    echo $con . "<br>";
    echo htmlspecialchars($con) . "<br>";
    echo strip_tags($con, "<a>") . "<br>";
    $con = strip_tags($con) . "<br>";















?>