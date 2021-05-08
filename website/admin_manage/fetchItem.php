<?php

    function fetchItem(){
      include_once("connector/connect.php");
      $command = "SELECT * FROM computerpart INNER JOIN stock ON stock.ComputerPartSSN = computerpart.ComputerPartSSN
      INNER JOIN image_directory ON image_directory.ComputerPartSSN = computerpart.ComputerPartSSN
      INNER JOIN catagory ON computerpart.catagoryID = catagory.catagoryID";

      $res = mysqli_query($con,$command);
      $_SESSION["list"]= array();
      $arr = array();
      //echo count(mysqli_fetch_assoc($res));
      while($row = mysqli_fetch_assoc($res)){
          array_push($arr,$row);
      }

      $_SESSION["list"] = $arr;
    }

    //fetchItem();







?>
