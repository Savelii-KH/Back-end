<?php
    $subject = 'MY TEST EMAIL';
    echo '============' . "\n";
    echo $subject . "\n";
    echo '============' . "\n";
    $firstName = 'Savielii';
    $secondName = 'Khizhnikov';
    $text1 = "firstName : {$firstName}" . "\n";
    $text2 = "secondName : {$secondName}" . "\n";

    $value1 = pow(20, 1/3);
    $value2 = pow(158, 2);

    $result1 = round($value1 + $value2, 2);

    $text3 = "20^1/3 + 158^2 = {$result1}" . "\n";

    $message = $text1 . $text2 . $text3;
    echo $message;
    $headers = 'From: s.i.khizhnikov@student.khai.edu';
    mail('igorkhizhnikov@gmail.com', $subject, $message, $headers);
