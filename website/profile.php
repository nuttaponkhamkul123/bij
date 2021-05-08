<!DOCTYPE html>
<?php session_start(); include 'profile/profileCtrl.php';include 'order/order_history.php';   ?>
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
    <link href="stylesheet/animate.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="stylesheet/hover.css" rel="stylesheet" media="all">
    <link href="stylesheet/custom.css" rel="stylesheet"/>
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

</div>
</div>
</div>
</div>
<!-- Header End====================================================================== -->
<div id="mainBody">

<div class="container">
	<hr class="soften">

  <?php if(isset($_SESSION["UID"])){ ?>
  <div class = "container animated fadeIn">
      <div class = "row">
        <div class = "span2 thumbnail" style = "height:100%">

          <div style = "text-align:center;display: flex;flex-direction: column;" >
            <img class = "animated fadeIn" src = "<?php echo profile_pic_fetch();?>" ></img>
            <form action="profile/profileCtrl.php" method = "post" enctype="multipart/form-data">
              <input type="file" onchange = "this.form.submit()" name = "pic" id="profFile"  style = "display:none" accept=".jpg, .jpeg" />
              <input type="hidden" name = "uid"/>
              <input type = "button" onclick = "$('#profFile').click()" class = "btn" style = "cursor: pointer;height:100%;width:100%;max-width:100%" value = "Change"/>
            </form>
            <div ><h5 style = "text-align:left">Options</h5></div>

            <a class = "" href = "#" onclick = "$('#editb').click();" data-toggle="tab" style = "text-decoration:none"><div class = "pull-left">Edit Profile</div></a>
            <a class = "" href = "index.php" style = "text-decoration:none"><div class = "pull-left">Back</div></a>


        </div>
      </div>
        <div class = "span9">
          <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#about">About</a></li>
                <li class=""><a id = "editb" data-toggle="tab" href="#edit">Edit</a></li>
                <li class=""><a id = "historyb" data-toggle="tab" href="#history">Order History</a></li>
                <?php if($_SESSION["perm"] == 1){ include('admin_manage/orderFetch.php'); fetch();?>
                <li class=""><a id = "historyad" data-toggle="tab" href="#historyadd">View History(Admin)</a></li>
              <?php } ?>

        </ul>
        <div class = "tab-content animated fadeIn">
            <div id = "about" class="tab-pane fade in active">
              <h1>
                <?php echo $_SESSION["Firstname"]." ".$_SESSION["Lastname"]; ?></h1>
                <h3><small>Permission : <?php echo permFetch(); ?></small></h3>
              <hr class="soften"/>
              <div class="row">
                <div class="span4">
                <h4>Profile Detail</h4>
                <p><h5>	Name : <br/> Lastname :
                  </br> City : </br>
                  Road : </br>
                  Postcode : </br>
                </h5></p>
                </div>
                <div class = "span4">

                  <h4 style = "color:white;"><br></h4>
                  <p style = "font-size:12px"><?php echo $_SESSION["Firstname"]; ?><br>
                    <?php echo $_SESSION["Lastname"]; ?><br>
                    <?php echo $_SESSION["city"]."<br>".$_SESSION["road"]."<br>".$_SESSION["postcode"]; ?>
                  </p>
                </div>
              <?php } ?>
            </div>



            </div>
            <div id = "edit" class="tab-pane fade in">
              <h1>Edit</h1>
              <hr class = "soft">
              <div class = "container-fluid">
                    <div class = "row-fluid">
                      <div class = "span1"></div>
                      <div class = "span6" style = "display:table;">
                        <form id = "form_edit" action = "profile/profileCtrl.php" method = "post">
                            <table border="0">
                              <tr>
                                <td>Username</td>
                                <td><input type = "text" style = "display:table" value = "<?php echo $_SESSION["usr"]; ?>" disabled></input></td>
                              </tr>
                              <tr>
                                  <td>Password</td>
                                  <td><input name = "pwd" type = "password" style = "display:table" value = "<?php echo $_SESSION["pwd"]; ?>"></input></td>

                              </tr>
                              <tr><td><hr></td><td><hr></td></tr>
                                <tr>
                                  <td>Firstname</td>
                                  <td>Lastname</td>

                                </tr>
                                <tr>
                                    <td><input name = "fn" type = "text" style = "display:table" value = "<?php echo $_SESSION["Firstname"]; ?>"></input></td>
                                    <td><input name = "ln" type = "text" style = "display:table" value = "<?php echo $_SESSION["Lastname"]; ?>"></input></td>

                                </tr>
                                <tr><td><hr></td><td><hr></td></tr>
                                <tr>

                                  <td>City</td>
                                  <td><input name = "cty" type = "text" value = "<?php echo $_SESSION["city"]; ?>"></input></td>
                                </tr>
                                <tr>
                                  <td>Road</td>
                                  <td><input name = "rd" type = "text" value = "<?php echo $_SESSION["road"]; ?>"></input></td>
                                </tr>
                                <tr>
                                  <td>Postcode</td>
                                  <td><input name = "pc" type = "text" value = "<?php echo $_SESSION["postcode"]; ?>"></input></td>
                                </tr>

                            </table>
                            <br>
                            <div onclick = "$('#form_edit').submit();" class = "button-black hvr-fade" style = "text-decoration:none;cursor:help">Edit Profile</div>
                            <div onclick = "window.location.replace('profile.php');" class = "button-red hvr-fade" style = "text-decoration:none;cursor:help">Cancel</div>
                        </form>


                      </div>



                    </div>

              </div>






        </div>
        <div id = "history" class="tab-pane fade in">
          <h4>Order History</h4>
          <hr class = "soft">
          <div class = "container-fluid">
                <table class = "table table-bordered" style = "width:100%">
                    <thead>
                        <th>OrderID</th>
                        <th>Date</th>
                        <th>Manage</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        <?php for($i = 0 ;$i < count($_SESSION['hist']) ; $i++) { ?>
                        <tr>
                          <form action = "order-detail.php" method = "post">
                            <input type = "hidden" name = "orderid" value = "<?php echo $_SESSION['hist'][$i]['OrderID']; ?>"></input>
                            <input type = "hidden" name = "orderDate" value = "<?php echo $_SESSION['hist'][$i]['OrderDate']; ?>"></input>
                            <input type = "hidden" name = "Status_name" value = "<?php echo $_SESSION['hist'][$i]['Status_name']; ?>"></input>
                            <td><?php echo $_SESSION['hist'][$i]['OrderID']; ?></td>
                            <td><?php echo $_SESSION['hist'][$i]['OrderDate']; ?></td>
                            <td><input type = "submit" class = "btn btn-success" value = "View"></input></td>
                            <?php if($_SESSION['hist'][$i]['Status_name'] == 'Pending'){ ?>
                            <td><span class="label label-warning">Pending</td>
                            <?php }else{ ?>
                              <td><span class="label label-success">Delivered</td>
                            <?php } ?>
                          </form>

                        </tr>
                      <?php } ?>

                    </tbody>

                </table>

          </div>






    </div>
    <div id = "historyadd" class="tab-pane fade in">

      <h4>All History</h4>
      <hr class = "soft">
      <div class = "container-fluid">
            <table class = "table table-bordered" style = "width:100%">
                <thead>
                    <th>OrderID</th>
                    <th>MemberID</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Date</th>
                    <th>Manage</th>
                    <th>Status</th>
                </thead>
                <tbody>
                    <?php for($i = 0 ;$i < count($_SESSION['hisa']) ; $i++) { ?>
                    <tr>
                      <form action = "order-detail.php" method = "post">
                        <input type = "hidden" name = "orderid" value = "<?php echo $_SESSION['hisa'][$i]['OrderID']; ?>"></input>
                        <input type = "hidden" name = "orderDate" value = "<?php echo $_SESSION['hisa'][$i]['OrderDate']; ?>"></input>
                        <input type = "hidden" name = "Status_name" value = "<?php echo $_SESSION['hisa'][$i]['Status_name']; ?>"></input>
                        <td><?php echo $_SESSION['hisa'][$i]['OrderID']; ?></td>
                        <td><?php echo $_SESSION['hisa'][$i]['MemberID']; ?></td>
                        <td><?php echo $_SESSION['hisa'][$i]['firstname']; ?></td>
                        <td><?php echo $_SESSION['hisa'][$i]['lastname']; ?></td>
                        <td><?php echo $_SESSION['hisa'][$i]['OrderDate']; ?></td>
                        <td><input type = "submit" class = "btn btn-success" value = "View"></input></td>
                        <?php if($_SESSION['hisa'][$i]['Status_name'] == 'Pending'){ ?>
                    </form>
                    <form id = "his<?php echo $i?>" action = "admin_manage/orderFetch.php" method = "POST">
                      <input type = "hidden" name = "orderid" value = "<?php echo $_SESSION['hisa'][$i]['OrderID']; ?>"></input>
                      <input type = "hidden" name = "orderDate" value = "<?php echo $_SESSION['hisa'][$i]['OrderDate']; ?>"></input>
                      <input type = "hidden" name = "Status_name" value = "<?php echo $_SESSION['hisa'][$i]['Status_name']; ?>"></input>
                      <input type = "hidden" name = "MemberID" value = "<?php echo $_SESSION['hisa'][$i]['MemberID']; ?>"></input>
                        <td><select name = "op" onchange="this.form.submit()">
                          <option value = "0" selected>Pending</option>
                          <option value = "1">Delivered</option>
                        </select></td>
                        <?php }else{ ?>
                          <td><select name = "op">
                            <option value = "0" onchange="$('his<?php echo $i; ?>').submit()">Pending</option>
                            <option value = "1" selected>Delivered</option>
                          </select></td>
                        <?php } ?>

                    </form>
                    </tr>
                  <?php } ?>

                </tbody>

            </table>

      </div>






</div>



      </div>



  </div>






	</div>





</div>
</div>
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
