<!DOCTYPE html>
<?php  session_start(); include("catagory_manage/catagoryCtrl.php"); ?>
<?php


    if(isset($_SESSION["flag"])){
      if($_SESSION["flag"] == 1){

        $_SESSION["oid"] = 0;
        unset($_SESSION["flag"]);
      }
      $_SESSION["cart"] = array();
    }
     $con = mysqli_connect("localhost","root","","bij");
     mysqli_set_charset($con, "utf8");
     $command = "SELECT * FROM computerpart INNER JOIN stock ON stock.ComputerPartSSN = computerpart.ComputerPartSSN
     INNER JOIN image_directory ON image_directory.ComputerPartSSN = computerpart.ComputerPartSSN
     ";
     $result = mysqli_query($con,$command);
     $number = mysqli_num_rows($result);
     $_SESSION['list'] = array();
    //echo $number;
     while($row=mysqli_fetch_assoc($result)){
       array_push($_SESSION['list'],$row);
     }



?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>BIJ Computer Service</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="description" content="">
    <meta name="author" content="">
<!--Less styles -->
   <!-- Other Less css file //different less files has different color scheam
	<link rel="stylesheet/less" type="text/css" href="themes/less/simplex.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/classified.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/amelia.less">  MOVE DOWN TO activate
	-->
	<!--<link rel="stylesheet/less" type="text/css" href="themes/less/bootshop.less">
	<script src="themes/js/less.js" type="text/javascript"></script> -->

<!-- Bootstrap style -->
    <link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="themes/css/base.css" rel="stylesheet" media="screen"/>
    <link href="stylesheet/hover.css" rel="stylesheet" media="all">
    <link href="stylesheet/custom.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="stylesheet/animate.css" rel="stylesheet" />
<!-- Bootstrap style responsive -->
	<link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->
	<link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png">
	<style type="text/css" id="enject"></style>
  </head>
<body>

<div id="header">
<div class="container-fluid">

<div id="welcomeLine" class="row-fluid">
  <?php if(isset($_SESSION["UID"])) { ?>
	<div class="span6">Welcome!<strong> <?php echo $_SESSION["Firstname"]; ?></strong></div>
<?php }else{ ?>
  <div class="span6">Welcome!<strong> User</strong></div>
<?php } ?>
	<div class="span6">
	<div class="pull-right">
    <?php if(isset($_SESSION["cart"])){ ?>
		<a href="product_summary.php"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> <?php echo count($_SESSION["cart"]); ?> Items in your cart </span> </a>
  <?php }else{ ?>
    <a href="product_summary.php"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> [0] Items in your cart </span> </a>
  <?php } ?>

  </div>
	</div>
