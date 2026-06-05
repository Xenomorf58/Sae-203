<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("C'est la mierda: " . $conn->connect_error);
}

//check du mdp et username
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM comptes WHERE username = '$username'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

if ($user && $password === $user['password']) {
    header("Location: https://angusnicneven.com/");
    exit;
} else {
    echo "Identifiants incorrects";
}

?>