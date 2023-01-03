<?php
session_start();
include("config.php");
    include('config.php');
    

$tableArray = array();

// ----------------------------------FIELD INSERTING IN DROP DOWN
  function TableNameListOut()
  {
    global $mysqli;
    $tableName = "sem_tb";
    $tableqry = "describe {$tableName}";
    $tableres = $mysqli->query($tableqry);
    print_r($tableres);
    if($tableres->num_rows>0){
      while($tablerow = $tableres->fetch_assoc()){
        // return $tablerow['Field'];
        $tableField = $tablerow['Field'];
        echo "<option value='$tableField'>{$tableField}</option>";
        // array_push($tableArray, $tableField);
      }
    }
  }

// ----------------------FIELD VALUE SELECTING DYNAMIC
  function ListOutTable()
  {
    global $mysqli,$tableArray;
    $tableName = "sem_tb";
    $tableqry = "describe {$tableName}";
    $tableres = $mysqli->query($tableqry);
    if($tableres->num_rows>0){
      $count = 0;
      while($tablerow = $tableres->fetch_assoc()){
        $tableField = $tablerow['Field'];
        // echo $tableField;
        // $tableArray[] = $tableField;
        array_push($tableArray , $tableField );
      }
    }
    // return $tableArray;
  }
  
  ListOutTable();
  // echo count($tableArray);


  if(isset($_POST['tablefield'])){
    $_SESSION['tableSelected'] = $_POST['tablefield'];
  }
  else{
    $_SESSION['tableSelected'] = "all";
  }

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

        

<title>Student External Marks</title>


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
   /* background-color:bisque;
   */ 
   background: linear-gradient(to right,royalblue,royalblue);
     /* background-image: url('https://trbahadurpur.com/wp-content/uploads/2021/01/background-5.jpg');
        background-repeat: no-repeat;
        background-size: 100%;
   */ 
}
  .table{
    width: 150px;
   /* box-shadow: 10px 12px 19px -6px rgba(0, 0, 0, 9.0);
   */ margin-left: 8px;
    top: -40px;
    position: relative;
  }
  table,td,th{
    padding: 20px;
    border: 1px solid lightgray;
    border-collapse: collapse;
    text-align: center;
    cursor: pointer;
  }
  td{
    font-size: 0px;
    border: none;
  }
  th{
    background-color: royalblue;
    color: blue;
    font-size: 15px;
     background: linear-gradient(to right,grey);
   
  }
  /*tr:nth-child(odd),input{
    background-color: white;

  }
  tr:nth-child(even),input{
    background-color: white;

  }
  */

  tr:hover{
    background-color: white;
    transform: scale(1.0);
    box-shadow: 2px 2px 10px rgba(0,0,0,1), -1px -1px 1px rgba(0,0,0,0);
    font-size: 20px;
  }
  /*input[type=text]:hover{
    background-color: ;
    transform: scale(1.01);
    box-shadow: 2px 2px 12px rgba(0,0,0,2), -1px -1px 8px rgba(0,0,0,0);
  }
  */@media only screen and (max-width: 1868px){
    table{
      width: 190px;
    }
  }
  
  .card{
    background-color: white;
   /* max-width: 1850px;*/
    /*height:10%;
   */ box-shadow: 5px 5px 10px -1px rgba(0, 0, 0, 9.0);
    box-sizing: border-box;
    position: relative;
    border-radius: 0px 0px 20px 20px;
    text-align: center;
    opacity: 0.9;
    margin-top: 0px;
  }
  h4{
    font-size: 20px;
  background: linear-gradient(to right,white,white);
    height:100px;
     padding-top: 30px;
     box-sizing: border-box;
  }
  
  
  /*tr:nth-child(even){
    background-color: darkgray;
  }
  input:nth-child(even){
    background-color: darkgray;
  }
  */input{
    width: 180px;
  }
a{
    text-decoration: blink;
    background-color: transparent;
    color: white;
  }
   .btn{
    font-size: 15px;
    right:740px;
    background-color: blue;
    position: absolute;
    top: -50px;
    letter-spacing: 2px;
    padding: 10px 30px 10px 30px;
    position: relative;
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
    font-size: 18px;
    width: 160px;
    /*background-color: #d44a0f;*/

  }
   
   .button1:hover{
    opacity: 4;
    background-color:green ;
   }
   .button2:hover{
    opacity: 4;
    background-color:red ;
   }
