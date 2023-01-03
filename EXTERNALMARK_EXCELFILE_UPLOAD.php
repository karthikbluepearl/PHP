<!DOCTYPE html>
<html>
<head>
    <title>External file Uploads</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<style>
    body{
        background-color: white;
        background-image: url('https://www.xprienz.com/wp-content/uploads/2018/05/bg-3.jpg');
        background-repeat: no-repeat;
        background-size: 2060px;
        display: grid;

     }
    .container{
        width:100%;
        height:400px;
        background-color: white;
        
    }
    .container-1{
        position: absolute;
        max-width: 700px;
        max-height: 700px;
        background-color: floralwhite;
        border-radius: 10px;
        font-size: 40px;
        font-family: sans-serif;
        padding: 10px 70px;
        position: absolute;
        top: 100px;
        left: 300px;
        opacity: 0.8;
        display: flex;
    }
    .form-control{
        font-size: 30px;
        height: 55px;
        transition: all 300ms ease;
        box-sizing: border-box;
    }
    .form-control:hover{
        border-color: blue;
    }
    .btn{
     margin-top: 10px;
     font-size: 20px;
     background-color: darkblue;

}
.card{
    height: 200px;
    width: 700px;
    background-color: blue;
    margin-left: -70px;
    margin-top: -10px;
    border-radius: 10px 10px 0px 0px;
   
}
img{
     /*background-image:url('https://www.easylifeit.com/wp-content/uploads/2020/05/excel.png');*/
    background-repeat: no-repeat;
    width: 100%;
    height: 200px;
    border-radius: 10px 10px 0px 0px;
   
}
input[type=file]{
    width: 100%;
    height: 50px;
    font-size: 25px;
    margin-left: -19px;
}

</style>
</head>
<body>
    


<div class="container-1">
    <div class="cols-md-6">

        <form action="Excel_index.php" method="post" enctype="multipart/form-data">

            <div class="custom-file">
                <div class="card">

                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT4Fjdza13MJNViKw-qY-0Qsn6aZAuBTznf97MtqYi7XXw9mNfYkjloWKwJZOroSMzLp6o&usqp=CAU">

                </div>


                <label for="formFileMultiple" class="custom-file-label" for="customFileInput">Select Your External File</label>
                <input type="file" name="file" class="form-control" id="customFileInput"  accept=".xls,.xlsx,.csv" multiple>
            </div>
            <div class="input-group-append">
                <button type="submit" name="import" class="btn btn-primary mb-2" id="customFileInput">Upload</button>
            </div>
        </form>
    </div>
</div>
<script>
    document.querySelector('.custom-file-input').addEventListener('change', function (e) {
      var name = document.getElementById("customFileInput").files[0].name;
      var nextSibling = e.target.nextElementSibling
      nextSibling.innerText = name
    })
  </script>
</body>
</html>

<?php 
error_reporting(0);
$conn=mysqli_connect("localhost","root","","demo");

require_once('plugin/php-excel-reader/excel_reader2.php');
require_once('plugin/SpreadsheetReader.php');

if (isset($_POST["import"]))
{
$allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
if(in_array($_FILES["file"]["type"],$allowedFileType)){

    // is uploaded file
     $targetPath = 'uploads/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        // end is uploaded file

        $Reader = new SpreadsheetReader($targetPath);
        
        $sheetCount = count($Reader->sheets());
        for($i=0;$i<$sheetCount;$i++)
        {
           $Reader->ChangeSheet($i);

           foreach ($Reader as $Row)
            {
                $Regno = mysqli_real_escape_string($conn,$Row[0]);
                $Ccode = mysqli_real_escape_string($conn,$Row[1]);
                $Imark = mysqli_real_escape_string($conn,$Row[2]);
                $Emark = mysqli_real_escape_string($conn,$Row[3]);
                $year = mysqli_real_escape_string($conn,$Row[4]);
                $Result = mysqli_real_escape_string($conn,$Row[5]);
                if (!empty($Regno) || !empty($Ccode) || !empty($Imark) || !empty($Emark) || !empty($year)|| !empty($Result)) {
                    $total = $Imark + $Emark;
                    $query =  "INSERT INTO sem_tb (Regno,Ccode,Imark,Emark,Year,Result) VALUES
                    ('{$Regno}','{$Ccode}',{$Imark},${Emark},'{$Year}',{$total})";
                    $result = $conn->query($query);
                    echo $result;
                    if ($result) {
                        $type = "success";
                        $message = "Excel Data Imported into the Database";
                    } else {
                        $type = "error";
                        $message = "Problem in Importing Excel Data";
                    }
                }

                 
            }

        }
        echo "<script>alert('done')</script>";
        
}
else
  { 
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
  }

}

 ?>