<!DOCTYPE html><?php session_start(); ?>
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
    <nav class="nav bg-dark">
        <a class="nav-link bg-dark active text-white" href="#"><?php echo $_SESSION["Firstname"]; ?></a>

        </nav>

          <div class = "bg-dark" style = "padding:1em">
                <center><h3 class = "text-white" >Enter Your Information</h3></center>
          </div>
        <br>
        <div class = "container-fluid border" >

            <br>
            <form action = "payment.php" method = "post">
              <div style = "display:grid;grid-template-columns: 40% auto;text-align:center">
                  <div style = "text-align:right">Name</div>
                  <div style = "margin-left:2%"><input name = "firstname" placeholder = "Eg : John" class = "form-control" type = "text" style = "width:35%"/></div>

              </div>
              <br>
              <div style = "display:grid;grid-template-columns: 40% auto">
                  <div style = "text-align:right">Lastname</div>
                  <div style = "margin-left:2%"><input name = "lastname" placeholder = "Eg : Doe" class = "form-control" type = "text" style = "width:35%"/></div>

              </div>
              <br>
              <div style = "display:grid;grid-template-columns: 40% auto">
                  <div style = "text-align:right">Email</div>
                  <div style = "margin-left:2%"><input name = "email" placeholder = "Eg : example@email.com" class = "form-control" type = "text" style = "width:35%"/></div>

              </div>
              <br>
              <div style = "display:grid;grid-template-columns: 40% auto">
                  <div style = "text-align:right">Address</div>
                  <div style = "margin-left:2%"><textarea name = "address" placeholder = "Eg : thailand,Prathum thani" class = "form-control" type = "text" style = "width:35%"></textarea></div>

              </div>
              <br>
              <div style = "display:grid;grid-template-columns: 40% auto">
                  <div style = "text-align:right"><a></a></div>
                  <div style = "margin-left:7%"><input type = "submit" value = "Next" class = "btn btn-success"></input><a class = "btn btn-danger text-white" href = "product_summary.php" style = "margin-left:1%">Back</a></div>


              </div>


            </form>

              <br>



        </div>


  </body>
</html>
