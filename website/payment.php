<!DOCTYPE html>
<?php session_start();


?>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php if($_REQUEST['firstname'] != "" && $_REQUEST['lastname'] != "" && $_REQUEST['email'] != "" && $_REQUEST['address'] != "") { ?>
    <nav class="nav bg-dark">
        <a class="nav-link active text-white" href="#" style = "margin-left:10%"><?php echo $_SESSION["Firstname"]; ?></a>

        </nav>

          <div class = "bg-dark" style = "padding:1em">
                <h3 style = "margin-left:10%" class = "text-white" >Payment</h3>
          </div>
        <br>
        <div class = "container border" style = "text-align:center;">
                <br><br><img src = "ktb.png"></img>
                <br><br><h5>Krung Thai Bank : 123-4-56789-0</h5>
                <h6>Name : นายณัฐพนธ์ ขามกุล</h6>
                <hr style = "width:30%">
                <form action = "cart/confirm_order.php" method = "post">
                  <input type="hidden" name="firstname" value="<?php echo $_REQUEST['firstname']; ?>">
                  <input type="hidden" name="lastname" value="<?php echo $_REQUEST['lastname']; ?>">
                  <input type="hidden" name="email" value="<?php echo $_REQUEST['email']; ?>">
                  <input type="hidden" name="address" value="<?php echo $_REQUEST['address']; ?>">

                  <input type="submit" class="btn btn-primary" value = "Get Reciept"></input>
                  <a class="btn btn-danger" href="index.php?re=1">Back to homepage</a><br><br><br>
                </form>



        </div>
      <?php }else{ ?>
        <nav class="nav bg-dark">
            <a class="nav-link active text-white" href="#" style = "margin-left:10%"><?php echo $_SESSION["Firstname"]; ?></a>

            </nav>

              <div class = "bg-dark" style = "padding:1em">
                    <h3 style = "margin-left:10%" class = "text-white" >Payment</h3>
              </div>
            <br>
            <div class = "container border" style = "text-align:center;">
                    <br>
                    <br><br><h5>Invalid Parameter</h5>
                    <h6>please fill the data</h6>
                    <hr style = "width:30%">
                    <a class="btn btn-danger" href="index.php?re=1">Back to homepage</a><br><br><br>
            </div>
          <?php } ?>

  </body>
</html>
