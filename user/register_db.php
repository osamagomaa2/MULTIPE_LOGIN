<?php

require_once "connection.php";
session_start();

if(isset($_POST['btn_register']))
{
    $username = $_POST['txt_username'];
    $email = $_POST['txt_email'];
    $password = $_POST['txt_password'];
    $role = $_POST['txt_role'];

    if(empty($username))
    {
       $errorMsg[] = "enter your name";
    }

    elseif(empty($email)) {
        $errorMsg[] = "enter your email";
        
    }


    elseif(empty($password)) {
        $errorMsg[] = "enter your password";
        
    }

    elseif(strlen($password < 6)) {
        $errorMsg[] = "password must be at least 6 characters";
        
    }
  
    elseif(empty($role)) {
        $errorMsg[] = "select your role";
        
    }


    else {
        try {
                $select_stmt = $db->prepare("SELECT username,email FROM masterlogin WHERE username = :uname AND email = :uemail ");
                $select_stmt->bindParam(":uname",$username);
                $select_stmt->bindParam(":uemail",$email);
                $select_stmt->execute();
                $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

                // notice
                if($row =['username'] == $username)
                {
                    $errorMsg[] = "Sorry Username already Exist";
                }

               else if($row =['email'] == $email)
                {
                    $errorMsg[] = "Sorry email already Exist";
                }

                else if (!isset($errorMsg))
                {
                    $insert_stmt = $db->prepare("INSERT INTO masterlogin(username,email,password,role) VALUES(:uname, :uemail, :upassword ,:urole)");
                    $insert_stmt->bindParam(":uname",$username);
                    $insert_stmt->bindParam(":uemail",$email);
                    $insert_stmt->bindParam(":upassword",$password);
                    $insert_stmt->bindParam(":urole",$role);
                   
                    if($insert_stmt->execute())
                    {
                        $_SESSION['success'] = "Register Successfully";
                        header("location:index.php");
                    }
                }
        } catch(PDOException $e)
        {
            $e->getMessage();
        }
        
    }
}
?>