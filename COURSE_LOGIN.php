<?php
include('config.php');
require_once('session.php');

    AdminSession();

if(isset($_POST['submit'])){
  $tb_Coursecode = mysqli_real_escape_string($mysqli, $_REQUEST['tb_Coursecode']);
  $Password = mysqli_real_escape_string($mysqli, $_REQUEST['Password']);
  $tableName = "coursecode_tb";
  $sel_query="Select * from {$tableName} where tb_Coursecode='{$tb_Coursecode}'";
  $result = mysqli_query($mysqli,$sel_query);
  if($result->num_rows>0){
  // echo $internalTotal;
    while ($row=$result->fetch_assoc()) {
      $Coursecode = $row['tb_Course_Password'];
      $_SESSION['CourseCode_View'] = $Coursecode ;
        // echo $row['total'];
    }
    if($Password ==  $Coursecode){
      $tableName1 = "nominal_tb";
      $sel_query="Select * from {$tableName1} where tb_Course_code='{$tb_Coursecode}'";
       $result = mysqli_query($mysqli,$sel_query);
 
      // echo $result;
      if($result->num_rows>0){
        while($tablerow = $result->fetch_assoc()){
        $table_data1 = $tablerow['tb_Register_no'];
          $_SESSION['CourseCode_View'] = $tablerow ['tb_Course_code'];
          // echo $_SESSION['CourseCode_View'];
           $_SESSION['table_data2'] = $tablerow['tb_First_int_mark'];
           header("Location:COURSE_LOGIN_TABLE.php");
           // echo  $_SESSION['table_data1'];
           // // echo"<tr>{$_SESSION['table_data1']}</tr>";
            // echo "<script type='text/javascript'>alert('Login successfully.')</script>";
        
         }
          }
          
         
      }else{
          echo "no Records";
      }

}
else{
        echo "<script type='text/javascript'>alert('wrong password.')</script>";

    }
}
echo "No Records in table";

// }


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
  background: linear-gradient(to right,lightpink,lightpink);
  background-image: url('https://images.unsplash.com/photo-1571260899304-425eee4c7efc?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8dW5pdmVyc2l0eSUyMHN0dWRlbnR8ZW58MHx8MHx8&w=1000&q=80');
        background-repeat: no-repeat;
        background-size: 2060px;

}

.btn-login {
  font-size: 0.8rem;
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
  height: 80%;
  position: relative;
  right: 100px;
  display: flex;

    
  }
  input[type=text-capitalize]{
    height: 40px;
    font-size: 20px;
    border-radius: 5px;
  }
  input[type=text-capitalize]:hover{
   transform: scale(1.05);
   border-color: blue;
  }
  label{
    font-size: 20px;
    margin-top: -10px;
  }
</style>
<body>
  <div id="table"class="form">
<table  id="dataTable"class="table" border="0" >
<thead class="thead-dark">
  <!-- <input type="checkbox" class="check"name="check[]" value="<?= $row["id"]; ?>"></td> -->
<!--   <select name="tablefield" id="tablefield">
    <option value="all" selected>All</option>
    <?php //TableNameListOut(); ?>
  </select> -->
  

<!-- <tr>
<th><strong>Reg No</strong></th>
<th><strong>Cource Code</strong></th>
 </tr>
</thead>
-------- SELECT FORM DATA IN DATABASE>-
<tbody>
 <td>
  <input class="box" readOnly type="text"value="<?=  $table_data1 ?>">
</td>
</tbody>
</table>
 -->

  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light "><b>Courses Login</b></h5>
            <form action="" method="POST">
              <div class="form-floating mb-3">
                
                <label for="floatingInput"><b>Course Code</b></label>
                <input type="text-capitalize" class="form-control"  name="tb_Coursecode" placeholder="Course code"required>
              </div>
              <div class="form-floating mb-3">
                 <label for="floatingPassword"><b>Password</b></label>
                 <input type="text-capitalize" class="form-control" name="Password" placeholder="External Miximum Mark"required>
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
