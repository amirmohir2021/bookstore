<?php
session_start();

if(isset($_POST['email']) && 
isset($_POST['password'])){


     include "../db_conn.php";

    include "func-validition.php";

   $email = $_POST['email'];
   $password = $_POST['password'];
//    var_dump($email, $password);
   $text = "Email";
   $location = "../login.php"; 
   $ms = "error";
   is_empty($email,$text,$location,$ms,"");

   $text = "Password";
   $location = "../login.php"; 
   $ms = "error";
   is_empty($password,$text,$location,$ms,"");

    $sql = "SELECT * FROM `admin` WHERE `email` = '{$email}'";
    $result = $con->query($sql);


//    $sql = "SELECT*FROM admin 
//             WHERE email=?";

//           $stmt  = $conn->prepare($sql);
//           $stmt->execute([$email]);

          if($result->num_rows == 1){
            // while($row = $result->fetch_assoc()){
            //     var_dump($row);
            // }
            $user = $result->fetch_assoc();
            $user_id = $user['id'];
            $user_email = $user['email'];
            $user_password = $user['password'];

                if($email === $user_email){

                    if(password_verify($password,$user_password)){
                        $_SESSION['user_id'] = $user_id;
                        $_SESSION['user_email'] = $user_email;
                        $_SESSION['user_password'] = $user_password;
                        header("Location: ../admin.php");

                    }else{
                        $em = "Incorrect User name or password";
                        header("Location: ../login.php?error=$em");
                    }

                }else{
                    $em = "Incorrect User name or password";
                    header("Location: ../login.php?error=$em");

                }

          }else{
            $em = "Incorrect User name or password";
            header("Location: ../login.php?error=$em");
          }

}
else{
    header("Location: ../login.php");
}

?>