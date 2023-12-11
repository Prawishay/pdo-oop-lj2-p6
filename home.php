<?php
ini_set('display_errors', '1');
ini_set('displahy_startup_errors', '1');
error_reporting(E_ALL);

    include "db.php";
    $db = new Database();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            $db->insertUser($_POST['email'], $db->hash($_POST['password']));
            echo "Successfully added";
        } catch (Exception $e) {
            echo $e->getMessage();
        }  
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="email">
        <input type="password" name="password">
        <input type="submit">
    </form>

    <table border="2">
        <tr>
            <th>Id</th>
            <th>Email</th>
            <th>Password</th>
            <th colspan="2">Action</th>
        </tr>

        <tr> <?php
            $users = $db->select();
            foreach ($users as $user) {?>
            <td><?php echo $user['id'];?></td>
            <td><?php echo $user['email']?></td>
            <td><?php echo $user['password']?></td>
            <td><a href="edit.php?id=>=<?php echo $user['id'];?>&email=<?php echo $user['email']?>">Edit</a></td>
            <td><a href="delete.php?id=<?php echo $user['id'];?>">Delete</a></td>
        </tr>  <?php }?>
    </table>
</body>
</html>



