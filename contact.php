<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.html");
    exit;
}

$name = trim($_POST["name"] ?? "");
$email = trim($_POST["email"] ?? "");
$subject = trim($_POST["subject"] ?? "Website Inquiry");
$message = trim($_POST["message"] ?? "");

if ($name === "" || $email === "" || $message === "") {
    echo "Please complete all required fields.";
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Please enter a valid email address.";
    exit;
}

$to = "info@cappindustries.com";
$emailSubject = "New Website Inquiry: " . $subject;

$emailBody = "
Name: {$name}
Email: {$email}
Subject: {$subject}

Message:
{$message}
";

$headers = "From: {$email}\r\n";
$headers .= "Reply-To: {$email}\r\n";

if (mail($to, $emailSubject, $emailBody, $headers)) {
    echo "Thank you! Your message has been sent successfully.";
} else {
    echo "Message failed to send. Please try again.";
}
?>