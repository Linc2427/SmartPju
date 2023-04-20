<?php

include ("koneksi.php");

function db_smartpju($data) {
    global $conn;

    $username = mysqli_real_escape_string($conn, $data["username"]);
    $email = strtolower(stripslashes($data["email"]));
    $password = mysqli_escape_string($conn, $data["pass"]);

    mysqli_query($conn, "INSERT INTO `register` (`username`, `email`, `password`) 
    VALUES ('$username', '$email', '$password');");

    return mysqli_affected_rows($conn);
}

?>