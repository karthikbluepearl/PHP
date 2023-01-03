<?php
include("config.php");
$tableName = "sem_tb";
session_start();

  if(isset($_POST['update_btn']))
{
  // print_r($_POST['check']);
  if(isset($_POST['check'])){

      $CHECK_BOXES = $_POST['check'];
      $CHECK_STATUS='';


      foreach ($CHECK_BOXES as $CHECK_BOX) {
        $FIELD = $_POST['uniqueFieldName'];
        // $FIELD = $_SESSION["tableSelected"];
        echo $FIELD;


        if($FIELD!="all"){
          $FIELD_VALUE = $_POST[ $FIELD."_".$CHECK_BOX];

         
          $UpdateQry = "UPDATE {$tableName} set $FIELD = '{$FIELD_VALUE}' WHERE id=$CHECK_BOX"; 

          $updateRes = $mysqli->query($UpdateQry);

           if($updateRes){
            // echo '<script>alert("updated Succssfully!!!")</script>';
            $CHECK_STATUS = "Updated Succssfully!!!";
            header("Location:EXTERNALMARK_UPDATION_TABLE.php");
           } 
           else{
            // echo '<script>alert("Something Error!!!")</script>';
            $CHECK_STATUS = "Something Error!!!";
           }


        }
        else{
           echo $FIELD;
        }
       
    
      }
       echo $CHECK_STATUS;
    }
 
   else{
       echo'<script>alert("Please Select Atleast One Record!!!")</script>';
        header("Location:Sem_tb_table.php");
       
    } 


 }






?>
