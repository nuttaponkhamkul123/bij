<?php

    session_start();


    function updateData($pid,$name,$detail,$price,$stock,$catagory){
        include("../connector/connect.php");
        echo "Item Name :".$name."<br>";
        echo "Item Detail :".$detail."<br>";
        echo "Item Price :".$price."<br>";
        echo "Item Stock :".$stock."<br>";
        echo "Item Catagory :".$catagory."<br>";
        echo "----------------------------------------------------------------<br>";
        if($pid != "" && $name != "" && $detail != "" && $price != "" && $stock != ""){
          $command = "UPDATE computerpart SET item_name = '".$name."',Detail='".$detail."',Price='".$price."',catagoryID='".$catagory."' WHERE ComputerPartSSN = '".$pid."'";
          $res1 = mysqli_query($con,$command);
          if($res1){
            $command2 = "UPDATE stock SET amount = '".$stock."' WHERE ComputerPartSSN = '".$pid."'";
            $res2 = mysqli_query($con,$command2);
            if($res2){
              echo "Query Completed";
              //var_dump($_SESSION['list']);
              header("location:../manage_product.php");
            }else{
              echo "Error2";
            }
          }else{
            echo mysqli_error($con);
          }
        }else{
          echo "<script>alert(\"Any field should not be blank\");window.location.replace(\"../manage_product.php\")</script>";;

        }





    }
    function deleteItem($index){
          include("../connector/connect.php");
            for($k = 0 ; $k < count($_SESSION["cart"]) ; $k++){
              echo "<script>alert(\"test\")</script>";
              if($_SESSION["cart"][$k]["item_name"] == $_SESSION["list"][$_REQUEST["rem"]]["item_name"]){
                echo "<script>alert(\"test'".$k."'\")</script>";
                array_splice($_SESSION["cart"],$k,1);
              }
            }

          $stockCommand = "DELETE FROM stock WHERE ComputerPartSSN = '".$_SESSION["list"][$index]["ComputerPartSSN"]."'";
          $imageCommand = "DELETE FROM image_directory WHERE ComputerPartSSN = '".$_SESSION["list"][$index]["ComputerPartSSN"]."'";
          $waranCommand = "DELETE FROM waranty WHERE ComputerPartSSN = '".$_SESSION["list"][$index]["ComputerPartSSN"]."'";
          $comCommand = "DELETE FROM computerpart WHERE ComputerPartSSN = '".$_SESSION["list"][$index]["ComputerPartSSN"]."'";
          $del= unlink("../upload/" .$_SESSION["list"][$index]["ComputerPartSSN"]. ".jpg");
          mysqli_query($con,$stockCommand);
          mysqli_query($con,$imageCommand);
          mysqli_query($con,$waranCommand);
          mysqli_query($con,$comCommand);
          header("location:../manage_product.php");
    }
    if(isset($_REQUEST["rem"])){
        deleteItem($_REQUEST["rem"]);
    }else{
      updateData($_REQUEST["pidd"],$_REQUEST["item_name"],$_REQUEST["detail_area"],$_REQUEST["price"],$_REQUEST["stock"],$_REQUEST["cata"]);
    }





?>
