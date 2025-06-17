<?php
include 'Database.php';
include 'User.php';

$db = (new Database())->getConnection();
$user = new User($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user->createUser($_POST['matric'], $_POST['name'], $_POST['password'], $_POST['role']);
    echo "User registered. <a href='display.php'>View Users</a>";
}