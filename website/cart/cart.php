<?php
      include("../connector/connect.php");
      session_start();
      function taxCalculate($price){
            return $price*(107/100);
      }
      function remItem($index){
        array_splice($_SESSION["cart"], $index, 1);
      }
      //problem
      function updateQuan($index,$value){
        //index is name
              $indx = 0;

              for($i = 0 ; $i < count($_SESSION["cart"]) ; $i++){
                if($index == $_SESSION["cart"][$i]["item_name"]){
                    $indx = $i;
                }
              }



            if(checkStock($indx,$value) == TRUE){
                $indexs = 0;
                //temp is value check
                $temp = $_SESSION["cart"][$indx]["item_quantity"] + $value;
                for($i = 0 ; $i < count($_SESSION["list"]) ; $i++){
                    if($_SESSION["cart"][$indx]["item_name"] == $_SESSION["list"][$i]["item_name"]){
                          $indexs = $i;
                    }
                }
                if($temp <= $_SESSION["list"][$indexs]["amount"]){
                  $_SESSION["cart"][$indx]["item_quantity"] += $value;
                }else{
                  echo "<script>alert(\"Cannot add to cart.Excedd Limit Quantity 1\")</script>";
            }
            }else{
              echo "<script>alert(\"Invalid Quantity\")</script>";
            }


      }
      function calculatePrice(){
          $temp = 0;
          for($i = 0 ; $i < count($_SESSION["cart"]) ; $i++){
            $temp += $_SESSION["cart"][$i]["item_tax"] * $_SESSION["cart"][$i]["item_quantity"];
          }
          return $temp;
      }
      function checkStock($index,$amount){
                $temp = FALSE;

                $indexs =  0;
                for($i = 0 ; $i < count($_SESSION["list"]) ; $i++){
                    if($_SESSION["cart"][$index]["item_name"] == $_SESSION["list"][$i]["item_name"]){
                          $indexs = $i;
                    }
                }

                if($_SESSION["list"][$indexs]["amount"] >= $amount){
                        $temp = TRUE;
                }
                return $temp;
      }


      if(!(isset($_REQUEST["remBtn"]))){
        $flag = 0;
        $index = 0;
        $c["item_ssn"] = $_REQUEST["item_ssn"];
        $c["item_directory"] = $_REQUEST["item_directory"];
        $c["item_name"] = $_REQUEST["item_name"];
        $c["item_quantity"] = $_REQUEST["item_quantity"];
        $c["item_detail"] = $_REQUEST["item_detail"];
        $c["item_price"] = $_REQUEST["item_price"];
        $c["item_tax"] = taxCalculate($c["item_price"]);
        for($i = 0 ; $i < count($_SESSION["cart"]) ; $i++){
          if($c["item_name"] == $_SESSION["cart"][$i]["item_name"]){
            $flag = 1;

          }
        }
        if($flag == 1){

          updateQuan($_REQUEST["item_name"],$c["item_quantity"]);
          $_SESSION["total_price"] = calculatePrice();
          echo "<script>alert('update quantity Completed');window.location.replace('../product_summary.php');</script>";

        }else{
          $indx = 0;
          for($i = 0 ; $i < count($_SESSION["list"]) ; $i++){
            if($c["item_name"] == $_SESSION["list"][$i]["item_name"]){
              $indx = $i;
            }
          }
          if(checkStock($indx,$c["item_quantity"]) == TRUE){
            array_push($_SESSION["cart"],$c);
            $_SESSION["total_price"] = calculatePrice();
            //echo "<script>alert(\"Error\")</script>";
            header("location:../product_summary.php");
          }else{
            echo "<script>alert(\"Error\");window.location.replace('../index.php');</script>";

          }


        }

      }else{
            remItem($_REQUEST["index_rem"]);
            $_SESSION["total_price"] = calculatePrice();
            echo "<script>alert(\"Remove Completed\");window.location.replace(\"../product_summary.php\");</script>";

      }








?>
