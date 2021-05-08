<?php
    include("connector/connect.php");
    $command = "SELECT * FROM computerpart INNER JOIN image_directory ON computerpart.ComputerPartSSN=image_directory.ComputerPartSSN INNER JOIN stock ON stock.ComputerPartSSN = computerpart.ComputerPartSSN";
    $query = mysqli_query($con,$command);
    $arr = array();

    while($res =mysqli_fetch_assoc($query)){
        if($res["catagoryID"] == $_REQUEST["item_catagory"]){
            array_push($arr,$res);
        }
    }






?>
