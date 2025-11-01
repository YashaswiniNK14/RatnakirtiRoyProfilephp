<?php
if (isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Optional: save to database
    /*
    $conn = new mysqli("localhost", "root", "", "faculty_db");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";
    $conn->query($sql);
    $conn->close();
    */

    // Redirect to show popup
    header("Location: contact.php?status=success");
    exit();
}

?>
    <?php include('footer.php');?>


