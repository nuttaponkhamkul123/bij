<!DOCTYPE html>
<?php session_start();
        include_once("connector/connect.php");
        $command = "SELECT ComputerPartName,Price,OrderDate FROM orders WHERE OrderID = '".$_REQUEST["orderid"]."'";
        $temp = array();
        $res = mysqli_query($con,$command);
        while($row = mysqli_fetch_assoc($res)){
          array_push($temp,$row);
        }

?>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <title></title>
  </head><input type = "hidden" name = "orderid" value = "<?php echo $_SESSION['hist'][$i]['OrderID']; ?>"></input>
  <input type = "hidden" name = "orderDate" value = "<?php echo $_SESSION['hist'][$i]['OrderDate']; ?>"></input>
  <input type = "hidden" name = "Status_name" value = "<?php echo $_SESSION['hist'][$i]['Status_name']; ?>"></input>
  <body>
    <nav class="nav bg-dark">
        <a class="nav-link active text-white" href="#" style = "margin-left:10%"><?php echo $_SESSION["Firstname"]; ?></a>

        </nav>

          <div class = "bg-dark" style = "padding:1em">
                <h3 style = "margin-left:10%" class = "text-white" >Order ID : <?php echo $_REQUEST['orderid'] ?></h3>
                  <small class = "text-white" style = "margin-left:12%">Status : </small><?php if($_REQUEST["Status_name"] == 'Pending'){ ?><a class = "badge badge-warning text-white"> Pending</a><?php }else{ ?><a class = "badge badge-success text-white"> Delivered</a><?php } ?>
          </div>
        <br>
        <div class = "container" style = "">
          
            <table class = "table table-bordered">
                    <thead>
                        <th>Items name</th>
                        <th>Price</th>
                        <th>OrderDate</th>
                    </thead>
                    <?php $temptotal = 0; ?>
                    <tbody>
                        <?php for($i = 0 ; $i < count($temp) ; $i++){ ?>
                        <tr>
                            <?php $temptotal += ($temp[$i]["Price"] * (107/100)); ?>
                            <td><?php echo $temp[$i]["ComputerPartName"]; ?></td>
                            <td><?php echo $temp[$i]["Price"]; ?></td>
                            <td><?php echo $temp[$i]["OrderDate"]; ?></td>

                        </tr>
                      <?php } ?>

                    </tbody>
                    <tfoot>

                      <tr>
                            <td><a></a></td>
                            <td><a></a></td>
                            <td><h5>Total Price:<?php echo $temptotal; ?></h5></td>
                      </tr>
                    </tfoot>

            </table>
            <div style = "text-align:right"><a class = "btn btn-primary" href = "profile.php">Back</a></div>

          <br><br><br><br>
        </div>


  </body>
</html>
