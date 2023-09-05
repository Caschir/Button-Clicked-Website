<?php

    session_start();
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "root";
    $db = "lab3";
    $port = "3307";

    $conn = mysqli_connect($host, $dbusername, $dbpassword, $db, $port);

    if (!$conn){
        die("Connection failed: ". mysqli_connect_error());
    }

    $username = $_SESSION['username'];
    $count = $_SESSION['count'];

    echo "$username ";
    echo "$count ";

    $data = "";

    if(isset($_POST['update'])) {
        $query = "UPDATE users SET count = count + 1 WHERE user = '$username'";
        mysqli_query($conn, $query);
        $query2 = mysqli_query($conn, "SELECT count FROM users WHERE user = '$username'");
        $row = mysqli_fetch_assoc($query2);
        $data = $row['count'];
        echo $data;
    }

    if(isset($_POST['logout'])){
       session_destroy();
    }

    mysqli_close($conn);
?>

