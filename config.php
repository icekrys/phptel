<?php
// Read environment variables from Coolify
$host = getenv('DB_HOST') ?: 'localhost';
$username = getenv('DB_USERNAME') ?: 'root';
$password = getenv('DB_PASSWORD') ?: '';
$database = getenv('DB_DATABASE') ?: 'questel';
$port = getenv('DB_PORT') ?: 3306;

// Create connection
$con = mysqli_connect($host, $username, $password, $database, $port);

if(!$con){
    die("Connection failed: " . mysqli_connect_error());
}

// Optional: Debug info (remove in production)
echo "Connected to host: $host, database: $database, user: $username";
?>