<!DOCTYPE html>
<?php session_start(); include("catagory_manage/catagoryCtrl.php"); ?>
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
<div class="container-fluid">
<div id="welcomeLine" class="row-fluid">

	<div class="span6">

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

    <ul id="topMenu" class="nav pull-right">
          <a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">Login</span></a>
          <a href = "index.php" ><span class = "btn btn-large btn-danger">Back</span></a>
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
		<li class="active">Registration</li>
    </ul>
	<h3> Registration</h3>
	<div class="well">
	<!--
	<div class="alert alert-info fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
	 </div>
	<div class="alert fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
	 </div>
	 <div class="alert alert-block alert-error fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Lorem Ipsum is simply</strong> dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
	 </div> -->
	<form class="form-horizontal" action = "authenticator/Register.php" method = "POST">
		<h4>Your personal information</h4>
    <div class="alert alert-block alert-success fade in">
  		<button type="button" class="close" data-dismiss="alert">×</button>
  		<strong>Note : </strong> this is for educational purpose only.<br>We did not use your data for selling.
  	 </div>


    <div class="control-group">
			<label class="control-label">Username <sup>*</sup></label>
			<div class="controls">
			  <input type="text" name = "user1" placeholder="Username">
			</div>
		 </div>
     <div class="control-group">
 			<label class="control-label" for="pwd1">Password <sup>*</sup></label>
 			<div class="controls">
 			  <input type="password" name = "pwd1" id="pwd1" placeholder="Password">
 			</div>
 		 </div>
		<div class="control-group">
			<label class="control-label" for="fname1">First name <sup>*</sup></label>
			<div class="controls">
			  <input type="text" name = "fname1" id="fname1" placeholder="First Name">
			</div>
		 </div>
		 <div class="control-group">
			<label class="control-label" for="lname1">Last name <sup>*</sup></label>
			<div class="controls">
			  <input type="text" name = "lname1" id="lname1" placeholder="Last Name">
			</div>
		 </div>
		<div class="control-group">
		<label class="control-label" for="email1">Email <sup>*</sup></label>
		<div class="controls">
		  <input type="text" name = "email1" id="email1" placeholder="Email">
		</div>
	  </div>

		<div class="control-group">
		<label class="control-label">Date of Birth <sup>*</sup></label>
		<div class="controls">
		  <select class="span1" name="day1">
				<option value="">Day</option>
					<?php for($i = 1 ; $i <= 31 ; $i++) { ?>
            <option value = "<?php echo $i;?>"><?php echo $i; ?> </option>
          <?php } ?>
			</select>

			<select class="span1" name="month1">
				<option value="">Month</option>
					<option value="01">January</option>
					<option value="02">Febuary</option>
					<option value="03">March</option>
					<option value="04">April</option>
					<option value="05">May</option>
					<option value="06">June</option>
					<option value="07">July</option>
          <option value="08">August</option>
          <option value="09">September</option>
          <option value="10">October</option>
          <option value="11">November</option>
          <option value="12">December</option>
			</select>
			<select class="span1" name="year1">
				<option value="">Year</option>
					<?php for($i = 1900 ; $i <= 2018 ; $i++){ ?>
            <option value = "<?php echo $i; ?>"><?php echo $i ?> </option>
          <?php } ?>
			</select>

		</div>
	  </div>
    <div class="control-group">
		<label class="control-label" for="gender1">Gender <sup>*</sup></label>
    <div class = "controls"><select class="span1" name="gender1">
          <option value="Male">Male</option>
          <option value = "Female"> Female </option>
    </select></div>

	  </div>




		<h4>Your address</h4>




		<div class="control-group">
			<label class="control-label" for="addr1">Address<sup>*</sup></label>
			<div class="controls">
			  <input type="text" name = "addr1" id="addr1" placeholder="Adress"/> <span>Street address, P.O. box, company name, c/o</span>
			</div>
		</div>


		<div class="control-group">
			<label class="control-label" for="city1">City<sup>*</sup></label>
			<div class="controls">
			  <input type="text" name = "city1" id="city1" placeholder="city"/>
			</div>
		</div>
    <div class="control-group">
			<label class="control-label" for="dis1">Distrinct<sup>*</sup></label>
			<div class="controls">
			  <input type="text" name = "dis1" id="dis1" placeholder="Distrinct"/>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="postcode1">Zip / Postal Code<sup>*</sup></label>
			<div class="controls">
			  <input type="text" name = "postcode1" id="postcode1" placeholder="Zip / Postal Code"/>
			</div>
		</div>
    <div class="control-group">
			<label class="control-label" for="road1">Road<sup>*</sup></label>
			<div class="controls">
			  <input type="text" name = "road1" id="road1" placeholder="Road"/>
			</div>
		</div>







	<p><sup>*</sup>Required field	</p>

	<div class="control-group">
			<div class="controls">
				<input class="btn btn-large btn-success" type="submit" value="Register" />
			</div>
		</div>
	</form>



  <!------test section -------->


</div>
</div>
</div>
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