</div>
<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="brand" href="index.php"><img src="themes/images/logo.png" alt="Bootsshop" style = "width:193px;height:47px"/></a>


    <ul id="topMenu" class="pull-right nav ">



  <?php if (isset($_SESSION["UID"])) { ?>
    <?php if($_SESSION["perm"] == 1) { ?>
	             <li class=""><a href="manage-user.php" class = "hvr-underline-reveal">Manage Users</a></li>
               <li class = ""><a href = "#admin_dialog" class = "hvr-underline-reveal" data-toggle="modal">Admin Option</a></li>

         <?php } ?>
 <?php } ?>
   <?php if(isset($_SESSION["UID"])){ ?>
	 <li class="hvr-underline-reveal"><a href="profile.php">Profile</a></li>
 <?php }else{ ?>
    <li class="hvr-underline-reveal"><a href="register-page.php">Register</a></li>
    <li class = ""><a>or</a></li>
  <?php } ?>
	 <li class="">
     <?php if(isset($_SESSION["UID"])) { ?>
       <a  href = "authenticator/Logout.php"><span class = "btn btn-danger">Logout</span></a>
 <?php }else { ?>
   <a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">Login</span></a>

 <?php } ?>

  <div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3>Login</h3>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal loginFrm" style = "text-align:center" action="authenticator/Login.php" method="POST">
			  <div class="control-group">
        <h4>Username : <input type="text" name = "user" id="inputusr" placeholder="Username"></h4>
			  </div>
			  <div class="control-group">
          <h4>Password : <input type="password" name = "pwd" id="inputPassword" placeholder="Password"></h4>

			  </div>
			  <div class="control-group">
          <div style = "text-align:center">
          <button type="submit" class="btn btn-success" >Sign in</button>
          <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        </div>
			  </div>
			</form>

		  </div>
	</div>
  <style>
  #feedback { font-size: 1.4em; }
  #selectable .ui-selecting { background: #FECA40; }
  #selectable .ui-selected { background: #F39814; color: white; }
  #selectable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
  #selectable li { margin: 3px; padding: 0.4em; font-size: 1.4em; height: 18px; }
  </style>

  <div id="admin_dialog" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3>Admin Option</h3>
		  </div>
		  <div class="modal-body">
        <div class = "container-fluid">
              <div class = "row-fluid">
                <a class = "span4" href = "manage_product.php" style = "text-align:center">
                <div  class = "button-blue hvr-fade" class = "display:block">
                <img src="gear.png" alt="gear" ></img>
                <h5>Manage Product</h5>
              </div>

              </a>
              <a class = "span4" href = "#add_item_dialog" style = "text-align:center" data-toggle="modal" data-dismiss="modal">
              <div  class = "button-blue hvr-fade" class = "display:block">
              <img src="add_icon.png" alt="add_item" ></img>
              <h4>Add Item</h4>
            </div>
            </a>
            <a class = "span4" href = "#add_cata_dialog" style = "text-align:center" data-toggle="modal" data-dismiss="modal">
            <div  class = "button-blue hvr-fade" class = "display:block">
            <img class = "hvr-fade" src="add_cata.png" alt="add_cata" ></img>
            <h4>Add Catagory</h4>
          </div>
          </a>
              </div>

        </div>


		  </div>
	</div>

  <div id="add_item_dialog" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3>Add Item</h3>
		  </div>
		  <div class="modal-body">
        <div class = "container-fluid">
          <form action = "admin_manage/add_item.php" method = "POST" enctype="multipart/form-data">
            <div class = "row-fluid">
              <div class = "span4">  <h5>Item Name : </h5></div>
              <div class = "span8">  <input name = "item_name" type = "text" /></div>
            </div>
            <div class = "row-fluid">
              <div class = "span4">  <h5>Item Description : </h5></div>
              <div class = "span8">  <textarea name = "Detail"></textarea></div>
            </div>
            <div class = "row-fluid">
              <div class = "span4">  <h5>Price : </h5></div>
              <div class = "span8">  <input name = "Price" type = "text" /></div>
            </div>

            <div class = "row-fluid">
              <div class = "span4">  <h5>Catagory : </h5></div>

              <div class = "span8">  <select name = "catagory">
                    <?php ; for($i=0 ; $i< count(fetchCatagory()) ; $i++){ ?>
                      <option value = "<?php echo fetchCatagory()[$i]["catagoryID"]; ?>" ><?php echo fetchCatagory()[$i]["name"]; ?></option>
                    <?php } ?>
              </select></div>
            </div>
            <div class = "row-fluid">
              <div class = "span4">  <h5>Waranty : </h5></div>
              <div class = "span8">  <input name = "WarantyAmount" type = "number"/></div>
            </div>
            <div class = "row-fluid">
              <div class = "span4">  <h5>Image Directory : </h5></div>
              <div class = "span8">  <input name = "directory" type = "file" accept=".jpg"/></div>
            </div>
            <div class = "row-fluid">
              <div class = "span4">  <h5>Stock : </h5></div>
              <div class = "span8">  <input name = "amount" type = "number"/></div>
            </div>
            <div style = "text-align:center">
                <input type = "submit" class = "btn btn-large btn-success" value = "Add item"></input>
            </div>
          </form>
          </div>
        </div>
		  </div>
      <div id="add_cata_dialog" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
    		  <div class="modal-header">
    			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    			<h3>Add Catagory</h3>
    		  </div>
    		  <div class="modal-body">
            <div class = "container-fluid">
              <form action = "admin_manage/cata_add.php" method = "POST" enctype="multipart/form-data">
                <div class = "row-fluid">
                  <div class = "span4">  <h5>Catagory ID : </h5></div>
                  <div class = "span8">  <input name = "cata_ID" type = "text" /></div>
                </div>
                <div class = "row-fluid">
                  <div class = "span4">  <h5>Catagory Name : </h5></div>
                  <div class = "span8">  <input type="text" name = "cata_name"></input></div>
                </div>
                </div>
                <div style = "text-align:center">
                    <input id = "addcata" type = "submit" class = "btn btn-large btn-success" value = "Add Catagory"></input>
                </div>
              </form>
              </div>

            </div>


    		  </div>
	</div>


	</li>
    </ul>
  </div>
