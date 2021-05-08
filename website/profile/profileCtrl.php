<?php

      function permFetch(){
        include("connector/connect.php");
        $command = "SELECT Perm_name FROM (SELECT * FROM permission INNER JOIN permission_list ON permission.perm = permission_list.Perm_number WHERE MemberID = '".$_SESSION["UID"]."') As one";
        $query = mysqli_query($con,$command);
        $row = mysqli_fetch_assoc($query);

        $temp = $row["Perm_name"];
        return $temp;
      }
      function profile_pic_fetch(){
        include("connector/connect.php");
        $command = "SELECT * FROM profile_picture WHERE MemberID = '".$_SESSION["UID"]."'";
        $query = mysqli_query($con,$command);
        $row = mysqli_fetch_assoc($query);
        if(count($row) > 0)
        $temp = $row["directory"];
        else $temp = "profile/man.jpg";

        return $temp;
      }

      function uploadProfile($id,$pic){

        include("../connector/connect.php");

        if(move_uploaded_file($pic,$_FILES["pic"]["name"])) // Upload/Copy
              {


              $newFile = rename("../profile/".$_FILES["pic"]["name"],"../profile/".$_SESSION["UID"].".jpg");
              $sel = "SELECT MemberID FROM profile_picture WHERE MemberID = '".$id."'";
              $upload_directory = "profile/".$id.".jpg";
              $q = mysqli_query($con,$sel);
              $res1 = mysqli_fetch_assoc($q);

              if(count($res1) > 0){
                $upload_query = "UPDATE profile_picture SET directory = '".$upload_directory."' WHERE MemberID = '".$id."'";
                $result_04 = mysqli_query($con,$upload_query);
                echo "<script>alert('Copy/Upload Complete.');window.location.replace('../profile.php');</script>";
              }else{
                $upload_query = "INSERT INTO profile_picture(MemberID,directory) VALUES ('".$id."','".$upload_directory."')";
                  $result_04 = mysqli_query($con,$upload_query);
                  echo "<script>alert('Copy/Upload Complete.');window.location.replace('../profile.php');</script>";
              }

              }
      }
      function editProf($pwd,$fn,$ln,$cty,$rd,$pc){
        include("../connector/connect.php");
        if($pwd != "" && $fn != "" && $ln != "" && $cty != "" && $rd != "" && $pc != ""){
          $usrCommand = "UPDATE user SET password = '".$pwd."' WHERE MemberID = '".$_SESSION["UID"]."'";
          $q = mysqli_query($con,$usrCommand);
          if($q){
                $memCommand = "UPDATE Member SET fname = '".$fn."', lname = '".$ln."', city = '".$cty."', road = '".$rd."', postcode = '".$pc."' WHERE MemberID = '".$_SESSION["UID"]."'";
                $q2 = mysqli_query($con,$memCommand);
                if($q2){
                    $_SESSION["pwd"] = $pwd;
                    $_SESSION["Firstname"] = $fn;
                    $_SESSION["Lastname"] = $ln;
                    $_SESSION["city"] = $cty;
                    $_SESSION["road"] = $rd;
                    $_SESSION["postcode"] = $pc;
                    echo "<script>alert(\"Completed\");window.location.replace(\"../profile.php\");</script>";
                }else{
                  echo "<script>alert(\"Error : Update Member\");window.location.replace(\"../profile.php\");</script>";
                }

          }else{
            echo "<script>alert(\"Error : Update User\");window.location.replace(\"../profile.php\");</script>";
          }
        }
      }


      if(isset($_REQUEST["uid"])){
        session_start();

          uploadProfile($_SESSION["UID"],$_FILES["pic"]["tmp_name"]);
      }else if(isset($_REQUEST["pwd"])){
        session_start();
        editProf($_REQUEST['pwd'],$_REQUEST['fn'],$_REQUEST['ln'],$_REQUEST['cty'],$_REQUEST['rd'],$_REQUEST['pc']);
      }



?>
