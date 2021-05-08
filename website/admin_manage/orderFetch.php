<?php

          //echo $_REQUEST['orderid'];
          function fetch(){
            include('connector/connect.php');
            $command = "SELECT orders.OrderID,orders.MemberID,delivery_detail.firstname,delivery_detail.lastname,OrderDate,status.Status_name FROM delivery_detail INNER JOIN orders ON delivery_detail.OrderID = orders.OrderID INNER JOIN status ON status = status.StatusID ORDER BY MemberID DESC";
            $res = mysqli_query($con,$command);
            $count = count(mysqli_fetch_assoc($res));
            $arr = array();
            while($row = mysqli_fetch_assoc($res)){
                  array_push($arr,$row);
            }
            $_SESSION['hisa'] = $arr;
          }
          function trans(){
            include('../connector/connect.php');
            session_start();
            if($_REQUEST['op'] == 1){
              $com = "UPDATE delivery_detail SET status = 1 WHERE OrderID = '".$_REQUEST["orderid"]."'";
              $TranactionID = rand(100000,500000). $_SESSION["UID"];
              $command = "SELECT Price,OrderDate FROM orders WHERE OrderID = '".$_REQUEST["orderid"]."'";
              $temp = array();
              $res = mysqli_query($con,$command);
              while($row = mysqli_fetch_assoc($res)){
                array_push($temp,$row);
              }
              $total = 0;
              $a = mysqli_query($con,$com);
              //echo "a ".$a;
              for($i = 0 ; $i < count($temp) ;$i++){
                    $total += ($temp[$i]["Price"] * (107/100));
              }
              $tran = "INSERT INTO transaction(TransactionID,OrderID,Price) VALUES('".$TranactionID."','".$_REQUEST["orderid"]."','".$total."')";
              $b = mysqli_query($con,$tran);
              //echo "b ".$b;
            }else{
              $com = "UPDATE delivery_detail SET status = 0 WHERE OrderID = '".$_REQUEST['orderid']."'";
              $c = mysqli_query($con,$com);
              //echo "c ".$c;
            }
          }


          if(isset($_REQUEST["orderid"])){
            trans();
          }





?>
