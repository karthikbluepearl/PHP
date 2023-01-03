<?php
session_start();
include("config.php");
include('config.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- Bootstrap core JavaScript-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Page level plugin JavaScript--><script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

        

<title>Internal Marks Records</title>

<style>
  *{
    margin: 0;
    padding: 0;
    font-family: arial;
    box-sizing: border-box;
  }
  body{
    height: 10vh;
    display: grid;
    place-items: center;
    background-color:white;
   /* background-image: url('https://trbahadurpur.com/wp-content/uploads/2021/01/background-5.jpg');
        background-repeat: no-repeat;
        background-size: 100%;
   */ 
}
  .table{
    width: 150px;
   /* box-shadow: 10px 12px 19px -6px rgba(0, 0, 0, 9.0);
   */ margin-left: 10px;
    margin-top: 0px;
    margin-right: 20px;
  }
  table,td{
    padding: 20px;
    border: 1px solid lightgray;
    border-collapse: collapse;
    text-align: center;
    cursor: pointer;

  }
  td{
    font-size: 10px;
    border: none;
  }
  th{
    background-color: gray;
    color: black;
    font-size: 15px;
    background: linear-gradient(to right,lightgray,lightgray);
    border: none;

     


  }
  tr:nth-child(odd),input{
    background-color: white;

  }
  tr:nth-child(even),input{
    background-color: white;

  }
  .card{
    background-color: darkgray;
    box-shadow: 5px -3px 5px -4px rgba(0, 0, 0, 9.0);
    box-sizing: border-box;
    position: relative;
    border-radius: 0px 0px 0px 0px;
    text-align: center;
    opacity: 0.9;
    top: 10px;
  }
  
  /*tr:nth-child(even){
    background-color: darkgray;
  }
  input:nth-child(even){
    background-color: darkgray;
  }
  */input{
    width: 185px;
    height: 30px;
    background-color:white;
  }
a{
    text-decoration: blink;
    background-color: transparent;
    color: white;
  }
   .btn{
    font-size: 25px;
    margin-left: 30px;
    background-color: blue;
    position: absolute;
    top: 10px;
    letter-spacing: 2px;
    padding: 10px 30px 10px 30px;
    right:1850px ;

}

    
  }
  .button2{
    font-size: 30px;
    background-color: black;
    color: white;
    padding: 10px;
    border: none;
    cursor: pointer;
    text-align: center;
    border-radius: 20px;
    width: 170px;

    margin: 80px;
    margin-left: 1600px;
 
  }
  
  .box{
    text-align: center;
    outline:none;
    border: none;
    font-size: 15px;
    /*background-color: #d44a0f;*/

  }
   
  
  header{
    padding-top: 20px;
    height: 110px;
    background-color: darkgray;
    color: black;
   /* border-radius: 10px 10px 10px 10px;
   */ opacity: 0.9;
    width: 100%;
     box-shadow: 10px -3px 15px -4px rgba(0, 0, 0, 9.0);
   text-align: center;
    margin-top: 10px;
    box-sizing: border-box;
    position: relative;
  }
  .title1{
     font-size: 30px;
     position: absolute;
     left: 400px;
     margin-top: -120px;
     padding: 20px;
  
   }
  .title2{
     font-size: 30px;
     position: absolute;
     left: 430px;
     margin-top: -50px;
  

   }
  
  .nav{
    content: "";
    background-color: white;
    width: 100%;
    height: 100px;
    margin-top: 40px;
    box-shadow: 10px 12px 19px -1px rgba(0, 0, 0, 9.0);
    box-sizing: border-box;
    position: relative;
    border-radius: 20px 20px 0px 0px;
    opacity: 0.9;
    
  }
  .Head{
    height: 100px;
    font-size: 50px;
    padding-right:0px ;
    background-color: darkgray;
  }
  .title{
    display: inline-block;
    padding-left: 0px;
    font-size: 20px;
}
  .REGNO_BOX{
   font-size: 20px;
   border: none;
   background-color: darkgray;
  }
  .btnExport{
    border-style: none;
    box-sizing: border-box;
    background-color: green;
    color: white;
    border-radius: 3px;
    margin-top: 20px;

  }
  img{
    width: 120px;
    height: 90px;
    position: relative;
    right:600px ;
    top: -10px;
  }
  
  
