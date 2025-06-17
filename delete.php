<?php
include 'Database.php';
include 'User.php';

$db = (new Database())->getConnection();
$user = new User($db);

if (isset($_GET['matric'])) {
    $user->deleteUser($_GET['matric']);
    header("Location: display.php");
    exit();
}