<?php

session_start();

    if(!isset($_SESSION['employee_login']))
    {
        header("location:../index.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Page</title>
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
                        echo $_SESSION['success'];
                        unset ($_SESSION['success']);
                        ?>
                    </h3>


                </div>

                <?php endif ?>

                <h1>Employee page</h1>


            <h3>
                <?php if(isset($_SESSION['employee_login'])){ ?>
                
                    welcome <?php echo $_SESSION['employee_login']; }  ?>
            </h3>

            <a href="../user/logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>
</body>
</html>