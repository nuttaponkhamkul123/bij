<?php
    include '../connector/connect.php';
    if($_REQUEST["cata_ID"] != "" &&  $_REQUEST["cata_name"] != ""){
      $command = "INSERT INTO catagory(catagoryID,name) VALUES('".$_REQUEST["cata_ID"]."','".$_REQUEST["cata_name"]."')";
      mysqli_query($con,$command);
      echo "<script>alert(\"add completed\");window.location.replace('../index.php');</script>";
    }else{
      echo "<script>alert(\"Error\");window.location.replace('../index.php');</script>";
    }





?>
