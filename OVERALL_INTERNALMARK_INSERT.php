<?php
    include('config.php');
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
$Regno = mysqli_real_escape_string($link, $_REQUEST['Regno']);
$Ccode = mysqli_real_escape_string($link, $_REQUEST['Ccode']);
$Fmark = mysqli_real_escape_string($link, $_REQUEST['Fmark']);
$Smark = mysqli_real_escape_string($link, $_REQUEST['Smark']);
$Tmark = mysqli_real_escape_string($link, $_REQUEST['Tmark']);
$Amark = mysqli_real_escape_string($link, $_REQUEST['Amark']);

$number = array($Fmark,$Smark,$Tmark);
$num = array();
rsort($number);
print_r($number);

$Final_Mark = ($number[0] + $number[1])/2;

$Final =($Final_Mark /40) * 15;
echo $Final;
$Assign = $Amark;
$Total_Mark = $Final + $Assign;
echo $Final_Mark ;
echo $Final ;
echo $Total_Mark ;



// $final =$Fmark + $Smark;
// Attempt insert query execution
$sql = "INSERT INTO nominal_tb (tb_Register_no,tb_Course_code,tb_First_int_mark,tb_Second_int_mark,tb_Third_int_mark,tb_int_final_mark,tb_Assign_mark,tb_total_mark ) VALUES ('{$Regno}','{$Ccode}','{$Fmark}','{$Smark}','{$Tmark}','{$Final}','{$Assign}','{$Total_Mark}')";
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
    <title>Internal mark </title>
 
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
  background-image: url('https://www.xprienz.com/wp-content/uploads/2018/05/bg-3.jpg');
        background-repeat: no-repeat;
        background-size: 2000px;
        display: flex;
        position: absolute;
        left: 300px;

}
/*https://media-exp1.licdn.com/dms/image/C4E1BAQHnxVgMw2qgYA/company-background_10000/0/1627916467837?e=2147483647&v=beta&t=vyu1Nxhgu4K04wavBbY7TgPFgzQPf7ZbGLD-MBsvP2s
*/
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
  input[type=text],input[type=no]{
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
  input[type=no]:hover{
     transform: scale(1.05);
     border-color: blue;
   }
  label{
    font-size: 20px;
    margin-top: -10px;
  }
  
</style>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-10 col-md-7 col-lg-100 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h2 class="card-title text-center mb-5 fw-light fs-5"><b>Student Internal Mark</b></h2>
            <form action="" method="POST" class="form">
              <div class="form-floating mb-3">
                
                <label for="floatingInput"><b>Register No</b></label>
                <input type="text" class="form-control" placeholder="Register no" name="Regno"required>
              </div>
              
              <div class="form-floating mb-3">
                 <label for="floatingPassword"><b>Course Code</b></label>
                 <input type="text" class="form-control"  placeholder="Course code" name="Ccode" required>
               </div>

               <div class="form-floating mb-3">
                 <label for="floatingPassword"><b>First Internal Mark</b></label>
                 <input type="no" class="form-control"  placeholder="First Internal Mark" name="Fmark" required>
               </div>

               <div class="form-floating mb-3">
                 <label for="floatingPassword"><b>Second Internal Mark</b></label>
                 <input type="no" class="form-control"   placeholder="Second Internal Mark" name="Smark"required>
               </div>

               <div class="form-floating mb-3">
                 <label for="floatingPassword"><b>Third Internal Mark</b></label>
                 <input type="no" class="form-control"  placeholder="Third Internal Mark" name="Tmark" required>
               </div>

               <div class="form-floating mb-3">
                 <label for="floatingPassword"><b>Assignment Mark</b></label>
                 <input type="no" class="form-control" placeholder="Assignment Mark" name="Amark"required>
               </div>


               <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" id="submit_btn"class="btn" name="submit">Submit</button>
              </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- <script>
    $("#submit_btn").click(function() { 
        alert("The records has been successfully inserted.");
    });
</script>
 -->

</body>

</html>