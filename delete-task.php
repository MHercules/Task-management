<?php 
session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id']) && $_SESSION['role'] == "admin") {
    include "dbh.inc.php";
    include "app/Model/Task.php";
    
    if (!isset($_GET['id'])) {
    	 header("Location: tasks.php");
    	 exit();
    }
    $id = $_GET['id'];
    $task = get_task_by_id($pdo, $id);

    if ($task == 0) {
    	 header("Location: tasks.php");
    	 exit();
    }

     $data = array($id);
     delete_task($pdo, $data);
     $sm = "Deleted Successfully";
     header("Location: tasks.php?success=$sm");
     exit();

 }else{ 
   $em = "First login";
   header("Location: login.php?error=$em");
   exit();
}
 ?>