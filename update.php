<?php
include 'Database.php';
include 'User.php';

$db = (new Database())->getConnection();
$user = new User($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user->updateUser($_POST['matric'], $_POST['name'], $_POST['role']);
    header("Location: display.php");
    exit();
}