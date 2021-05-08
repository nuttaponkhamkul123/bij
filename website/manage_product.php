<!DOCTYPE html>
<?php session_start(); include("admin_manage/fetchItem.php");include("catagory_manage/catagoryCtrl.php"); fetchItem();?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootshop online Shopping cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<div class="container">
<div id="welcomeLine" class="row">

	<div class="span6">Welcome!<strong> <?php if(isset($_SESSION["UID"])) echo $_SESSION["Firstname"]; else echo "User" ?></strong></div>
	<div class="span6">
	<div class="pull-right">
    <div class="pull-right">
      <?php if(isset($_SESSION["cart"])){ ?>
  		<a href="product_summary.php"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> <?php echo count($_SESSION["cart"]); ?> Items in your cart </span> </a>
    <?php }else{ ?>
      <a href="product_summary.php"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> [0] Items in your cart </span> </a>
    <?php } ?>

    </div>
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
    <a class="brand" href="index.php"><img src="themes/images/logo.png" alt="Bootsshop"/></a>


    <ul id="topMenu" class="pull-right nav ">



  <?php if (isset($_SESSION["UID"])) { ?>
    <?php if($_SESSION["perm"] == 1) { ?>
	             <li class=""><a href="manage-user.php">Manage Users</a></li>
               <li class = ""><a href = "#admin_dialog" class = "" data-toggle="modal">Admin Option</a></li>

         <?php } ?>
 <?php } ?>
   <?php if(isset($_SESSION["UID"])){ ?>
	 <li class=""><a href="profile.php">Profile</a></li>
 <?php }else{ ?>
    <li class=""><a href="register-page.php">Register</a></li>
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
                <div  class = "option" class = "display:block">
                <img src="gear.png" alt="gear"></img>
                Manage Product
              </div>

              </a>
              <a class = "span4" href = "#add_item_dialog" style = "text-align:center" data-toggle="modal" data-dismiss="modal">
              <div  class = "option" class = "display:block">
              <img src="add_icon.png" alt="add_item" style = "background-color:white;"></img>
              Add Item
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
	</div>


	</li>
    </ul>
  </div>
</div>
</div>
<!-- Header End====================================================================== -->
<?php if(isset($_SESSION["UID"])){if($_SESSION["perm"] == 1){ ?>
  <div id="mainBody">
  	<div class="container">
      <div><h2>Manage Product</h2>
            <hr></hr>
            <table class = "table">
              <thead>
                  <th></th>
                  <th>Item Name</th>

                  <th>Item Price</th>
                  <th>Item Stock</th>
                  <th>Item Catagory</th>
                  <th>Manage</th>

              </thead>
              <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
              <tbody>
                    <?php for($i=0 ;$i<count($_SESSION["list"]);$i++){ ?>
                  <tr>
                      <td><img src = "<?php echo $_SESSION["list"][$i]["directory"] ?>" alt="item_pic" width="50px" height="50px"></img></td>
                      <td><?php echo $_SESSION["list"][$i]["item_name"]; ?></td>
                      <td><?php echo $_SESSION["list"][$i]["Price"]; ?></td>
                      <td><?php echo $_SESSION["list"][$i]["amount"]; ?></td>
                      <td><?php echo $_SESSION["list"][$i]["name"];?></td>
                      <td><a class = "btn btn-danger" href = "admin_manage/item_editCtrl.php?rem=<?php echo $i ?>">X</a><a class = "btn btn-secondary" href="#edit_item<?php echo $i; ?>" data-toggle="modal">Edit</a></td>
                  </tr>
                  <div id="edit_item<?php echo $i; ?>" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false">
                      <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h3>Manage Item</h3>
                      </div>
                      <div class="modal-body" style = "text-align:center">
                      <form id = "form<?php echo $i; ?>"class="form-horizontal loginFrm" action="admin_manage/item_editCtrl.php" method="POST">
                          <label for = "pid"><small><strong>Item ID</small></strong></label><input type ="text" name = "pidd"  value = "<?php echo $_SESSION["list"][$i]["ComputerPartSSN"]; ?>" readonly="readonly"></input>
                          <label for="itemname"><small><strong>Item name</strong></small></label><input type = "text" name = "item_name" id = "itemname" value = "<?php echo ($_SESSION["list"][$i]["item_name"]); ?>"></input>
                          <label for="detail"><small><strong>Item Detail</strong></small></label><textarea id = "detail" name = "detail_area" form = "form<?php echo $i;?>" ><?php echo ($_SESSION["list"][$i]["Detail"]); ?></textarea>
                          <label><small><strong>Price</strong></small></label><input type = "number" name = "price" value = "<?php echo $_SESSION["list"][$i]["Price"]; ?>"></input>
                          <label><small><strong>Stock</strong></small></label><input type = "number" name = "stock" value = "<?php echo $_SESSION["list"][$i]["amount"]; ?>"></input>
                          <label><small><strong>Catagory</strong></small></label>
                          <select name = "cata">
                              <?php for($k = 0 ; $k < count(fetchCatagory()) ; $k++){ ?>
                                <option value = "<?php echo fetchCatagory()[$k]["catagoryID"]; ?>"><?php echo fetchCatagory()[$k]["name"]; ?></option>
                              <?php } ?>
                          </select>
                          <br>
                          <input class = "btn" type = "submit" value = "submit"></input>
                      </form>

                      </div>
                  </div>
                <?php } ?>

              </tbody>


            </table>


      </div>

  </div>
  </div>
<?php }else echo "<script>window.location.replace('index.php');</script>";}
else{ echo "<script>window.location.replace('index.php');</script>"; } ?>

<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->

<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="themes/js/jquery.js" type="text/javascript"></script>
	<script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="themes/js/google-code-prettify/prettify.js"></script>

	<script src="themes/js/bootshop.js"></script>
    <script src="themes/js/jquery.lightbox-0.5.js"></script>

	<!-- Themes switcher section ============================================================================================= -->
<div id="secectionBox">
<link rel="stylesheet" href="themes/switch/themeswitch.css" type="text/css" media="screen" />
<script src="themes/switch/theamswitcher.js" type="text/javascript" charset="utf-8"></script>
	<div id="themeContainer">
	<div id="hideme" class="themeTitle">Style Selector</div>
	<div class="themeName">Oregional Skin</div>
	<div class="images style">
	<a href="themes/css/#" name="bootshop"><img src="themes/switch/images/clr/bootshop.png" alt="bootstrap business templates" class="active"></a>
	<a href="themes/css/#" name="businessltd"><img src="themes/switch/images/clr/businessltd.png" alt="bootstrap business templates" class="active"></a>
	</div>
	<div class="themeName">Bootswatch Skins (11)</div>
	<div class="images style">
		<a href="themes/css/#" name="amelia" title="Amelia"><img src="themes/switch/images/clr/amelia.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="spruce" title="Spruce"><img src="themes/switch/images/clr/spruce.png" alt="bootstrap business templates" ></a>
		<a href="themes/css/#" name="superhero" title="Superhero"><img src="themes/switch/images/clr/superhero.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="cyborg"><img src="themes/switch/images/clr/cyborg.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="cerulean"><img src="themes/switch/images/clr/cerulean.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="journal"><img src="themes/switch/images/clr/journal.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="readable"><img src="themes/switch/images/clr/readable.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="simplex"><img src="themes/switch/images/clr/simplex.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="slate"><img src="themes/switch/images/clr/slate.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="spacelab"><img src="themes/switch/images/clr/spacelab.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="united"><img src="themes/switch/images/clr/united.png" alt="bootstrap business templates"></a>
		<p style="margin:0;line-height:normal;margin-left:-10px;display:none;"><small>These are just examples and you can build your own color scheme in the backend.</small></p>
	</div>
	<div class="themeName">Background Patterns </div>
	<div class="images patterns">
		<a href="themes/css/#" name="pattern1"><img src="themes/switch/images/pattern/pattern1.png" alt="bootstrap business templates" class="active"></a>
		<a href="themes/css/#" name="pattern2"><img src="themes/switch/images/pattern/pattern2.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern3"><img src="themes/switch/images/pattern/pattern3.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern4"><img src="themes/switch/images/pattern/pattern4.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern5"><img src="themes/switch/images/pattern/pattern5.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern6"><img src="themes/switch/images/pattern/pattern6.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern7"><img src="themes/switch/images/pattern/pattern7.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern8"><img src="themes/switch/images/pattern/pattern8.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern9"><img src="themes/switch/images/pattern/pattern9.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern10"><img src="themes/switch/images/pattern/pattern10.png" alt="bootstrap business templates"></a>

		<a href="themes/css/#" name="pattern11"><img src="themes/switch/images/pattern/pattern11.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern12"><img src="themes/switch/images/pattern/pattern12.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern13"><img src="themes/switch/images/pattern/pattern13.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern14"><img src="themes/switch/images/pattern/pattern14.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern15"><img src="themes/switch/images/pattern/pattern15.png" alt="bootstrap business templates"></a>

		<a href="themes/css/#" name="pattern16"><img src="themes/switch/images/pattern/pattern16.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern17"><img src="themes/switch/images/pattern/pattern17.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern18"><img src="themes/switch/images/pattern/pattern18.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern19"><img src="themes/switch/images/pattern/pattern19.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern20"><img src="themes/switch/images/pattern/pattern20.png" alt="bootstrap business templates"></a>

	</div>
	</div>
</div>
<span id="themesBtn"></span>
</body>
</html>
