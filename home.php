<?php
include "db.php";

$db = new Database();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
    <tr>
        <th>Id</th>
        <th>Email</th>
        <th>Password</th>
        </tr>
        <tr>
    <?php $users = $db->selectOneUser(3); ?>
        <td><?php echo $users['id'];?></td>
        <td><?php echo $users['email'];?></td>
        <td><?php echo $users['password'];?></td>
    </tr>
    </table>
    <form method="POST">
        <input type="text" name="email">
        <input type="password" name="password">
        <input type="submit">
    </form>
</body>
</html>



