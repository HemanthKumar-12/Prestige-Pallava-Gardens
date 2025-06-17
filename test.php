<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = "localhost";
$dbname = "rapid7_vuln_db";  
$user = "postgres";
$password = "Hemanth@123";

$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$conn) {
  die("Connection failed: " . pg_last_error($conn));
}

$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];

$query = "INSERT INTO request (name, email, mobile) VALUES ($1, $2, $3)";
$result = pg_query_params($conn, $query, array($name, $email, $mobile));

if (!$result) {
  die("Error storing in DB: " . pg_last_error($conn));
}

echo "✅ Data saved successfully.";

pg_close($conn);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer files
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'h.hemanth.fabee@gmail.com';       // your Gmail
    $mail->Password   = 'tdat oijs qiyu mbsk';        
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom('yourgmail@gmail.com', 'Prestige Pallava Gardens');
    $mail->addAddress('h.hemanth.fabee@gmail.com');   // to email

    $mail->isHTML(true);
    $mail->Subject = 'New Enquiry Received';
    $mail->Body    = "
        <h3>New Enquiry</h3>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Mobile:</strong> $mobile</p>
    ";

    $mail->send();
    echo "<script>alert('Your enquiry was submitted and email sent.'); window.location.href='home.html';</script>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
