<?php
include 'db.php';
include 'auth.php';

if (!isLoggedIn()) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $class = $_POST ['class'];

    $sql = "UPDATE students SET name='$name', email='$email', class='$class' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM students WHERE id=$id";
    $result = $conn->query($sql);
    $student = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Update Student</h1>
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?php echo $student['id']; ?>">
        <input type="text" name="name" value="<?php echo $student['name']; ?>" required>
        <input type="email" name="email" value="<?php echo $student['email']; ?>" required>
        <input type="text" name="class" value="<?php echo $student['class']; ?>" required>
        <input type="submit" value="Update Student">
    </form>
</body>
</html>