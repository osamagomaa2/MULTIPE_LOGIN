<?php
session_start();

// to force user login first

    if(isset($_SESSION['admin_login']))
    {
        header("location:../admin/admin_home.php");
    }

    if(isset($_SESSION['employee_login']))
    {
        header("location:../employee/employee_home.php");
    }

    if(isset($_SESSION['user_login']))
    {
        header("location:../admin/user_home.php");
    }
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
   




        <div class="container">

        <h1 class="mt-5">Login</h1>
        <hr>
        <?php  if(isset($_SESSION['success'])): ?>
                <div class="alert alert-success">


                    <h3>
                        <?php
                        echo $_SESSION['success'];
                        unset ($_SESSION['success']);
                        ?>
                    </h3>


                </div>

                <?php endif ?>


                <!-- if login to admin and i am user will prevent me and show error -->
                <?php  if(isset($_SESSION['error'])): ?>
                <div class="alert alert-danger">


                    <h3>
                        <?php
                        echo $_SESSION['error'];
                        unset ($_SESSION['error']);
                        ?>
                    </h3>


                </div>

                <?php endif ?>

              






            <form action="login_db.php" method="post" class="form-horizontal my-5">

            <label for="email" class="col-sm-3 control-label">Email</label>
            <div class="col-sm-12">
                <input type="text" name="txt_email" required placeholder="Enter Email"  id="">
            </div>



            <label for="password" class="col-sm-3 control-label">password</label>
            <div class="col-sm-12">
                <input type="password" name="txt_password" required placeholder="Enter password"  id="">
            </div>
            

            <div class="form-group">
                <label for="type" class="col-sm-3 control-label"></label>
                <div class="col-sm-12">
                    <select name="txt_role" class="form-control" id="">
                        <option value="" selected="selected">- Select Role- </option>
                        <option value="admin">Admin</option>
                        <option value="employee">Employee</option>
                        <option value="user">User</option>
                    </select>
                </div>
            </div>
            
                    <div class="form-control">
                         <div class="col-sm-12 mt-5">
                            <input type="submit" value="Login" name="btn_login" class="btn btn-success" style="width 100%;">
                         </div>
                    </div>
               

            <div class="form-group text-center" >
                <div class="col-sm-12 mt-3">
                     You Don't Have An Account register here? <p><a href="register.php">Register Account</a></p>
                </div>
            </div>

            </form>
        </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
