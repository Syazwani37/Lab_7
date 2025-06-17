<!DOCTYPE html>
<html>
<head><title>Register</title></head>
<body>

<h2>Register</h2>

<form action="insert.php" method="post">
    Matric: <input type="text" name="matric" required><br>
    Name: <input type="text" name="name" required><br>
    Password: <input type="password" name="password" required><br>
    Role:
    <select name="role" required>
        <option value="student">Student</option>
        <option value="lecturer">Lecturer</option>
    </select><br>
    <input type="submit" value="Register">
</form>

</body>
</html>
