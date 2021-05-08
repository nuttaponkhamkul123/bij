<?php
        session_start();
        include_once("../connector/connect.php");
        if(isset($_SESSION["usr"])){
            if($_SESSION["usr"] == $_REQUEST["user"]){
              echo "<script>alert('Already log in')</script>";
            }
        }else{
          $command = "SELECT * FROM user WHERE username = '".$_REQUEST["user"]."' AND password = '".$_REQUEST["pwd"]."'";
          $result = mysqli_query($con,$command);
          $set = array();
          $result_01 = mysqli_fetch_assoc($result);
          if(count($result_01) > 0){
              $row  = $result_01;
              $prof = "SELECT * FROM member WHERE MemberID = '".$row["MemberID"]."'";
              $res1 = mysqli_query($con,$prof);
              //echo count(mysqli_fetch_array($res1));
              $row1 = mysqli_fetch_assoc($res1);
              if(count($row1)>0){
                //echo "Counting " .count($row1);
                $_SESSION["UID"] = $row1["MemberID"];
                $_SESSION["usr"] = $_REQUEST["user"];
                $_SESSION["pwd"] = $_REQUEST["pwd"];
                $_SESSION["Firstname"] = $row1["fname"];
                $_SESSION["Lastname"] = $row1["lname"];
                $_SESSION["bd"] = $row1["birthdate"];
                $_SESSION["gender"] = $row1["Gender"];
                $_SESSION["email"] = $row1["Email"];
                $_SESSION["city"] = $row1["distrinct"];
                $_SESSION["road"] = $row1["road"];
                $_SESSION["postcode"] = $row1["postcode"];
                $_SESSION["cart"] = array();

                $temp = $_SESSION["UID"];
                $perm = "SELECT perm FROM permission WHERE MemberID = '".$temp."'";
                $permission_check = mysqli_query($con,$perm);
                $result_perm =  mysqli_fetch_array($permission_check);
                $_SESSION["perm"] = $result_perm[0];

                echo "<script>alert(\"Login Success\");window.location.replace(\"../index.php\")</script>";
                /*echo "<br>UID : " .$_SESSION["UID"];
                echo "<br>Firstname : " .$_SESSION["Firstname"];
                echo "<br>Lastname : " .$_SESSION["Lastname"];
                echo "<br>BirthDate : " .$_SESSION["bd"];
                echo "<br>Gender : " .$_SESSION["gender"];
                echo "<br>Email : " .$_SESSION["email"];
                echo "<br>City : " .$_SESSION["city"];
                echo "<br>Road : " .$_SESSION["road"];
                echo "<br>PostCode : " .$_SESSION["postcode"]; */
              }
          }else{
            echo "<script>alert(\"Incorrect username or password\");window.location.replace(\"../index.php\")</script>";

          }
        }

?>
