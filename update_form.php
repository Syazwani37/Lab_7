<?php
include 'Database.php';
include 'User.php';

$db = (new Database())->getConnection();
$user = new User($db);

$matric = $_GET['matric'];
$details = $user->getUser($matric);
?>
<!DOCTYPE html>
<html>
<head><title>Update User</title></head>
<body>
<h2>Update User</h2>
<form action="update.php" method="post">
    <input type="hidden" name="matric" value="<?= $details['matric'] ?>">
    Name: <input type="text" name="name" value="<?= $details['name'] ?>" required><br>
    Role:
    <select name="role" required>
        <option value="lecturer" <?= $details['role'] == 'lecturer' ? 'selected' : '' ?>>Lecturer</option>
        <option value="student" <?= $details['role'] == 'student' ? 'selected' : '' ?>>Student</option>
    </select><br>
    <input type="submit" value="Update">
</form>

</body>
</html>