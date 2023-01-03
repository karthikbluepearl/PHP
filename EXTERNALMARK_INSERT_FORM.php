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
// echo $Regno;
// $Imark = mysqli_real_escape_string($link, $_REQUEST['Imark']);

$Emark = mysqli_real_escape_string($link, $_REQUEST['Emark']);
$Year = mysqli_real_escape_string($link, $_REQUEST['Year']);

$internalTotal;

$tableName = "nominal_tb";
$sel_query="Select * from {$tableName} where tb_Register_no='{$Regno}' and tb_Course_code='{$Ccode}'";
$result = mysqli_query($mysqli,$sel_query);
if($result->num_rows>0){
    // echo $internalTotal;
    while ($row=$result->fetch_assoc()) {
        $internalTotal = $row['tb_total_mark'];
        // echo $row['total'];
    }
    if($internalTotal!="" && $Emark!=""){
        $total = $internalTotal + $Emark;
        echo $total;
        $sql = "INSERT INTO sem_tb (Regno,Ccode,Imark,Emark,Year,Result) VALUES
         ('{$Regno}','{$Ccode}',{$internalTotal},${Emark},'{$Year}',{$total})";
        if(mysqli_query($link, $sql)){
            echo "<script>alert('Records inserted successfully.')</script>";
            header("Location:EXTERNALMARK_INSERT_FORM.php");
        
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
        return;
    }
    echo "Some Inserted Error!!!";
    return;
}
echo "No Records in table";



// $Result = mysqli_real_escape_string($link, $_REQUEST['Result']);
// Attempt insert query execution
// $sql = "INSERT INTO sem_tb (Regno,Ccode,Imark,Emark,Year,Result) VALUES ('{$Regno}','{$Ccode}','${Emark}','{$Year}')";
// if(mysqli_query($link, $sql)){
//     echo "<script type='text/javascript'>alert('Records inserted successfully.')</script>";
// } else{
//     echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
// }
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
    <title>External mark </title>
 
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
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
 /* background: linear-gradient(45deg, greenyellow, dodgerblue);
 */
            background-color: white;
            background-image:url('https://webdesignersbrisbaneblog.files.wordpress.com/2020/04/website-design-brisbane1.jpeg');
            background-repeat: no-repeat;
            
          }

        .btn-login {
            font-size: 0.9rem;
            letter-spacing: 0.08rem;
            padding: 0.75rem 1rem;
            background-color: blue;
        }
        .card-title{
            font-size: 40px;

        }
        /*.title{
            background-color: red;
            width: 637px;
            height: 100px;
            margin-left: -50px;
            margin-top: -48px;
            text-align: center;
            border-radius: 10px 10px 0px 0px;
        }*/


.card{
  border-radius: 10px;
  background-color: white;
  opacity: 0.8;
  width: 600px;
  text-align: left;
  margin-left: 0px;
  border-radius:  10px 10px 10px 10px;
  font-size:22px bold;
  box-shadow: -1px 10px 1px -1px rgba(1, 0, 0, 9.0);
  box-sizing: border-box;
  height: 83%;
  margin-top: 600px;
  opacity: 0.9;
  
}
input[type=text],input[type=no],input[type=date]{
    height: 40px;
    font-size: 20px;
    border-radius: 5px;
  }
  input[type=text]:hover,input[type=no]:hover,input[type=date]:hover{
    transform: scale(1.05);
     border-color: blue;
  /*  transform: scale(1.01);
    box-shadow:-1px 13px 19px -1px rgba(0, 0, 0, 9.0);
  */  /*border-color: transparent;*/
  }
  label{
    font-size: 20px;
    margin-top: 0px;
  }
  /*.containe{
    background-color: red;
    width: 2030px;
  }
*/
        
    </style>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-10 col-md-7 col-lg-100 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <div class="title">
                <h5 class="card-title text-center mb-5 fw-light fs-5"><b>External Mark </b></h5>
            </div>
            <form action="" method="POST" class="form" autocomplete="off">
              <div class="form-floating mb-3">
                
                <label for="floatingInput"><b>Register No</b></label>
                <input type="text" class="form-control" placeholder="Register no" name="Regno">
              </div>
              
              <div class="form-floating mb-3">
                 <label for="floatingPassword"><b>Course Code</b></label>
                 <input type="text" class="form-control"  placeholder="Course code" name="Ccode" >
               </div>

              
               <div class="form-floating mb-3">
                 <label for="floatingPassword"><b>External Mark</b></label>
                 <input type="no" class="form-control"   placeholder="External Mark" name="Emark">
               </div>

               <div class="form-floating mb-3">
                 <label for="floatingPassword"><b>year</b></label>
                 <input type="date" class="form-control"  placeholder="Year" name="Year" >
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
 </body>
</style>
</html>

