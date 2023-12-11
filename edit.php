<?php
    include 'db.php';
    $db = new Database ();

    if(isset($_GET['id'])) {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
               $db->editUSer($_POST['email'], $db->hash($_POST['password']), $_GET['id']);
               header("Location:home.php?Sucess");
            } catch (\Exception $e) {
                echo "Error" . $e->getMessage();
            }
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
        <input type="text" name="email" value="<?php echo $_GET['email'];?>">
        <input type="password" name="password">
        <input type="submit">
    </form>
</body>
</html>