<?php
require_once __DIR__ . '/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../pages/contact.php');
    exit;
}

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$message = trim($_POST['message'] ?? '');

if (empty($name) || empty($email) || empty($message)) {
    header('Location: ../pages/contact.php?status=error');
    exit;
}

$stmt = $mysqli->prepare('INSERT INTO contact_submissions (name, email, phone, message) VALUES (?, ?, ?, ?)');
$stmt->bind_param('ssss', $name, $email, $phone, $message);
$stmt->execute();
$stmt->close();

$to = 'contact@uidigitax.com';
$subject = 'New inquiry from UIDIGITAX website';
$body = "Name: $name\nEmail: $email\nPhone: $phone\n\nMessage:\n$message\n";
$headers = "From: $email\r\nReply-To: $email\r\n";
@mail($to, $subject, $body, $headers);

header('Location: ../pages/contact.php?status=success');
exit;