</div>
</div>
</div>
<!-- Header End====================================================================== -->
<div class = "container">
    <style>
        .grids{
          display:grid;
          grid-template-columns: 30% 15% 55%;
        }
        .grids-100{

          display:grid;
          grid-template-columns: 100%;
        }.grids-33{
          display:grid;
          grid-template-columns: auto auto auto;
        }
        h5{

          font-family: 'Roboto', sans-serif;

        }
        ss{

          font-family: 'Roboto', sans-serif;
          font-size:14px;

        }

    </style>
          <div class = "grids">
            <div style = "" class = "button hvr-grow-shadow" onclick = "window.location.replace('product.php')">
              <br><br><br><center><img src = "/banner/banner1.png" width = "150" height = "150" style = ""></img><br><h5 style = "color:#c4c464;font-size:35px">Products</h5></center>
            </div>
            <div style = "">
              <div class = "grids-100 hvr-grow-shadow button" style = "" onclick="window.location.replace('product_summary.php')">
                <center><img src = "/banner/banner2.png" width = "120" height = "120" style = ""></img><br><h5 style = "color:#c4c464;font-size:25px">Cart</h5></center>
              </div>

              <div id = "linked" class = "grids-100 hvr-grow-shadow button" style = "" onclick="window.location.href = '#search';">
                <center><img src = "/banner/banner3.png" width = "120" height = "120" style = ""></img><br><h5 style = "color:#c4c464;font-size:25px">Search</h5></center>
              </div>
            </div>
            <div class = "grids-33" style = "">
                <div class = "button hvr-grow-shadow" style = "" onclick="window.location.replace('search/search_data.php?catagories=c1');">
                  <center><img src = "banner/cpu.png" width="80" height="80" style = "padding-top:10%"></img></center>
                  <center><ss>CPU</ss></center>
                </div>
                <div class = "button hvr-grow-shadow" style = "" onclick="window.location.replace('search/search_data.php?catagories=io1');">
                  <center><img src = "banner/io.png" width="80" height="80" style = "padding-top:10%"></img></center>
                  <center><ss>IO Devices</ss></center></div>
                <div class = "button hvr-grow-shadow" style = "" onclick="window.location.replace('search/search_data.php?catagories=main1');">
                  <center><img src = "banner/mainboard.png" width="80" height="80" style = "padding-top:10%"></img></center>
                  <center><ss>Mainboard</ss></center>
                </div>
                <div class = "button hvr-grow-shadow" style = "" onclick="window.location.replace('search/search_data.php?catagories=mou1');">
                  <center><img src = "banner/mouse.png" width="80" height="80" style = "padding-top:10%"></img></center>
                  <center><ss>Mouse</ss></center></div>
                <div class = "button hvr-grow-shadow" style = "" onclick="window.location.replace('search/search_data.php?catagories=mo1');">
                  <center><img src = "banner/monitor.png" width="80" height="80" style = "padding-top:10%"></img></center>
                  <center><ss>Monitor</ss></center>
                </div>
                <div class = "button hvr-grow-shadow" style = "" onclick="window.location.replace('search/search_data.php?catagories=ot1');">
                  <center><img src = "banner/other.png" width="80" height="80" style = "padding-top:10%"></img></center>
                  <center><ss>Other</ss></center>
                </div>


            </div>

          </div>

      </div>

        <!------this for smooth scrolling---->
          <script>
            $(document).ready(function(){

              $("div#linked").on('click', function(event) {
                if (this.hash !== "") {
                  event.preventDefault();
                  var hash = this.hash;
                  $('html, body').animate({
                    scrollTop: $(hash).offset().top
                  }, 200, function(){
                    window.location.hash = hash;
                  });
                }
              });
            });
            </script>
    </div>

