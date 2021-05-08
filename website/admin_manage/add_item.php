<?php
      session_start();
      function addItem($name,$detail,$price,$catagory,$warantyAmount,$stockAmount,$directory){
        include("../connector/connect.php");
        $_SESSION["temp"] = 0;
          $computerPart_query = "INSERT INTO computerpart(item_name, Detail, Price, catagoryID) VALUES ('".$name."','".$detail."','".$price."','".$catagory."')";
          $result_01 = mysqli_query($con,$computerPart_query);
          $id_query = "SELECT computerPartSSN FROM computerpart WHERE item_name = '".$name."'";
          $id_q = mysqli_query($con,$id_query);
              $id_list = mysqli_fetch_array($id_q);
              $_SESSION["temp"] = $id_list[0];
          if($result_01){
              if($warantyAmount != ""){
                  addWaranty($_SESSION["temp"],$warantyAmount);
              }
              addStock($_SESSION["temp"],$stockAmount);

          }

          uploadPic($_SESSION["temp"],$directory);


      }
      function addWaranty($id,$amount){
        include("../connector/connect.php");
        $warantyQuery = "INSERT INTO waranty(ComputerPartSSN,WarantyAmount) VALUES ('".$id."','".$amount."')";
        $result_02 = mysqli_query($con,$warantyQuery);
      }
      function addStock($id,$amount){
        include("../connector/connect.php");
            $stockQuery = "INSERT INTO stock(ComputerPartSSN,amount) VALUES ('".$id."','".$amount."')";
            $result_03 = mysqli_query($con,$stockQuery);
      }
      function uploadPic($id,$pic){
        include("../connector/connect.php");

        if(move_uploaded_file($pic,"../upload/".$_FILES["directory"]["name"])) // Upload/Copy
                  {
              $newFile = rename("../upload/".$_FILES["directory"]["name"],"../upload/".$id.".jpg");
              echo "Copy/Upload Complete.<br>";
              $upload_directory = "/upload/".$id.".jpg";
              $upload_query = "INSERT INTO image_directory(ComputerPartSSN,directory) VALUES ('".$id."','".$upload_directory."')";
                $result_04 = mysqli_query($con,$upload_query);
              }
          header("location:../index.php");
      }



      $flag = 0;
      for($i = 0 ;$i < count($_SESSION["list"]) ; $i++){
        echo "<script>alert('test')</script>";
        if($_REQUEST["item_name"] == $_SESSION["list"][$i]["item_name"]){

            $flag = 1;
        }
      }



      if($flag == 1){
          echo "<script>alert('Cannot add Item');window.location.replace('../index.php');</script>";
      }else{
        addItem($_REQUEST["item_name"],$_REQUEST["Detail"],$_REQUEST["Price"],$_REQUEST["catagory"],$_REQUEST["WarantyAmount"],$_REQUEST["amount"],$_FILES["directory"]["tmp_name"]);
      }



?>
