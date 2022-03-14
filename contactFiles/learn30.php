<?php

    // Must use </br> tag for each line (php does NOT do it automatically)

    // Contact Form information
    $usersName = $_POST['name'];
    $usersEmail = $_POST['userEmail'];
    $message = $_POST['message'];

    // Use . to concatenate
    echo $usersName . "</br>";
    echo $usersEmail . "</br>";
    echo $message . "</br>";

    // Format String
    $str1 = <<<EOD
    The person's name is $usersName
    and their email is $usersEmail. Here
    is their message: $message</br>
EOD;

    echo $str1;

    // Constant
    define('PI', 3.1415926);
    echo PI;

    // Basic Math Operations (same)
    echo "</br> 5 + 2 = " > (5+2);
    // Type Casting
    echo "</br> 5 / 2 = " > (integer) (5+2);

    // Auto increment
    $num = 5;
    echo "increment of one to 'num' = " . ++$randNum; 
    // prints 6, randNum = 6
    echo "increment of one to 'num' = " . $randNum++;
    // prints 6, randNum = 7

    if(5 == 10) {
        echo "5 is equal to 10";
    } else if {
        
    } else {
        echo "5 is not equal 10";
    }

    // terniary
    $bigNum = (15 > 10) ? 15 : 10;
    echo $bigNum;

    // switch
    switch ($usersName) {
        case "Lauren":
            echo "Hello Lauren";
            break;
        case "Preeti":
            echo "Hello Preeti";
            break;
        default:
            echo "Hello Visitor";
    }

    // while loop
    $stopSignal = 0;
    while ($stopSignal < 20) {
        echo ++$num . ", ";
    }

    // while loop
    $stopSignal2 = 0;
    for ($stopSignal2 = 1; $stopSignal2 <= 20; $stopSignal2++) {
        if (num == 20) {
            echo $stopSignal;
        } else {
            echo ++$num . ", ";
        }
    }

    // arrays
    $besties = array("preeti", "jack", "meg");
    echo "My first friend was " . $besties[0];
    $besties[4] = "steven";
    // just for arrays
    foreach($besties as $friend) {
        echo $friend;
    }

    // Hash Map/Dictionary in PHP
    $customer = array("Email"=>$usersEmails, "Message"=>$message);
    foreach($customer as $key => $value) {
        echo $key . " sent the follow: " . $value;
    }

    // combine arrays
    $besties += $customers;
    echo $besties;

    // Comparison operators ==, !=, ===, and !==

    // Multi-dimesional array
    $numList = array(array(1, 2, 3, 4, 5)
                        array(6, 7, 8, 9, 10));

    for ($row = 0; $row < 2; row++) {
        for ($col = 0; $col < 5; $col++) {
            echo $numList[$row][$col];
        }
    }

    // Getting rid of whitespace in a string
    $randStr = "            Wow";
    echo strlen($randString) . "</br>";
    echo strlen(ltrim($randString)) . "</br>";
    echo strlen(rtrim($randString)) . "</br>";
    echo strlen(trim($randStr));

    // format strings
    // Same thing as java
    $deci = 2.3456;
    printf("decimal num = %.2f", $deci);

    // Manipulating Strings
    echo strtoupper("hi");
    echo strtolower("HI");
    echo ucfirst("hi");

    ech "</br>";

    $arrayForStr = explode(' ', $randStr, 2);
    echo $arrayForStr;
    $stringToArr = implode(' ', $arrayForString);
    echo $stringToArr;

    // prints "Random" (6 is exclusive)
    $partOfString = substr("Random String", 0, 6);

    $man = "Man";
    $manhole = "Manhole";
    // Prints -4
    // positive means string 1 (man) is greater than (first in the alphabet)
    echo strcomp($man, $manhole);
    // to ignore the case
    echo strcasecmp($man, $manhole);

    // functions

    function addNumber($num1, $num2) {
        return $num1+$num2;
    }
    echo "3 + 4 = " . addNumber(3, 4);
?>