</div>
<br>




<div id="mainBody">
	<div class="container-fluid">
    <?php if(isset($_SESSION["cart"])) { ?>
    <a id="myCart" href="product_summary.php">
                <div style = "position: fixed; bottom: 50px; right: 0px;"><img src = "cart.png" width="50" height="50" style = "border-radius: 50%;box-shadow: 5px 5px;"></img><sup class = "badge badge-info badge-small" style ="position:relative;top:-15px;left:-25px"><?php echo count($_SESSION["cart"]) ?></sup></div>
    </a>
    <?php }else { ?>
      <a id="myCart" href="#login" data-toggle="modal">
                  <div style = "position: fixed; bottom: 50px; right: 0px;"><img src = "cart.png" width="50" height="50" style = "border-radius: 50%; background-color:white;box-shadow: 5px 5px;"></img><sup class = "badge badge-warning badge-small" style ="position:relative;top:-15px;left:-25px"><?php echo 0; ?></sup></div>
      </a>
    <?php } ?>
    <!-- SearchPro ================================================== -->


	<div class="row-fluid">
    <div id = "search" class = "span2 thumbnail" style = "text-align:center">
      <h3>Search</h3>
      <hr></hr>
        <form id = "searchText" action = "search/search_data.php" method = "GET">
          <div class = "control-group">
            <div class = "control" style = "text-align:center">

              <input type = "text" placeholder="Search Me!!" name = "search" style = "width:50%"></input><br>
              <select name = "cata" style = "width:50%">
                <?php for($i = 0 ;$i< count(fetchCatagory());$i++){ ?>
                  <option  value = "<?php echo fetchCatagory()[$i]["catagoryID"];?>"><?php echo fetchCatagory()[$i]["name"]; ?></option>
                <?php } ?>
              </select><br>

              <a class = "btn" onclick = "$('#searchText').submit()">Search</a>
            </div>

          </div>



        </form>
            <div class = "thumbnail" style = "text-align:left"><strong>Catagories</strong>
                <?php for($i = 0 ; $i< count(fetchCatagory()) ; $i++) { ?>
                  <a href = "search/search_data.php?catagories=<?php echo fetchCatagory()[$i]["catagoryID"] ?>" style = "text-align:left;text-decoration:none"><?php echo fetchCatagory()[$i]["name"]; ?></a>
                <?php } ?>
            </div>

    </div>





