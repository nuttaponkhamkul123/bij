<?php
function editUser(){
  include('../connector/connect.php');
  session_start();
  $update = "UPDATE user SET username = '".$_REQUEST["usr"]."',password = '".$_REQUEST["pwd"]."' WHERE MemberID = '".$_REQUEST["uid"]."'";
  $sql = mysqli_query($con,$update);
  //echo $sql;
  header("location:../index.php");
}
function deleteUser(){
  include('../connector/connect.php');
  session_start();
  $rem_perm = "DELETE FROM permission WHERE MemberID = '".$_REQUEST["uid"]."'";
  $rem_mem = "DELETE FROM member WHERE MemberID = '".$_REQUEST["uid"]."'";
  $rem_pic = "DELETE FROM profile_picture WHERE MemberID = '".$_REQUEST["uid"]."'";
  $rem_use = "DELETE FROM user WHERE MemberID = '".$_REQUEST["uid"]."'";
  echo "<script>alert(\"../profile/'".$_REQUEST["uid"]."'.jpg\")</script>";

  $del= unlink("../profile/" .$_REQUEST["uid"]. ".jpg");


  if($del){
    echo "Deleted";
    mysqli_query($con,$rem_perm);
    mysqli_query($con,$rem_mem);
    mysqli_query($con,$rem_pic);
    mysqli_query($con,$rem_use);
  }else{
    echo "Delete Failed";
    mysqli_query($con,$rem_perm);
    mysqli_query($con,$rem_mem);
    mysqli_query($con,$rem_pic);
    mysqli_query($con,$rem_use);
  }
  header("location:../index.php");
}
if(isset($_REQUEST["action"])){
    if($_REQUEST["action"] == "delete"){
      deleteUser();
    }
}else{
  editUser();
}



?>