</style>

</head>
<body>
<div id="datatable">
  <header>
    <img src="https://upload.wikimedia.org/wikipedia/en/e/e5/Mkulogo.jpg">
    <h4 class="title1"><b>MCA - END SEMESTER EXAMINATION<b></h4>
    <h4 class="title2"><b>SEMESTER-RESULT(PROVISIONAL)<b></h4>
  </header>
  <na>

<div class="card">
<div class="Head">
 
  <!-- <h6 class="title"><b>Department :</b></h6>
   --><h6 class="title"><b>Register no :</b></h6>
    <input class="REGNO_BOX" readOnly type="text"value="<?=  $_SESSION['REGNO']; ?>">
 
</div> 
<div id="table"class="form">
<table  id="dataTable"class="table" border="0" >
<thead class="thead-light">
<tr>
<th><strong>S.No</strong></th>
<th><strong>Subject Code</strong></th>
<th><strong>Subject</strong></th>
<th><strong>Internal Mark</strong></th>
<th><strong>External Mark</strong></th>
<th><strong>Total</strong></th>
<th><strong>Result</strong></th>
 </tr>
</thead>
<!---------- SELECT FORM DATA IN DATABASE>--->
<tbody>
<tbody>

<?php

// SELECT sem_tb.Ccode,coursecode_tb.tb_Coursename,sem_tb.Result FROM sem_tb INNER JOIN coursecode_tb ON sem_tb.Ccode=coursecode_tb.tb_Coursecode;


// SELECT sem_tb.*,coursecode_tb.tb_Coursename FROM sem_tb LEFT JOIN coursecode_tb ON sem_tb.Ccode=coursecode_tb.tb_Coursecode WHERE sem_tb.Regno='20mca01';

$CourseCode_Regno = $_SESSION['CourseCode_Regno'];
echo "<script>alert($CourseCode_Regno);</script>";
$tableName = "sem_tb";
// $sel_query="Select * from {$tableName} where Regno = '{$CourseCode_Regno}'";
$sel_query="SELECT sem_tb.*,coursecode_tb.tb_Coursename FROM sem_tb LEFT JOIN coursecode_tb ON sem_tb.Ccode=coursecode_tb.tb_Coursecode WHERE sem_tb.Regno='{$CourseCode_Regno}'";
$result = mysqli_query($mysqli,$sel_query);
$rowCount = 1;
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td><?= $rowCount; ?><td>
  <input class="box" readOnly type="text"value="<?= $row['Ccode']  ?>">
</td>

<td>
  <input class="box" readOnly type="text" value="<?= $row['tb_Coursename']   ?>">
</td>
 
<td>
  <input class="box" readOnly type="text" 
   value="<?=  $row['Imark'] ?>" >
</td>

<td>
  <input class="box" readOnly type="text" 
   value="<?=  $row['Emark'] ?>">
</td>

<td>
  <input class="box" readOnly type="text"  
  value="<?= $row['Result'] ?>">
</td>

<td>
  <input class="box" readOnly type="text" 
  value="p">
</td>

</tr>
<?php 
$rowCount++;
} ?>
</tbody>
</table>
<div id="pageNavPosition" class="pager-nav"></div>

</div>
</div>
   <!-- <button class="button2" name="delete_btn" value="DeleteRecords">Delete</button> -->
</form>
</div>
<input type="button" id="btnExport" class="btnExport" value="Download" onclick="Export()" />


<!----------------datatable for table---------------->
</script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script type="text/javascript">
        function Export() {
            html2canvas(document.getElementById('datatable'), {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("MCA RESULT.pdf");
                }
            });
        }
    </script>




</body>
</html>
