<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "finalproject");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['txt']);
    $phone = mysqli_real_escape_string($conn, $_POST['Number']);
    $address = mysqli_real_escape_string($conn, $_POST['Add']);
    $mail = mysqli_real_escape_string($conn, $_POST['mail']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);

    $sql = "INSERT INTO clientlogin (username, telephoneNo, address, email, password) 
            VALUES ('$name', '$phone', '$address', '$mail', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('User created successfully!');</script>";
        echo "<script>window.location.href = 'login.html';</script>";
        exit();
    } else {
        echo "<p style='color:red;'>Error: " . mysqli_error($conn) . "</p>";
        echo "<script>alert('Database error');</script>";
        echo "<script>window.location.href = 'login.html';</script>";
        exit();
    }
}

mysqli_close($conn);
