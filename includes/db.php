<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'uidigitax_db';

$mysqli = new mysqli($host, $username, $password, $database);
if ($mysqli->connect_errno) {
    die('Database connection failed: ' . $mysqli->connect_error);
}

$createTable = "CREATE TABLE IF NOT EXISTS contact_submissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(120) NOT NULL,
    email VARCHAR(180) NOT NULL,
    phone VARCHAR(60) DEFAULT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
$mysqli->query($createTable);