<!-- Sidebar end=============================================== -->
		<div class="span10">
			<div class="well well-small">
			<h4>Featured Products</h4>
			<div class="row-fluid">
			<div id="featured" class="carousel slide">

			<div class="carousel-inner">
			  <div class="item active">
			  <ul class="thumbnails">
      <?php if(count($_SESSION["list"]) >= 4) {for($i = 0 ; $i< 4;$i++) { ?>

				<li class="span3">
          <form id = "feature_form<?php echo $i; ?>" action = "product_details.php" method = "GET" style = "text-align:center">
            <div class="thumbnail">
            <i class="tag"></i>

            <a href="#" onclick="$('#feature_form<?php echo $i ?>').submit()"><img src="<?php echo $_SESSION["list"][$i]['directory'] ?>" alt="" style = "width:200px;height:200px">
            <input type = "hidden" name = "index" value = "<?php echo $i; ?>"></input>
            <input type = "hidden" name = "item_ssn" value = "<?php echo $_SESSION["list"][$i]["ComputerPartSSN"]; ?>"></input>
            <input type = "hidden" name = "item_directory" value = "<?php echo $_SESSION["list"][$i]["directory"]; ?>"></input>
            <input type = "hidden" name = "item_name" value = "<?php echo $_SESSION["list"][$i]["item_name"]; ?>"></input>
            <input type = "hidden" name = "item_detail" value = "<?php echo $_SESSION["list"][$i]["Detail"]; ?>"></input>
            <input type = "hidden" name = "item_price" value = "<?php echo $_SESSION["list"][$i]["Price"]; ?>"></input>
            <input type = "hidden" name = "item_stock" value = "<?php echo $_SESSION["list"][$i]["amount"]; ?>"></input>
            <input type = "hidden" name = "item_catagory" value = "<?php echo $_SESSION["list"][$i]["catagoryID"]; ?>"></input>
            </a>

            <div class="caption">
              <h5><?php echo $_SESSION["list"][$i]["item_name"] ?></h5>
              <h4><a class="btn" href="#" onclick="$('#feature_form<?php echo $i ?>').submit()">VIEW</a> <span class="pull-right"><?php echo "฿".$_SESSION["list"][$i]["Price"] ?></span></h4>
            </div>
            </div>

          </form>

				</li>
      <?php }
    }else{for($i = 0 ; $i< count($_SESSION["list"]);$i++) {  ?>
        <li class="span3">

            <form id = "feature_form<?php echo $i; ?>" action = "product_details.php" method = "GET" style = "text-align:center">
              <div class="thumbnail">
              <i class="tag"></i>

              <a href="#" onclick="$('#feature_form<?php echo $i ?>').submit()"><img src="<?php echo $_SESSION["list"][$i]['directory'] ?>" alt="" style = "width:200px;height:200px">
              <input type = "hidden" name = "index" value = "<?php echo $i; ?>"></input>
              <input type = "hidden" name = "item_ssn" value = "<?php echo $_SESSION["list"][$i]["ComputerPartSSN"]; ?>"></input>
              <input type = "hidden" name = "item_directory" value = "<?php echo $_SESSION["list"][$i]["directory"]; ?>"></input>
              <input type = "hidden" name = "item_name" value = "<?php echo $_SESSION["list"][$i]["item_name"]; ?>"></input>
              <input type = "hidden" name = "item_detail" value = "<?php echo $_SESSION["list"][$i]["Detail"]; ?>"></input>
              <input type = "hidden" name = "item_price" value = "<?php echo $_SESSION["list"][$i]["Price"]; ?>"></input>
              <input type = "hidden" name = "item_stock" value = "<?php echo $_SESSION["list"][$i]["amount"]; ?>"></input>
              <input type = "hidden" name = "item_catagory" value = "<?php echo $_SESSION["list"][$i]["catagoryID"]; ?>"></input>
              </a>

              <div class="caption">
                <h5><?php echo $_SESSION["list"][$i]["item_name"] ?></h5>
                <h4><a class="btn" href="#" onclick="$('#feature_form<?php echo $i ?>').submit()">VIEW</a> <span class="pull-right"><?php echo "฿".$_SESSION["list"][$i]["Price"] ?></span></h4>
              </div>
              </div>

            </form>

				</li>
      <?php }} ?>
			  </ul>
			  </div>
        <div class="item ">
			  <ul class="thumbnails">
      <?php if(count($_SESSION["list"]) > 4) {for($i = 4 ; $i < count($_SESSION["list"]);$i++) { ?>
				<li class="span3">
          <form id = "feature_form<?php echo $i; ?>" action = "product_details.php" method = "GET" style = "text-align:center">
            <div class="thumbnail">
            <i class="tag"></i>

            <a href="#" onclick="$('#feature_form<?php echo $i ?>').submit()"><img src="<?php echo $_SESSION["list"][$i]['directory'] ?>" alt="" style = "width:200px;height:200px">
            <input type = "hidden" name = "index" value = "<?php echo $i; ?>"></input>
            <input type = "hidden" name = "item_ssn" value = "<?php echo $_SESSION["list"][$i]["ComputerPartSSN"]; ?>"></input><input type = "hidden" name = "item_ssn" value = "<?php echo $_SESSION["list"][$i]["ComputerPartSSN"]; ?>"></input>
            <input type = "hidden" name = "item_directory" value = "<?php echo $_SESSION["list"][$i]["directory"]; ?>"></input>
            <input type = "hidden" name = "item_name" value = "<?php echo $_SESSION["list"][$i]["item_name"]; ?>"></input>
            <input type = "hidden" name = "item_detail" value = "<?php echo $_SESSION["list"][$i]["Detail"]; ?>"></input>
            <input type = "hidden" name = "item_price" value = "<?php echo $_SESSION["list"][$i]["Price"]; ?>"></input>
            <input type = "hidden" name = "item_stock" value = "<?php echo $_SESSION["list"][$i]["amount"]; ?>"></input>
            <input type = "hidden" name = "item_catagory" value = "<?php echo $_SESSION["list"][$i]["catagoryID"]; ?>"></input>
            </a>

            <div class="caption">
              <h5><?php echo $_SESSION["list"][$i]["item_name"] ?></h5>
              <h4><a class="btn" href="#" onclick="$('#feature_form<?php echo $i ?>').submit()">VIEW</a> <span class="pull-right"><?php echo "฿".$_SESSION["list"][$i]["Price"] ?></span></h4>
            </div>
            </div>

          </form>

				</li>
      <?php }}else{for($i = 0 ; $i< count($_SESSION["list"]);$i++) {  ?>
        <li class="span3">

            <form id = "feature_form<?php echo $i; ?>" action = "product_details.php" method = "GET" style = "text-align:center">
              <div class="thumbnail">
              <i class="tag"></i>

              <a href="#" onclick="$('#feature_form<?php echo $i ?>').submit()"><img src="<?php echo $_SESSION["list"][$i]['directory'] ?>" alt="" style = "width:200px;height:200px">
              <input type = "hidden" name = "index" value = "<?php echo $i; ?>"></input>
              <input type = "hidden" name = "item_ssn" value = "<?php echo $_SESSION["list"][$i]["ComputerPartSSN"]; ?>"></input>
              <input type = "hidden" name = "item_directory" value = "<?php echo $_SESSION["list"][$i]["directory"]; ?>"></input>
              <input type = "hidden" name = "item_name" value = "<?php echo $_SESSION["list"][$i]["item_name"]; ?>"></input>
              <input type = "hidden" name = "item_detail" value = "<?php echo $_SESSION["list"][$i]["Detail"]; ?>"></input>
              <input type = "hidden" name = "item_price" value = "<?php echo $_SESSION["list"][$i]["Price"]; ?>"></input>
              <input type = "hidden" name = "item_stock" value = "<?php echo $_SESSION["list"][$i]["amount"]; ?>"></input>
              <input type = "hidden" name = "item_catagory" value = "<?php echo $_SESSION["list"][$i]["catagoryID"]; ?>"></input>
              </a>

              <div class="caption">
                <h5><?php echo $_SESSION["list"][$i]["item_name"] ?></h5>
                <h4><a class="btn" href="#" onclick="$('#feature_form<?php echo $i ?>').submit()">VIEW</a> <span class="pull-right"><?php echo "฿".$_SESSION["list"][$i]["Price"] ?></span></h4>
              </div>
              </div>

            </form>

				</li>
      <?php }} ?>
			  </ul>
			  </div>




			  </div>

			  <a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
			  <a class="right carousel-control" href="#featured" data-slide="next">›</a>
			  </div>
			  </div>
		</div>
		<h4>Latest Products </h4>

			  <ul class="thumbnails" >

        <?php if(count($_SESSION["list"]) >= 4) {for($i = 0 ; $i< 4;$i++){ ?>
				<li class="span3" >
				  <div class="thumbnail" >

                <form id = "detail_form<?php echo $i; ?>" action = "product_details.php" method = "GET" style = "text-align:center">

                      <a href="#" onclick="$('#detail_form<?php echo $i ?>').submit()"><img src="<?php echo $_SESSION["list"][$i]['directory'] ?>" alt="" style = "width:200px;height:200px">
                      <input type = "hidden" name = "index" value = "<?php echo $i; ?>"></input>
                      <input type = "hidden" name = "item_ssn" value = "<?php echo $_SESSION["list"][$i]["ComputerPartSSN"]; ?>"></input>
                      <input type = "hidden" name = "item_directory" value = "<?php echo $_SESSION["list"][$i]["directory"]; ?>"></input>
                      <input type = "hidden" name = "item_name" value = "<?php echo $_SESSION["list"][$i]["item_name"]; ?>"></input>
                      <input type = "hidden" name = "item_detail" value = "<?php echo $_SESSION["list"][$i]["Detail"]; ?>"></input>
                      <input type = "hidden" name = "item_price" value = "<?php echo $_SESSION["list"][$i]["Price"]; ?>"></input>
                      <input type = "hidden" name = "item_stock" value = "<?php echo $_SESSION["list"][$i]["amount"]; ?>"></input>
                      <input type = "hidden" name = "item_catagory" value = "<?php echo $_SESSION["list"][$i]["catagoryID"]; ?>"></input>
                            </a>
                </form>


              <form action = "cart/cart.php" method = "GET">
					        <div class="caption">

                    <input type = "hidden" name = "index" value = "<?php echo $i; ?>"></input>
                    <input type = "hidden" name = "item_ssn" value = "<?php echo $_SESSION["list"][$i]["ComputerPartSSN"]; ?>"></input>
                    <input type = "hidden" name = "item_directory" value = "<?php echo $_SESSION["list"][$i]["directory"]; ?>"></input>
                    <input type = "hidden" name = "item_name" value = "<?php echo $_SESSION["list"][$i]["item_name"]; ?>"></input>
                    <input type = "hidden" name = "item_detail" value = "<?php echo $_SESSION["list"][$i]["Detail"]; ?>"></input>
                    <input type = "hidden" name = "item_price" value = "<?php echo $_SESSION["list"][$i]["Price"]; ?>"></input>

        					  <h5><?php echo $_SESSION["list"][$i]["item_name"]; ?></h5>

                    <div style = "text-align:center">
                            <input type = "input" name = "item_quantity" placeholder="Quantity" value = "1" style = "width:10%"></input>
                            <input type = "submit" class="btn" value="Add to cart"></input>
                    </div>
                    <div id = "gallery" class = ""><h4 style="text-align:center">
                      <a class="btn" href="<?php echo $_SESSION["list"][$i]["directory"]; ?>" title = "<?php echo $_SESSION["list"][$i]["item_name"]; ?>">
                        <i class="icon-zoom-in"></i>
                      </a>
                      <a class="btn btn-primary" href="#"><?php echo $_SESSION['list'][$i]['Price'] ." ฿"; ?></a>
                    </h4>
                  </div>

              </form>
          </div>
				  </div>
				</li>
      <?php }
    }else{for($i = 0 ; $i< count($_SESSION["list"]);$i++){ ?>
      <li class="span3" >
        <div class="thumbnail" >

              <form id = "detail_form<?php echo $i; ?>" action = "product_details.php" method = "GET" style = "text-align:center">

                    <a href="#" onclick="$('#detail_form<?php echo $i ?>').submit()"><img src="<?php echo $_SESSION["list"][$i]['directory'] ?>" alt="" style = "width:200px;height:200px">
                    <input type = "hidden" name = "index" value = "<?php echo $i; ?>"></input>
                    <input type = "hidden" name = "item_ssn" value = "<?php echo $_SESSION["list"][$i]["ComputerPartSSN"]; ?>"></input>
                    <input type = "hidden" name = "item_directory" value = "<?php echo $_SESSION["list"][$i]["directory"]; ?>"></input>
                    <input type = "hidden" name = "item_name" value = "<?php echo $_SESSION["list"][$i]["item_name"]; ?>"></input>
                    <input type = "hidden" name = "item_detail" value = "<?php echo $_SESSION["list"][$i]["Detail"]; ?>"></input>
                    <input type = "hidden" name = "item_price" value = "<?php echo $_SESSION["list"][$i]["Price"]; ?>"></input>
                    <input type = "hidden" name = "item_stock" value = "<?php echo $_SESSION["list"][$i]["amount"]; ?>"></input>
                    <input type = "hidden" name = "item_catagory" value = "<?php echo $_SESSION["list"][$i]["catagoryID"]; ?>"></input>
                          </a>
              </form>


            <form action = "cart/cart.php" method = "GET">
                <div class="caption">

                  <input type = "hidden" name = "index" value = "<?php echo $i; ?>"></input>
                  <input type = "hidden" name = "item_ssn" value = "<?php echo $_SESSION["list"][$i]["ComputerPartSSN"]; ?>"></input>
                  <input type = "hidden" name = "item_directory" value = "<?php echo $_SESSION["list"][$i]["directory"]; ?>"></input>
                  <input type = "hidden" name = "item_name" value = "<?php echo $_SESSION["list"][$i]["item_name"]; ?>"></input>
                  <input type = "hidden" name = "item_detail" value = "<?php echo $_SESSION["list"][$i]["Detail"]; ?>"></input>
                  <input type = "hidden" name = "item_price" value = "<?php echo $_SESSION["list"][$i]["Price"]; ?>"></input>

                  <h5 style = "white-space: nowrap;overflow:hidden;text-overflow: ellipsis;max-width:300px"><?php echo $_SESSION["list"][$i]["item_name"]; ?></h5>

                  <div style = "text-align:center">
                          <input type = "input" name = "item_quantity" placeholder="Quantity" value = "1" style = "width:10%"></input>
                          <input type = "submit" class="btn" value="Add to cart"></input>
                  </div>
                  <div id = "gallery" class = ""><h4 style="text-align:center">
                    <a class="btn" href="<?php echo $_SESSION["list"][$i]["directory"]; ?>" title = "<?php echo $_SESSION["list"][$i]["item_name"]; ?>">
                      <i class="icon-zoom-in"></i>
                    </a>
                    <a class="btn btn-primary" href="#"><?php echo $_SESSION['list'][$i]['Price'] ." ฿"; ?></a>
                  </h4>
                </div>

            </form>
        </div>
        </div>
      </li>

    <?php }} ?>
			  </ul>

		</div>
		</div>
	</div>
