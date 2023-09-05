<?php

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "root";
    $db = "lab3";
    $port = "3307";

    $conn = mysqli_connect($host, $dbusername, $dbpassword, $db, $port);

    $username = $_POST['username'];
    $password = $_POST['password'];
    $count = 1;

    if (!$conn){
        die("Connection failed: ". mysqli_connect_error());
    }
    else {
        $query = mysqli_query($conn, "SELECT * FROM users WHERE user = '$username'");
        if (mysqli_num_rows($query)>0){
            $message = "User already registered!";
            echo $message;
        } else {
            mysqli_query($conn, "INSERT INTO users (user, password, count) VALUES ('$username', '$password', '$count')");
            $message = "Registered Successfully!";
            echo $message;
        }
    }

    mysqli_close($conn);
?>
