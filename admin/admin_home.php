<?php

session_start();
include_once "navbar.php";
    if(!isset($_SESSION['admin-login']))
    {
        header("location:../index.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="text-center mt-5">
        <div class="container">
            <?php  if(isset($_SESSION['success'])): ?>
                <div class="alert alert-success">


                    <h3>
                        <?php
                        if(isset($_SESSION['success'])){
                        echo $_SESSION['success'];
                        unset ($_SESSION['success']);
                    }


                    if(isset($_SESSION['success-delete'])){
                        echo $_SESSION['success-delete'];
                        unset ($_SESSION['success-delete']);
                    }


                        ?>
                    </h3>


                </div>

                <?php endif ?>

                <h1>Admin page</h1>


            <h3>
                <?php if(isset($_SESSION['admin-login'])){ ?>
                
                    welcome <?php echo $_SESSION['admin-login']; }  ?>
            </h3>

            <a href="../user/logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>
</body>
</html>