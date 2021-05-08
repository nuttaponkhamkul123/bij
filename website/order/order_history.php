<?php

      include("connector/connect.php");
      $command = "SELECT orders.MemberID,delivery_detail.OrderID,orders.OrderDate,orders.ComputerPartName,orders.Price,Status_name FROM `delivery_detail` INNER JOIN orders ON orders.OrderID = delivery_detail.OrderID INNER JOIN status ON status = status.StatusID WHERE orders.MemberID = '".$_SESSION['UID']."' GROUP BY OrderID ORDER BY OrderDate DESC ;";
      //echo $command;
      $res = mysqli_query($con,$command);
      $test = array();
      while($row = mysqli_fetch_assoc($res)){
          array_push($test,$row);
      }
      $_SESSION['hist'] = $test;
      //var_dump($_SESSION['hist']);



?>
