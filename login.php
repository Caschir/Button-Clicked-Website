<?php

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "root";
    $db = "lab3";
    $port = "3307";

    $conn = mysqli_connect($host, $dbusername, $dbpassword, $db, $port);

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!$conn){
        die("Connection failed: ". mysqli_connect_error());
    }
    else {
        $query = mysqli_query($conn, "SELECT * FROM users WHERE user = '$username' AND password = '$password'");
        if (mysqli_num_rows($query)>0){
            session_start();
            $_SESSION["username"] = $username;
            $sql = mysqli_query($conn, "SELECT count FROM users WHERE user = '$username'");
            $row = mysqli_fetch_assoc($query);
            $_SESSION['count'] = $row['count'];
            $message = "success";
            echo $message;
        } else {
            $message = "Invalid Credentials!";
            echo $message;
        }
    }

    mysqli_close($conn);
?>