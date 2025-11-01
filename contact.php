
<?php 
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// require 'PHPMailer/src/Exception.php';
// require 'PHPMailer/src/PHPMailer.php';
// require 'PHPMailer/src/SMTP.php';

require __DIR__ . '/PHPMailer-master/PHPMailer-master/src/Exception.php';
require __DIR__ . '/PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
require __DIR__ . '/PHPMailer-master/PHPMailer-master/src/SMTP.php';

$success = false;
$error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';           // Gmail SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'nkyashaswini86@gmail.com';      // Your Gmail address
        $mail->Password   = 'dgtz wypf duzi jibo';        // Your App Password from step 2
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('rroy.nitdgp@gmail.com', 'Faculty'); // Faculty email

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Message from Your Profile Website';
        $mail->Body    = "
            <h3>You received a new message</h3>
            <p><strong>Name:</strong> {$name}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Message:</strong><br>{$message}</p>
        ";

        $mail->send();
        $success = true;
    } catch (Exception $e) {
        $error = true;
        $debugMsg = $mail->ErrorInfo;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Me</title>

<style>
body {
    background-color: #0a0a0a;
    color: #e0e0e0;
    font-family: "Segoe UI", sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}
.contact-container {
    background-color: #121212;
    padding: 30px;
    border-radius: 15px;
    width: 400px;
    box-shadow: 0 0 20px rgba(0, 123, 255, 0.4);
}
h2 {
    text-align: center;
    color: #4da3ff;
    margin-bottom: 25px;
}
input, textarea {
    width: 100%;
    padding: 10px;
    margin: 8px 0 15px 0;
    border: none;
    border-radius: 8px;
    background-color: #1c1c1c;
    color: #e0e0e0;
    font-size: 15px;
    outline: none;
}
input:focus, textarea:focus {
    box-shadow: 0 0 8px #007bff;
}
button {
    width: 100%;
    background-color: #007bff;
    border: none;
    padding: 12px;
    border-radius: 8px;
    color: white;
    font-size: 16px;
    cursor: pointer;
    transition: 0.3s;
}
button:hover {
    background-color: #0056b3;
}
</style>
</head>
<body>
<div class="contact-container">
    <h2>Contact Me</h2>
    <form method="POST" action="">
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
        <button type="submit">Send Message</button>
    </form>
</div>

<?php if ($success): ?>
<script>alert("✅ Message sent successfully! Thank you for contacting the faculty.");</script>
<?php elseif ($error): ?>
<script>alert("❌ Failed to send message. Check your Gmail SMTP settings or App Password.");</script>
<?php endif; ?>


  <?php include('footer.php');?>
</body>
</html>
