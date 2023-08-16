<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <h1>Hello, world!</h1>


        <div class="container">
            <form action="register_db.php" method="post" class="form-horizontal my-5">

            <div class="form-group">
                <label for="username" class="col-sm-3 control-label">Username</label>
                <div class="col-sm-12">
                    <input type="text" name="txt_username" class="form-control" required placeholder="Enter username">
                </div>
            </div>

            <div class="form-group">

           
            <label for="email" class="col-sm-3 control-label">Email</label>
            <div class="col-sm-12">
                <input type="text" name="txt_email" required placeholder="Enter Email"  id="">
            </div>
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
                            <input type="submit" value="Register" name="btn_register" class="btn btn-primary" style="width 100%;">
                         </div>
                    </div>
               

            <div class="form-group text-center" >
                <div class="col-sm-12 mt-3">
                    Already Have an Account <p><a href="index.php">Login</a></p>
                </div>
            </div>

            </form>
        </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
