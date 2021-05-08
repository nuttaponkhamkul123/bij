<!DOCTYPE html>
<?php session_start(); include("catagory_manage/catagoryCtrl.php");?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootshop online Shopping cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="stylesheet/custom.css" rel="stylesheet" />
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
</div>
<!-- Header End====================================================================== -->
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->

<!-- Sidebar end=============================================== -->
	<div class="span12">
    <ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li class="active"> SHOPPING CART</li>
    </ul>
	<h3>  SHOPPING CART [ <small><?php if(isset($_SESSION["cart"])) echo count($_SESSION["cart"]); else echo "0"; ?> Item(s) </small>]

    <a href="index.php" class="btn btn-large btn-danger pull-right">Back</a><a href="product.php" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a></h3>

	<hr class="soft"/>
  <?php if(!(isset($_SESSION["UID"]))){?>
  <h4 class = "text-error" >You need to Login first</h4>
	<table class="table table-bordered">
		<tr><th> Login  </th></tr>
		 <tr>
		 <td>
			<form class="form-horizontal" action = "authenticator/Login.php" method = "POST">
				<div class="control-group">
				  <label class="control-label" for="inputUsername">Username</label>
				  <div class="controls">
					<input type="text" name = "user" id="inputUsername" placeholder="Username">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="inputPassword1">Password</label>
				  <div class="controls">
					<input type="password" name = "pwd" id="inputPassword1" placeholder="Password">
				  </div>
				</div>
				<div class="control-group">
				  <div class="controls">
					<button type="submit" class="btn">Sign in</button> OR <a href="register-page.php" class="btn">Register Now!</a>
				  </div>
				</div>

			</form>
		  </td>
		  </tr>
	</table>
<?php }else{ ?>

	<table class="table table-bordered">
              <thead>
                <tr>
                  <th></th>
                  <th>Product</th>


                  <th>Quantity</th>
                  <th>Manage</th>
				          <th>Price</th>
                  <th>Tax</th>

				</tr>
              </thead>
              <tbody>
                <?php for($i = 0 ;$i < count($_SESSION["cart"]) ; $i++){ ?>
                  <tr>
                    <td><img width = "50px" height = "50px" src = "<?php echo $_SESSION["cart"][$i]["item_directory"]; ?>"></img></td>
                    <td><?php echo " ".$_SESSION["cart"][$i]["item_name"]; ?></td>

                    <td><?php echo $_SESSION["cart"][$i]["item_quantity"]; ?></td>
                    <td style = "text-align:center"><form action = "cart/cart.php" method = "GET"><input type = "hidden" name = "index_rem" value = "<?php echo $i; ?>"></input><input type = "submit" name = "remBtn" class = "btn btn-danger" value = "X"></input></form></td>
                    <td><?php echo $_SESSION["cart"][$i]["item_price"]." ฿"; ?></td>
                    <td><?php echo $_SESSION["cart"][$i]["item_tax"]." ฿"; ?></td>
                  </tr>
                <?php } ?>
				      </tbody>

            </table>

                  <div style = "text-align:right;">

                          <h4><strong>Total Price : </strong><?php if(isset($_SESSION["total_price"])) echo number_format($_SESSION["total_price"],2). " Baht"; else echo "0 Baht" ?></h4>
                  </div>
                  <a href="product.php" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>

                	<a href="checkout-page.php" class="btn btn-large pull-right btn-success">Checkout <i class="icon-arrow-right"></i></a>


    <?php } ?>

    <br>


</div>
</div></div>
</div>
<!-- MainBody End ============================= -->
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
				<a href="special_offer.html">SPECIAL OFFERS</a>
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
