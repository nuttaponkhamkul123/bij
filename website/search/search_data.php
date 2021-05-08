<?php
        session_start();
        include("../connector/connect.php");
    //$name == $_SESSION["list"][$i]["item_name"]
      function search($name,$cata){
        $_SESSION["res"] = array();
        for($i = 0 ; $i < count($_SESSION["list"]) ; $i++){
          if(strpos($_SESSION["list"][$i]["item_name"],$name) !== false){
            if($cata == $_SESSION["list"][$i]["catagoryID"]){
              array_push($_SESSION["res"],$_SESSION["list"][$i]);
            }

          }

        }

      }

      function searchBYCatagories($cata){
        $_SESSION["res"] = array();
        for($i = 0 ; $i < count($_SESSION["list"]) ; $i++){
          if($cata == $_SESSION["list"][$i]["catagoryID"]){
              array_push($_SESSION["res"],$_SESSION["list"][$i]);
          }


        }
      }
      if(isset($_REQUEST["catagories"])){
            echo "<script>alert(\"'".count($_REQUEST['catagories'])."'\")</script>";
            searchBYCatagories($_REQUEST["catagories"]);
            header("location:../product_result.php?res='".$_REQUEST['catagories']."'");
      }else{
        if($_REQUEST["search"]!=""){
            $search_text = $_REQUEST["search"];
            $search_cata = $_REQUEST["cata"];
            for($i = 0 ; $i < count(search($search_text,$search_cata)) ; $i++){
                echo search($search_text,$search_cata)[$i];
            }
        }else{
          echo "There is no data";
        }
        search($_REQUEST["search"],$_REQUEST["cata"]);
        header("location:../product_result.php?res='".$_REQUEST['search']."'");
      }

      //echo "<script>alert(\"'".$_REQUEST["search"]."'\")</script>";








?>
