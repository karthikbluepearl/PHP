<?php
session_start();
include('config.php');

?>
<?php

if(isset($_POST['username'])){

$password = $_POST['password'];
$username = $_POST['username'];

// $Login_password = md5($password);
// echo $Login_password;

$stmt=$mysqli->prepare("select * from users where username = ?");
$stmt->bind_Param("s",$username);
$stmt->execute();
$stmt_result = $stmt->get_result();
if($stmt_result->num_rows > 0){
    
    
    $data = $stmt_result->fetch_assoc();
    if($data['password'] == $password){
        $_SESSION['ValidAdmin'] = TRUE;
        header("Location:ADMIN_DASHBOARD.php");
        // echo "<script type='text/javascript'>alert('Login successfully.')
        //  window.location.assign('Dashboard_boot.php')
        //  </script>";
        
    }else{
      // header("Location:../login_boot.php?error=password is required");
      // // $_SESSION['user_name'] = $row['user_name'];
     echo "<script type='text/javascript'>alert('Invalid Password.')</script>";
    }    
}else{
         echo "<script type='text/javascript'>alert('Please Enter correct email.')</script>";

}
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>LOGIN</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../assets/css/ADMIN_LOGIN_FORM.css">
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>


  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <!--   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
 -->
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5"><b>Sign In</b></h5>
              
            <form action="" method="POST">
              <div class="form-floating mb-3">
                
                <label for="floatingInput"><b>Email</b></label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your name" required>
              </div>
              
              <div class="form-floating mb-3">
                 <label for="floatingPassword"><b>Password</b></label>
                 <input type="password" class="form-control"  id="password" name="password" placeholder="Password"required>
              </div>
              

              <div class="grid">
                <button class="btn" type="submit">Sign
                  in</button>
              </div>
              
              <div class="form-check mb-3">
                 <input type="radio" autocomplete="off" class="check" data-toggle="modal" data-target="#myModal"><label>Forgot password</label>
              </div>
              
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
include('config.php');

 // $password = $_POST['password'];
 // // $username = $_POST['Email'];

if(isset($_POST['Submit'])){

  $email = mysqli_real_escape_string($mysqli, $_POST['email']);
  $password = mysqli_real_escape_string($mysqli, $_POST['password']);
  $Conformpassword = mysqli_real_escape_string($mysqli, $_POST['Conformpassword']);
  
  
  // $password = $_POST['password'];

  $tableName = "users";
  $sel_query="Select * from {$tableName} where username='{$email}'";
      
  $result = mysqli_query($mysqli,$sel_query);
  if($result->num_rows>0){
    while ($row=$result->fetch_assoc()) {
      $username = $row['username'];
    }
    if($username == $email and $password == $Conformpassword){
      $tableName = "users";
      $updateRes = "UPDATE {$tableName} SET password='{$password}'WHERE username='{$email}'";
      $updateRes = $mysqli->query($updateRes );
      echo "<script type='text/javascript'>alert('Sucessfully Changed Password.')</script>";
    }else{
      echo "<script type='text/javascript'>alert('Not matched password.')</script>";

    }
  }else{
   echo "<script type='text/javascript'>alert('Enter Correct Email.')</script>";

  }
}
  ?>

  
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog" action="" method="POST">
    <form action="" method="POST" class="form">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
            <p><b>Forgot Password</b></p>
          </div>
          <div class="form-floating mb-3">
            <label for="floatingInput"><b>Email</b></label>
            <input type="text" class="form-control" id="username1" name="email" placeholder="Enter your name"  required autocomplete="off">
          </div>
          <div class="form-floating mb-3">
            <label for="floatingPassword"><b>Password</b></label>
            <input type="password" class="form-control"  id="Fpassword" name="password" placeholder="Password" autocomplete="off" required>
          </div>
          <div class="form-floating mb-3">
            <label for="floatingPassword"><b>Conform Password</b></label>
            <input type="password" class="form-control"  id="Cpassword" name="Conformpassword" placeholder="ConformPassword" autocomplete="off" required>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn1 submit" name="Submit">Submit</button>
          </div>
        </div>
    </form>  
    </div>
  </div>
  
</div>


</body>
</html>
