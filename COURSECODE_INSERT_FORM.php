<?php
require_once('session.php');

    AdminSession();
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "demo");
 
// Check connection...................
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_POST['submit'])){

// Escape user inputs for security......................................
$Course_code = mysqli_real_escape_string($link, $_REQUEST['tb_Coursecode']);
$C_name = mysqli_real_escape_string($link, $_REQUEST['tb_Coursename']);
$C_year = mysqli_real_escape_string($link, $_REQUEST['tb_Course_year']);

$C_sem = mysqli_real_escape_string($link, $_REQUEST['tb_sem']);

$I_min = mysqli_real_escape_string($link, $_REQUEST['tb_Internal_min_mark']);
$I_max = mysqli_real_escape_string($link, $_REQUEST['tb_Internal_max_mark']);
$E_min = mysqli_real_escape_string($link, $_REQUEST['tb_External_min_mark']);
$E_max = mysqli_real_escape_string($link, $_REQUEST['tb_External_max_mark']);
//tb_semester
// Attempt insert query execution
$sql = "INSERT INTO coursecode_tb(tb_Coursecode,tb_Coursename,tb_Course_year,tb_semester,tb_Internal_min_mark,tb_Internal_max_mark,tb_External_min_mark,tb_External_max_mark) VALUES ('{$Course_code}','{$C_name}','{$C_year}','{$C_sem}','{$I_min}','{$I_max}','{$E_min}','{$E_max}')";

if(mysqli_query($link, $sql)){
    echo "<script type='text/javascript'>alert('Records inserted successfully.')</script>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}

// else{
    // echo "Please click a button!!";
// }
 
// Close connection
mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Course Code</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

    <!--Stylesheet-->
    <style media="screen">
        body {
  /*background: #007bff;
  */
 /* background: linear-gradient(to right,lightpink,lightpink);*/
  background-image: url('https://pbs.twimg.com/media/FFnBVUhXsA8Mxbg.jpg');
        background-repeat: no-repeat;
        background-size: 2060px;

}

.btn-login {
  font-size: 0.9rem;
  letter-spacing: 0.05rem;
  padding: 0.75rem 1rem;
}
.card-title{
            font-size: 30px;
            margin-top:0px;
          }
.card{
  width: 600px;
  text-align: left;
  border-radius:  10px 10px 10px 10px;
  box-shadow: -1px 10px 1px -1px rgba(1, 0, 0, 1.0);
  box-sizing: border-box;
  height: 90%;
  position: relative;
  right: 100px;
  display: flex;

    
  }
  input[type=text-capitalize]{
    height: 40px;
    font-size: 20px;
    border-radius: 5px;
    margin-top: -5px;
  }
  input[type=text-capitalize]:hover{
     transform: scale(1.05);
     border-color: blue;
  /*  transform: scale(1.01);
    box-shadow:-1px 13px 19px -1px rgba(0, 0, 0, 9.0);
  */  /*border-color: transparent;*/
  }
  label{
    font-size: 20px;
    margin-top: -10px;
  }
  





    </style>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5"><b>Courses</b></h5>
            <form action="" method="POST">
              <div class="form-floating mb-3">
                
                <label for="floatingInput"><b>Course Code</b></label>
                <input type="text-capitalize" class="form-control"  name="tb_Coursecode" placeholder="Course code"required>
              </div>
              
              <div class="form-floating mb-3">
                 <label for="floatingPassword"><b>Course Name</b></label>
                 <input type="text-capitalize" class="form-control" name="tb_Coursename" placeholder="Course name "required>
               </div>

                <div class="form-floating mb-3">
                 <label for="floatingPassword"><b>Course Year</b></label>
                 <input type="text-capitalize" class="form-control" name="tb_Course_year" placeholder="Course Year "required>
               </div>
                <div class="form-floating mb-3">
                 <label for="floatingPassword"><b>Which Semester</b></label>
                 <input type="text-capitalize" class="form-control" name="tb_sem" placeholder="Semester"required>
               </div>


                <div class="form-floating mb-3">
                 <label for="floatingPassword"><b>Internal Minimum Mark</b></label>
                 <input type="text-capitalize" class="form-control" name="tb_Internal_min_mark" placeholder="Internal Minimum Mark"required>
               </div>

                <div class="form-floating mb-3">
                 <label for="floatingPassword"><b>Internal Miximum Mark</b></label>
                 <input type="text-capitalize" class="form-control" name="tb_Internal_max_mark" placeholder="Internal Miximum Mark"required>
               </div>

                <div class="form-floating mb-3">
                 <label for="floatingPassword"><b>External Minimum Mark</b></label>
                 <input type="text-capitalize" class="form-control" name="tb_External_min_mark" placeholder="External Minimum Mark"required>
               </div>

                <div class="form-floating mb-3">
                 <label for="floatingPassword"><b>External Miximum Mark</b></label>
                 <input type="text-capitalize" class="form-control" name="tb_External_max_mark" placeholder="External Miximum Mark"required>
               </div>





              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" name="submit" class="open">Submit</button>
              </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
