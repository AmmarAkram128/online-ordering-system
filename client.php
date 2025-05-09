<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "finalproject");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['mail'];
    $password = $_POST['pass'];

    $sql = "SELECT * FROM clientlogin WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $resultPassword = $row['password'];

        if ($password === $resultPassword) {
            $_SESSION['email'] = $email;
            header("Location: order.php");
            exit();
        } else {
            echo "<script>alert('Incorrect password. Please try again.');</script>";
            echo "<script>window.location.href = 'login.html';</script>";
            exit();
        }
    } else {
        echo "<script>alert('User not found.');</script>";
        echo "<script>window.location.href = 'login.html';</script>";
    }
}
mysqli_close($conn);
