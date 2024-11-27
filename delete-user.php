<?php
session_start();
if(isset($_SESSION['role']) && isset($_SESSION['id']) && $_SESSION['role'] == "admin") 
{
    include "dbh.inc.php";
    include "app/Model/User.php";

    if(!isset($_GET['id'])) 
    {
        header("Location:user.php");
        exit();
    }
    $id = $_GET['id'];
    $user = get_user_by_id($pdo, $id);

    if($user == 0) 
    {
        header("Location: user.php");
        exit();
    }

    $data = array($id, "employee");
    delete_user($pdo, $data);
    $sm = "User successfully deleted";
    header("Location: user.php?success=$sm");
    exit();
} else 
{
    $em = "First login";
    header("Location: login.php?error=$em");
    exit();
}
