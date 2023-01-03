<?php
session_start();
include('config.php');
?>
<?php
if(isset($_POST['submit'])){
  $Register_no = mysqli_real_escape_string($mysqli, $_REQUEST['Register_no']);
  $tableName1 = "sem_tb";
  $sel_query="Select * from {$tableName1} where Regno='{$Register_no}'";
  $result = mysqli_query($mysqli,$sel_query);
  // print_r($result);
   if($result->num_rows>0){
        while($tablerow = $result->fetch_assoc()){
        $Reg = $tablerow['Regno'];
        $Code = $tablerow['Ccode'];
        $imark = $tablerow['Imark'];
        
      }
      if($Register_no == $Reg){
         $tableName1 = "sem_tb";
         $sel_query="Select * from {$tableName1} where Regno='{$Register_no}'";
         $result = mysqli_query($mysqli,$sel_query);
         // echo $result;
         if($result->num_rows>0){
          while($tablerow = $result->fetch_assoc()){
            $_SESSION['REGNO'] = $Register_no;
            $_SESSION['CourseCode_Regno'] = $tablerow['Regno'];
            
            $Course_code = $tablerow['Ccode'];
            $sel_query="Select * from coursecode_tb where tb_Coursecode='{$Course_code}'";

            $result_name = mysqli_query($mysqli,$sel_query);
            if($result_name->num_rows>0){
              while($tablerow = $result_name->fetch_assoc()){
                $_SESSION['C_NAME'] = $tablerow['tb_Coursename'];
                header('Location:RESULLT_DISPLAY_PAGE.php');
     
              }
            }
            else{
              echo "<script>alert('Record doesn t exists1.')</script>";
            }
         
            

             
      }



      }
    else{
          echo "<script>alert('Record doesn t exists.')</script>";
        // echo "Record doesn't exists.";
     
   }
     

}
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>LOGIN</title>
    <meta charset="utf-8">
 
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

    <!--Stylesheet-->
    <style media="screen">
       @import url("https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@600&display=swap");
body {
  box-sizing: border-box;
  display: flex;
/*  justify-content: center;
  align-items: center;
*/  background-color: white;
  background-image:url('https://dittoepr.com/wp-content/uploads/2021/11/DPR-blog-graphics-11.19.png');
  background-repeat: no-repeat;
  background-size: 100%;
  display: flex;
}
.card{
  font-size: 23px;
  width: 500px;
  background-color: white;
  border-radius: 10px;
  /*transform: scale(1.0);
  */box-shadow: 80px 12px 19px -10px rgba(0, 0, 0, 1.0);
  position: relative;
  top: 0px;
  left:0px;
  display: flex;
   


}
/*check{
  margin-top: 85px;
}
.card-title{
  font-size: 40px;

}
.container{
  padding-left: -700px;
  margin-right: 600px;
  }
  .close{
    margin-left: 100px;
    font-size: 30px;
    /* box-shadow: 10px 12px 19px -1px rgba(0, 0, 0, 9.0);
 */
  /*
  .modal-header{
    background-color: white;
    width: 110%;
    margin-left:-45px;
    
  }
  .modal-content{
    width: 800px;
    background-color: white;
    margin-left:-90px;
    padding-right: 10%;
    padding-left: 50px;
    font-size: 20px;
    box-shadow: 0px 4px 10px -1px rgba(0, 0, 0, 9.0);
    margin-top: 220px;
   
  }*/

.btn{
  font-size: 15px;
  width: 20%;
  border-color: black;
  color: white;
  margin-right: 500px;
  background-color: blue;
}

.btn:hover {
  background-color: #04AA6D;
  color: white;
}
/*.modal-body{
  font-size: 40px;
  text-align: center;

}
*/input[type=text]{
  width: 100%;
  height: 40px;
  font-size: 20px;
  border-radius: 5px;
}
input:hover{
  border-color: green;
  transform: scale(1.05);
 }
 label,h5{
  font-size: 20px;
 }
 /*.row{
  background-color: blue;

 }
*/

</style>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-10"><b>Result</b></h5>
              
            <form action="" method="POST">
              <div class="form-floating mb-3">
                
                <label for="floatingInput"><b>Register No</b></label>
                <input type="text" class="form-control" id="username" name="Register_no" placeholder="Enter your name" required>
              </div>
              <div class="grid">
                <button class="btn submit" type="submit" name="submit">Show</button>
              </div>
              
             <!--  <div class="form-check mb-3">
                 <input type="radio" autocomplete="off" class="check" data-toggle="modal" data-target="#myModal"><label>Forgot password</label>
              </div>
              --> 
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


</body>
</html>
