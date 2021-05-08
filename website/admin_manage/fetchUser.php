<?php
        session_start();
        header('Content-Type: application/json');
        $con = mysqli_connect("localhost","root","","bij");
        $sql = "SELECT * FROM user WHERE MemberID <> '".$_SESSION["UID"]."'";
        $result = mysqli_query($con,$sql);
        $list = array();
        while($row = mysqli_fetch_assoc($result)){
            array_push($list,$row);
        }
        echo json_encode($list);






?>