.check{
    position: relative;
    top: 10px;
    left: 10px;
    -webkit-appearance: none;
    width: 60px;
    border-radius: 20px;
   
    height:30px;
    background: #ccc;
    cursor: pointer;
    outline: none;
    
    
 } 
 .check:checked{
  background:#ccc;
}
.check::before{
  content: "";
  position: absolute;
  width: 22px;
  height: 22px;
  background-color: black;
  border-radius: 20px;
  top: 4px;
  left: 5px;
  transition:.1s linear ;

} 
.check:checked::before{
  left: 34px;
  background-color: green;

} 
select{
    font-size: 15px;
    background-color: black;
    color: white;
    padding: 0px;
    */border: none;
    cursor: pointer;
    text-align: center;
    border-radius: 5px ;
    width: 300px;
    margin-left: 1000px;
    margin-top:10px;
    margin-bottom:10px;
    margin-right: 20px;
    position: relative;
    height: 40px;
   
    }
    option{
    font-size: 20px;
    background-color: white;
    color: black;
    padding: 10px;
    border: none;
    cursor: pointer;
    text-align: center;
  }
  /*#flexCheck{
    margin-left:1200px ;
  }
  */
  
  h2{
    font-size: 30px;
    padding-top: 20px;
    height: 70px;
    /*background-color: bisque;
    */
    color: #fff;
    border-radius: 10px 10px 10px 10px;
    opacity: 0.9;
    width: 100%;
    box-shadow: 5px 5px 10px -1px rgba(0, 0, 0, 9.0);
    text-align: center;
    margin-top: 20px;
    /*background: linear-gradient(to right,royalblue,white);*/
  
  }
  .nav{
    content: "";
    background-color: white;
    width: 100%;
    height: 60px;
    margin-top: 40px;
    box-shadow: 5px 1px 10px -1px rgba(0, 0, 0, 9.0);
    box-sizing: border-box;
    position: relative;
    border-radius: 20px 20px 0px 0px;
    opacity: 0.9;
    margin-right: 0px;
    
  }
  /*h4{
    margin-top: -10px;
  }
  */
  .search{
    top: -50px;
    right: 250px;
    bottom: 0px;
    width: 300px;
    height: 30px;
    border-color: blue;
    border-radius: 5px;
    font-size: 20px;
    position: relative;
}
.search:hover{
  transform: scale(1.1);
  }  

  
  
</style>



</head>
<body>

    <h2>View Student Semster Marks Records</h2>
     <!--  <button class="btn1" action="table.php" onclick="ExportToExcel('xlsx')">Export table to excel
    </button> -->
  
<!-- <div class="search">
  <input id="txt_searchall" type="text" placeholder="Search..">
  
 </div>
 -->


<div class="card">
  <form action="<?php $_SERVER['PHP_SELF']?>" method="post" name='frm12'>
      <select name="tablefield" id="tablefield">
        <option value="all" selected>All</option>
        <?php TableNameListOut(); ?>
      </select>
</form>
 <script type="text/javascript">
   $(document).ready(function(){
    $("#form1 #flexCheck").click(function(){
      $("#form1 input[type = 'checkbox']").prop('checked',this.checked);

    });
   });
 </script>



  <form action="EXTERNALMARK_TABLE_UPDATION_UPDATE.php" method="post" id="form1"name="frm1">
 <input type="hidden" name="uniqueFieldName" id="uniqueFieldName" value="<?= $_SESSION['tableSelected']; ?>">
 <!-- <button class="btn1 btn-primary btn-lg" action="Sem_tb_table.php" onclick="ExportToExcel('xlsx')">excel</button>
  -->
  <input type="search" name="search" class="search" id="search" value="" placeholder="SEARCH">
  
  <button class="btn btn-primary btn-lg"  name="update_btn" value="UpdateRecords">Update</button>
  
   
 
  
  <!--<form action="" method="post">
    <input type="submit" name="update_btn" value="UpdateRecords">--->

<div id="table"class="form">
<table  id="dataTable"class="table" border="0" >
<thead class="thead-dark">
  <!-- <input type="checkbox" class="check"name="check[]" value="<?= $row["id"]; ?>"></td> -->
<!--   <select name="tablefield" id="tablefield">
    <option value="all" selected>All</option>
    <?php //TableNameListOut(); ?>
  </select> -->
  

<tr>
<th><strong>Checkboxes</strong><input type="checkbox" id="flexCheck"class="check"name="Allcheck" value=""></th>
<th><strong>S.No</strong></th>

