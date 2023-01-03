 <?php
 include('config.php');
 require_once('session.php');

     AdminSession();


if(isset($_POST['submit'])){

$usertype = mysqli_real_escape_string($mysqli, $_REQUEST['user_type']);
$Course_code = mysqli_real_escape_string($mysqli, $_REQUEST['Course_code']);
$Register_no = mysqli_real_escape_string($mysqli, $_REQUEST['Register_no']);
$date = mysqli_real_escape_string($mysqli, $_REQUEST['date']);
$internal_mark = mysqli_real_escape_string($mysqli, $_REQUEST['internal_mark']);

$tableName = "nominal_tb";
#--------------------------------INSERT THE FIRST INTERNAL MARK IN ROW---------------------------------
  
if($usertype == "tb_First_int_mark"){
  $sqlqry = "SELECT * FROM {$tableName} WHERE tb_Register_no = '{$Register_no}' AND tb_Course_code='{$Course_code}' ";
  $result = mysqli_query($mysqli,$sqlqry);
  // print_r($result);

  if($result->num_rows>0){
    echo "<script type='text/javascript'>alert('Already Inserted!!!')</script>";
    return;
  }


  $sql = "INSERT INTO {$tableName} (tb_Register_no,tb_Course_code,tb_First_int_mark,tb_Second_int_mark,tb_Third_int_mark,tb_int_final_mark,tb_Assign_mark,tb_total_mark) VALUES ('{$Register_no}','{$Course_code}','{$internal_mark}','0','0','0','0','0')";
  if(mysqli_query($mysqli, $sql)){
    echo "<script type='text/javascript'>alert('Records inserted successfully.')</script>";
}
else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}
} 
#--------------------------------UPDATE THE SECOND INTERNAL MARK IN SAME ROW---------------------------
else{
  if($usertype == "tb_Assign_mark"){
    $sql = "SELECT * FROM {$tableName} WHERE tb_Register_no='{$Register_no}' AND tb_Course_code='{$Course_code}' ";
    $result = mysqli_query($mysqli,$sql);
    if($result->num_rows>0){
    while ($row=$result->fetch_assoc()) {
      $FirstInternalmark  = $row["tb_First_int_mark"];
      $SecondInternalmark = $row["tb_Second_int_mark"];
      $ThirdInternalmark  = $row["tb_Third_int_mark"];
      //$FinalInternalmark  = $row["tb_int_final_mark"]; 
      //$AssignmentMark     = $row["tb_Assign_mark"];
      $number = array($FirstInternalmark, $SecondInternalmark,$ThirdInternalmark);
      $num = array();
      rsort($number);
      print_r($number);
      $Final_Mark = ($number[0] + $number[1])/2;
      $Final =($Final_Mark /40) * 15;
      $Total_Mark = $Final + $internal_mark;
      echo $Final;
    }
    $updateRes = "UPDATE {$tableName} SET $usertype={$internal_mark},tb_int_final_mark='{$Final}',tb_total_mark ='{$Total_Mark}' WHERE tb_Register_no = '{$Register_no}' and tb_Course_code = '{$Course_code}'";
     echo $updateRes;
     $updateRes = $mysqli->query($updateRes);
     echo "<script type='text/javascript'>alert('{$usertype}Mark Inserted successfully.')</script>";

  }
  return;

  }

     $updateRes = "UPDATE {$tableName} SET $usertype={$internal_mark} WHERE tb_Register_no = '{$Register_no}' and tb_Course_code = '{$Course_code}'";
     // echo $updateRes;
     $updateRes = $mysqli->query($updateRes);
     echo "<script type='text/javascript'>alert('{$usertype}Mark Inserted successfully.')</script>";
     }

}

?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <title>LOGIN</title>
 
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
  background-image: url('https://rpna4.renlearn.co.kr/rpna42sq/images/rp_entry_background.jpg');
        background-repeat: no-repeat;
        background-size: 2000px;
        display: flex;
        position: absolute;
        left: 300px;

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
  height: 85%;
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
              <label for="floatingInput"><b>Select Exam</b></label>
                <select class="form-control"  name="user_type">
                   <option value="tb_First_int_mark">First Internal</option>
                   <option value="tb_Second_int_mark">Second Internal</option>
                   <option value="tb_Third_int_mark">Third Internal</option>
                    <option value="tb_Assign_mark">Assignment</option>
                </select>
               </div>
               <div class="form-floating mb-3">
                <label for="floatingInput"><b>Course Code</b></label>
                <input type="text" class="form-control"  name="Course_code" placeholder="Course code"required>
              </div>
              <div class="form-floating mb-3">
                 <label for="floatingPassword"><b>Register No</b></label>
                 <input type="text-capitalize" class="form-control" name="Register_no" placeholder="Register no"required>
              </div>
              <div class="form-floating mb-3">
                 <label for="floatingPassword"><b>Exam mark</b></label>
                 <input type="no" class="form-control" name="internal_mark" placeholder="mark"required>
              </div>


                <div class="form-floating mb-3">
                 <label for="floatingPassword"><b>Date</b></label>
                 <input type="date" class="form-control" name="date" placeholder="date"required>
               </div>

<!--                 <div class="form-floating mb-3">
                 <label for="floatingPassword"><b>External Minimum Mark</b></label>
                 <input type="text-capitalize" class="form-control" name="tb_External_min_mark" placeholder="Course name "required>
               </div>
 -->
<!--                 <div class="form-floating mb-3">
                 <label for="floatingPassword"><b>External Miximum Mark</b></label>
                 <input type="text-capitalize" class="form-control" name="tb_External_max_mark" placeholder="Course name "required>
               </div>
 -->




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
