<?php
    include 'db.php';
    $db = new Database();
    if(isset($_GET['id'])) {
        try {
            $db->deleteUser($_GET['id']);
            header("Location:home.php?Sucess");
        } catch (\Exception $e) {
            echo "Error: " . $e->getMEssage();
        }
    } else {
        header("Location:home.php");
    }
?>

