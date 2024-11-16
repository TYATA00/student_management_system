<?php
include 'db.php';
include 'auth.php';

if (!isLoggedIn()) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $class = $_POST['class'];
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO students (name, email, class, user_id) VALUES ('$name', '$email', '$class', $user_id)";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>