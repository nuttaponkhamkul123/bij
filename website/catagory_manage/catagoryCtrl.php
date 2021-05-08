<?php

      function fetchCatagory(){
        include("connector/connect.php");
        $command = "SELECT * FROM catagory";
        $result = mysqli_query($con,$command);
        $arr = array();
        while($row = mysqli_fetch_assoc($result)){
            array_push($arr,$row);
        }
        return $arr;
      }

  //  print_r(fetchCatagory());


?>
