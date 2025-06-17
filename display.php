<?php
include 'Database.php';
include 'User.php';

$db = (new Database())->getConnection();
$user = new User($db);
$users = $user->getUsers();
?>
<!DOCTYPE html>
<html>
<head><title>User List</title></head>
    <style>
        table {
            border-collapse: collapse;
            border: 2px solid black;
            font-size: 16px;
            margin: 0 auto; /* Centers the table */
        }

        th {
            background-color: #ADD8E6;
            color: white;
            padding: 8px;
            border: 1px solid gray;
        }

        td {
            padding: 8px;
            border: 1px solid gray;
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #F5F5F5;
        }

        tr:nth-child(odd) {
            background-color: white;
        }
    </style>

<body>
<h2>User List</h2>
<table border="1">
<tr><th>Matric</th><th>Name</th><th>Role</th><th>Action</th></tr>
<?php while ($row = $users->fetch_assoc()): ?>
<tr>
    <td><?= $row['matric'] ?></td>
    <td><?= $row['name'] ?></td>
    <td><?= $row['role'] ?></td>
    <td>
        <a href="update_form.php?matric=<?= $row['matric'] ?>">Edit</a> |
        <a href="delete.php?matric=<?= $row['matric'] ?>" onclick="return confirm('Delete this user?')">Delete</a>
    </td>
</tr>
<?php endwhile; ?>
</table>

</body>
</html>