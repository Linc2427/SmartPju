<?php
$host = '203.175.9.41';
$user = 'smaw8666_root';
$pass = 'miqdad123';
$db = 'smaw8666_db_smartpju';
$conn=mysqli_connect($host, $user, $pass, $db);

if(!$conn){
    echo 'koneksi gagal'.mysqli_connect_error($conn);
}