<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome to users</h1>
    

    
    <table class="tbl-full">
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Role</th>
        </tr>

      <!-- Table rows will be generated by PHP -->
        <?php

  
      
include_once "../user/connection.php";
$query = "SELECT * FROM masterlogin";
$res = mysqli_query($conn,$query);

if($res==true)
{
    //count rows if there is data or not
    $count = mysqli_num_rows($res);
    $sn = 1; // Create a balue and assign it 


    if($count>0)
    {
        while($row=mysqli_fetch_assoc($res))
        {
            $id = $row['id'];
            $username = $row['username'];
            $email = $row['email'];
            $password = $row['PASSWORD'];
            $role = $row['role'];
             //Display Value on our table
             ?>





    <tr>
    <td><?php echo $sn++; ?></td>
    <td><?php echo $username; ?></td>
    <td><?php echo $email; ?></td>
     <td><?php echo $password; ?></td>
     <td><?php echo $role; ?></td>

     <td>
         <a href="update.php?id=<?php echo $id; ?>"><input type="button" class="btn btn-secondary" value="Edit"></a>
         <a href="delete.php?id=<?php echo $id; ?>"><input type="button" class="btn btn-danger" value="Delete"></a>
        </td>
        
    </tr>
    <?php 
  }
} 
}



    ?>
</table>
</body>
</html>