</div>
<!-- Footer ================================================================== -->
	<div  id="footerSection">
	<div class="container">
		<div class="row">
			<div class="span3">
				<h5>ACCOUNT</h5>
				<a href="login.html">YOUR ACCOUNT</a>
				<a href="login.html">PERSONAL INFORMATION</a>
				<a href="login.html">ADDRESSES</a>
				<a href="login.html">DISCOUNT</a>
				<a href="login.html">ORDER HISTORY</a>
			 </div>
			<div class="span3">
				<h5>INFORMATION</h5>
				<a href="contact.html">CONTACT</a>
				<a href="register.html">REGISTRATION</a>
				<a href="legal_notice.html">LEGAL NOTICE</a>
				<a href="tac.html">TERMS AND CONDITIONS</a>
				<a href="faq.html">FAQ</a>
			 </div>
			<div class="span3">
				<h5>OUR OFFERS</h5>
				<a href="#">NEW PRODUCTS</a>
				<a href="#">TOP SELLERS</a>

				<a href="#">MANUFACTURERS</a>
				<a href="#">SUPPLIERS</a>
			 </div>
			<div id="socialMedia" class="span3 pull-right">
				<h5>SOCIAL MEDIA </h5>
				<a href="#"><img width="60" height="60" src="themes/images/facebook.png" title="facebook" alt="facebook"/></a>
				<a href="#"><img width="60" height="60" src="themes/images/twitter.png" title="twitter" alt="twitter"/></a>
				<a href="#"><img width="60" height="60" src="themes/images/youtube.png" title="youtube" alt="youtube"/></a>
			 </div>
		 </div>
		<p class="pull-right">&copy; Bootshop</p>
	</div><!-- Container End -->
	</div>

	<script src="themes/js/jquery.js" type="text/javascript"></script>
	<script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="themes/js/google-code-prettify/prettify.js"></script>

	<script src="themes/js/bootshop.js"></script>
    <script src="themes/js/jquery.lightbox-0.5.js"></script>

	<!-- Themes switcher section ============================================================================================= -->

<span id="themesBtn"></span>
</body>
</html>
