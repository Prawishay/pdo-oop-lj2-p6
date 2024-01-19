<?php 

include 'db.php';

try {
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = htmlspecialchars($_POST['email']);
        $database = new Database();
        $user = $database->login($email);

    if($user) {
        $password = $_POST['password'];
        $verify = password_verify($password, $user['password']);
        if($user && $password == $verify) {
            session_start();
            $_SESSION['accountid'] = $user['account_id'];
            header('Location:home.php?ingelogd');
        } else {
            echo "incorrect username or email";
        }
    } else {
        echo "incorrect username or email";
    }
    }
} catch (\Exception $e) {
    echo $e->getMessage();
}
?>