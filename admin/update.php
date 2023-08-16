<?php
session_start();
include_once "../user/connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // get the value from the database
    $query = "SELECT * FROM masterlogin WHERE id=$id";
    $result = mysqli_query($conn, $query);

    if ($result == true) {
        // get the value from the database
        $row = mysqli_fetch_assoc($result);

        // Create Individual Variables to save data
        $email = $row['email'];
        $password = $row['password'];
        $role = $row['role'];
    }
} else {
    //    header("location: update.php");
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
        <h1 class="mt-5">Update</h1>
        <hr>
        <form action="update.php" method="post" class="form-horizontal my-5">

            <label for="email" class="col-sm-3 control-label">Email</label>
            <div class="col-sm-12">
                <input type="text" name="txt_email" value="<?php echo $email; ?>" required placeholder="Enter Email" id="">
            </div>

            <label for="password" class="col-sm-3 control-label">Password</label>
            <div class="col-sm-12">
                <input type="password" name="txt_password" value="<?php echo $password; ?>" required placeholder="Enter password" id="">
            </div>

            <div class="form-group">
                <label for="type" class="col-sm-3 control-label"></label>
                <div class="col-sm-12">
                    <select name="txt_role" class="form-control" id="">
                        <option value="" selected="selected">- Select Role- </option>
                        <option value="admin" <?php if ($role == 'admin') echo 'selected'; ?>>Admin</option>
                        <option value="employee" <?php if ($role == 'employee') echo 'selected'; ?>>Employee</option>
                        <option value="user" <?php if ($role == 'user') echo 'selected'; ?>>User</option>
                    </select>
                </div>
            </div>

            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-control">
                <div class="col-sm-12 mt-5">
                    <input type="submit" value="Update" name="update" class="btn btn-success" style="width: 100%;">
                </div>
            </div>

            <div class="form-group text-center" >
                <div class="col-sm-12 mt-3">
                    You Don't Have An Account? <p><a href="register.php">Register Account</a></p>
                </div>
            </div>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>

<?php
if (isset($_POST['update'])) {
    $txt_email = mysqli_real_escape_string($conn, $_POST['txt_email']);
    $txt_password = mysqli_real_escape_string($conn, $_POST['txt_password']);
    $txt_role = mysqli_real_escape_string($conn, $_POST['txt_role']);
    $id = intval($_POST['id']);

    // Update query
    $query  = "UPDATE masterlogin SET
                email = '$txt_email',
                password = '$txt_password',
                role = '$txt_role'
                WHERE id = $id";

    $execut = mysqli_query($conn, $query);

    if ($execut == true) {
        $_SESSION['update'] = "Updated Successfully!";
        header("location: user.php");
        exit(); // Ensure that the script stops here to avoid unnecessary code execution
    } else {
        $_SESSION['update-fail'] = "Failed to Update!";
    }
}
?>
