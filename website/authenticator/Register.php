<?php

      function register($username,$password,$firstname,$lastname,$email,$birthdate,$gender,$addr,$city,$distrinct,$postcode,$road){

          include_once("../connector/connect.php");
          mysqli_set_charset($con, "utf8");
          if($username != "" && $password != "" && $firstname != "" && $lastname != "" && $email != "" &&
          $birthdate != "" &&  $gender != "" && $addr != "" && $city != "" && $distrinct != "" && $postcode != "" && $road != ""){
            $user_create =  "INSERT INTO user(username,password) VALUE('".$username."','".$password."')";
            $check_duplicate = "SELECT username FROM user WHERE username = '".$username."'";
            $result = mysqli_query($con,$check_duplicate);
            if(count(mysqli_fetch_assoc($result))>0){
              echo "Duplicate Account";
            }else{
              $insert_user = mysqli_query($con,$user_create);
              $command = "SELECT MemberID FROM user WHERE username = '".$username."'";
              $comq = mysqli_query($con,$command);
              $list1 = mysqli_fetch_array($comq);
              $uid = $list1[0];
              member_regis($uid,$firstname,$lastname,$email,$birthdate,$gender,$addr,$city,$distrinct,$postcode,$road);


            }



          }else
            echo "<script>alert(\"Data Should not be blank\");window.location.replace(\"../register-page.php\");</script>";




      }
      function member_regis($uid,$firstname,$lastname,$email,$birthdate,$gender,$addr,$city,$distrinct,$postcode,$road)
      {

                $con = mysqli_connect("localhost","root","","bij");
                mysqli_set_charset($con, "utf8");
                $member_user = "INSERT INTO member(MemberID,fname,lname,birthdate,Gender,Email,city,distrinct,road,postcode) VALUE('".$uid."','".$firstname."','".$lastname."','".$birthdate."','".$gender."','".$email."','".$city."','".$distrinct."','".$road."','".$postcode."')";
                $result = mysqli_query($con,$member_user);
                $perm = "INSERT INTO permission(MemberID,perm) VALUE('".$uid."',0)";
                mysqli_query($con,$perm);
                if($result){
                  $q1 = "INSERT INTO profile_picture(MemberID,directory) VALUE('".$uid."','/profile/man.jpg')";
                  $res111 = mysqli_query($con,$q1);
                  echo "<script>alert('Created');window.location.replace(\"../index.php\");</script>";

                }else{
                  echo "<script>alert('Error');window.location.replace(\"../register-page.php\");</script>";
                }
      }
      function getList1($username,$password,$firstname,$lastname,$email,$birthdate,$gender,$addr,$city,$postcode,$road){
          echo $username."<br>";
          echo $password."<br>";
          echo $firstname."<br>";
          echo $lastname."<br>";
          echo $email."<br>";
          echo $birthdate."<br>";
          echo $gender."<br>";
          echo $addr."<br>";
          echo $city."<br>";
          echo $postcode."<br>";
          echo $road."<br>";

      }
      function date_convert($day,$month,$year){
        $date_time = $day."-".$month."-".$year;
        $newDate = date("Y-m-d", strtotime($date_time));
        return $newDate;
      }

        $bd = date_convert($_REQUEST["day1"],$_REQUEST["month1"],$_REQUEST["year1"]);
      //  getList1($_REQUEST["user1"],$_REQUEST["pwd1"],$_REQUEST["fname1"],$_REQUEST["lname1"],$_REQUEST["email1"],$bd,$_REQUEST["gender1"],$_REQUEST["addr1"],$_REQUEST["city1"],$_REQUEST["postcode1"],$_REQUEST["road1"]);
      register($_REQUEST["user1"],$_REQUEST["pwd1"],$_REQUEST["fname1"],$_REQUEST["lname1"],$_REQUEST["email1"],$bd,$_REQUEST["gender1"],$_REQUEST["addr1"],$_REQUEST["city1"],$_REQUEST["dis1"],$_REQUEST["postcode1"],$_REQUEST["road1"]);




    ?>
