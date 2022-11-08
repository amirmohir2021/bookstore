<?php
session_start();

if(isset($_SESSION['user_id']) && 
isset($_SESSION['user_email'])){

    #Database Connection File
    include "db_conn.php";

    /**
Check if author name is submidtted
**/

if(isset($_POST['author_name'])){
    $name = $_POST['author_name'];

    if(empty($name)){
        $em = "The author name is required";
        header("Location:../add-function?error=$em");
        exit;
    }

}else{
    header("Location:../admin.php");
    exit;
}


}else{
    header("Location:login.php");
    exit;
}

?>