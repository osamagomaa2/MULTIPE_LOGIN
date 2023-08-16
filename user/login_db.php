<?php



include_once "connection.php";

session_start();


if(isset($_POST['btn_login']))
{
    $email =  $_POST['txt_email'];
    $password = $_POST['txt_password'];
    $role = $_POST['txt_role'];
    // $hash = password_hash($password,PASSWORD_BCRYPT,["cost"=>8]);


    
    

    if(empty($email))
    {
        $errorMsg[] = "Please Enter Email";
    }
    elseif(empty($password))
    {
        $errorMsg[] = "please enter password";
    }
    elseif(empty($role))
    {
        $errorMsg[] = "Please Select Role";
    }
    elseif($email AND $password AND $role)
    {
        try {
            $select_stmt = $db->prepare("SELECT email, password, role FROM masterlogin
                WHERE email = :uemail
                AND password = :upassword
                AND role = :urole");    
                $select_stmt->bindParam(":uemail",$email);
                $select_stmt->bindParam(":upassword",$password);
                $select_stmt->bindParam(":urole",$role);
                $select_stmt->execute();

                while($row = $select_stmt->fetch(PDO::FETCH_ASSOC))
                {
                    $dbemail = $row['email'];
                    $dbpassword = $row['password'];
                    $dbrole = $row['role'];
                }

                if($email != null AND $password != null AND $role != null)
                {
                    if($select_stmt->rowCount( )>0)
                    {
                        // notes
                        if($email == $dbemail AND $password == $dbpassword AND $role == $dbrole)
                        {
                                switch ($dbrole)
                                {
                                    // check if the user role is admin or employee or user

                                    case 'admin':
                                        $_SESSION['admin-login'] = $email;
                                        $_SESSION['succcess'] = "Admin... Successfully Login";
                                        header("location: ../admin/admin_home.php");
                                        break;
                                    

                                        case 'employee':
                                            $_SESSION['employee-login'] = $email;
                                            $_SESSION['succcess'] = "Employee... Successfully Login";
                                            header("location: ../employee/employee_home.php");
                                            break;


                                            case 'user':
                                                $_SESSION['user-login'] = $email;
                                                $_SESSION['succcess'] = "User... Successfully Login";
                                                header("location: user/user_home.php");
                                                break;

                                            default:
                                            $_SESSION['error'] = "Wrong email or password or role";
                                            header("location:index.php");
                                }
                        }

                    }
                    else
                    {
                        $_SESSION['error'] = "Wrong email or password or role";
                        header("location:index.php");
                    }
                }

        }      
         catch(PDOException $e)
        {
                // notice
                $e->getMessage();
        }
    }
}


?>