<?php
include 'db.php';

try {
    $db = new Database($id);
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $db->register($_POST['naam'], $_POST['achternaam'], $_POST['geboortedatum']);
        header("Location:Login.php?aangemaakt");
}

} catch (\Exception $e) {
    echo $e->getMessage();
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
        <input type="text" name="naam">
        <input type="text" name="achternaam">
        <input type="date" name="geboortedatum">
        <input type="text" name="email">
        <input type="password" name="password">
        <input type="submit">
    </form>
</body>
</html>