<th><strong>Reg No</strong></th>
<th><strong>Cource Code</strong></th>
<th><strong>Internal</strong></th>
<th><strong>External</strong></th>
<th><strong>Year</strong></th>
<th><strong>Result</strong></th>
 </tr>
</thead>
<!---------- SELECT FORM DATA IN DATABASE>--->
<tbody>
<?php
$count=0;
$tableName = "sem_tb";
$sel_query="Select * from {$tableName} ORDER BY id asc;";
$result = mysqli_query($mysqli,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>

<td>
  <input type="checkbox" id="flexCheckInterminate"class="check"name="check[]" value="<?= $row["id"]; ?>"></td>

<td><strong><?= $row['id']; ?></strong></td>
<!-- <td><?= $tableArray[$count]."_".$row["id"]; ?></td> -->

<!-- <td>
  <input class="box" readOnly type="text" name="reg_<?= $row["id"]; ?>" value="<?= $row["Regno"]; ?>">
</td> -->

<td>
  <input class="box" readOnly type="text" name="<?= $tableArray[1]."_".$row["id"]; ?>" 
  value="<?= $row["Regno"]; ?>">
</td>
 
<td>
  <input class="box" readOnly type="text" name="<?= $tableArray[2]."_".$row["id"]; ?>"
   value="<?= $row["Ccode"]; ?>">
</td>

<td>
  <input class="box" readOnly type="text" name="<?= $tableArray[3]."_".$row["id"]; ?>"
   value="<?= $row["Imark"]; ?>">
</td>

<td>
  <input class="box" readOnly type="text" name="<?= $tableArray[4]."_".$row["id"]; ?>" 
  value="<?= $row["Emark"]; ?>">
</td>

<td>
  <input class="box" readOnly type="text" name="<?= $tableArray[5]."_".$row["id"]; ?>" 
  value="<?= $row["Year"]; ?>">
</td>

<td>
  <input class="box" readOnly type="text" name="<?= $tableArray[6]."_".$row["id"]; ?>" 
  value="<?= $row["Result"]; ?>">
</td>

<!-- <td>
  <input class="box" readOnly type="text" name="<?= $tableArray[7]."_".$row["id"]; ?>" 
  value="<?= $row["Amark"]; ?>">
</td>
<td>
  <input class="box" readOnly type="text" name="<?= $tableArray[8]."_".$row["id"]; ?>" 
  value="<?= $row["total"]; ?>">
</td>
 -->
</tr>
<?php 
// $count++; 
} 
?>
</tbody>
</table>
</div>
</div>


   <!-- <button class="btn btn-primary btn-lg"  name="update_btn" value="UpdateRecords">Update</button>
    --><!-- <button class="button2" name="delete_btn" value="DeleteRecords">Delete</button> -->
</form>


<!----------------datatable for table---------------->
<script>
   $(document).ready(function () {
  $('#dataTable').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
// $(function () {
//  $('#dataTable').DataTable({
//       "pageLength": 5,
//       "paging": true,
//       "searching": false,
//       // "ordering": true,
//       // "info": true,
//       // "autoWidth": true,
//       // "lengthChange": false
      
//       });
      

//   });



var Checkboxes = document.getElementsByName('check[]');
const uniqueFieldName = document.getElementById('uniqueFieldName').value;


// var selectedField;

for(i=0;i<Checkboxes.length;i++)
{
  Checkboxes[i].addEventListener('change',function(){
    const ASSIGNMENT_FIELD = document.getElementsByName(uniqueFieldName+"_"+this.value)[0];
    console.log(uniqueFieldName);
    if(this.checked==true){
      // console.log(uniqueFieldName);
      // const ASSIGNMENT_FIELD = document.getElementsByName('assignment_mark_'+this.value)[0];
      // console.log(ASSIGNMENT_FIELD);
      ASSIGNMENT_FIELD.readOnly = false;
      return;
    }
    ASSIGNMENT_FIELD.readOnly = true;
    console.log("Do not edit please select Checkbox!!");

  });
}

  var tablefield  = document.getElementById('tablefield');

tablefield.addEventListener('change',function(){
  document.forms.frm12.submit();
  // console.log(document.forms.frm1);
});



</script>
    
    <script>

        function ExportToExcel(type, fn, dl) {
            var elt = document.getElementById('dataTable');
            var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
            return dl ?
                XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }) :
                XLSX.writeFile(wb, fn || ('MySheetName.' + (type || 'xlsx')));

           
        }

    </script>


</body>
</html>
