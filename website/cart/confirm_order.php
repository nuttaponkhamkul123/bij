<?php
    include('../fpdf/fpdf.php');
    session_start();
    if(!isset($_SESSION["flag"])){
      $_SESSION["flag"] = 0;
      $_SESSION["oid"] = 0;
    }

    //echo $_REQUEST["firstname"];
    //echo $_REQUEST["lastname"];
    //echo $_REQUEST["email"];


    function queryOrder(){
      include("../connector/connect.php");
      $orderID = rand(100000,500000). $_SESSION["UID"];
      $_SESSION["oid"] = $orderID;
       for($i = 0 ; $i < count($_SESSION["cart"]) ; $i++)
      {
        //query data to orders table
        //date_default_timezone_set("Asia/Bankok");
        $t = time();
        $date = date("Y-m-d",$t);
        $time = date("h:i:sa");
        $createOrder_query = "INSERT INTO orders(OrderID,MemberID,Price,OrderDate,ComputerPartName) VALUES('".$orderID."','".$_SESSION["UID"]."','".$_SESSION["cart"][$i]["item_price"]."','".$date." ".$time."','".$_SESSION["cart"][$i]["item_name"]."')";
        mysqli_query($con,$createOrder_query);
      }
        queryDeliveryDetail($orderID,$_REQUEST["firstname"],$_REQUEST["lastname"],$_REQUEST["email"],$_REQUEST["address"]);
    }
    function queryDeliveryDetail($orderid,$firstname,$lastname,$email,$address){
          include("../connector/connect.php");
            $command  = "INSERT INTO delivery_detail(OrderID,MemberID, firstname, lastname, email, address, status) VALUES('".$orderid."','".$_SESSION["UID"]."','".$firstname."','".$lastname."','".$email."','".$address."',0)";
            mysqli_query($con,$command);

            for($i = 0; $i < count($_SESSION["cart"]) ;$i++){

              $command2 = "UPDATE stock SET amount = amount - ".$_SESSION["cart"][$i]["item_quantity"]." WHERE ComputerPartSSN = '".$_SESSION["cart"][$i]["item_ssn"]."'";
              $res11 = mysqli_query($con,$command2);
              //echo $command2;
            }


            createReciept($orderid);

    }


    function createReciept($idd){

      $temp1 = $_SESSION["cart"];

      class PDF extends FPDF
  {
      public function Footer()
      {
          $this->SetY(-15);
          $this->SetFont('Arial','I',8);
          $this->Cell(0,10,"Created by localhost/index.php .Thank you for our services",0,0,'C');
      }
  }
      $pdf = new PDF();
          $pdf->AddPage();
          $pdf->AddFont('THSarabunNew','','THSarabunNew.php');
          $pdf->AddFont('THSarabunNew','B','THSarabunNew_b.php');
          $pdf->SetFont('THSarabunNew','B',30);
          $pdf->Cell(100,10,'Invoice',0,0,'R');
          $pdf->Ln();
          $pdf->SetFont('THSarabunNew','B',18);
          $pdf->Cell(40,10,'Order ID : '.$idd,1,1,'C');
          $pdf->SetFont('THSarabunNew','B',15);
          $pdf->Cell(40,5,'Name : '.$_REQUEST['firstname']." ".$_REQUEST['lastname']);
          $pdf->Ln();
          $pdf->Cell(10,5,'Email : '.$_REQUEST['email']);
          $pdf->Ln();
          $pdf->Cell(20,5,'Address : '.$_REQUEST['address']);
          $pdf->Ln();
          $pdf->Cell(100,5,"Krung thai Bank(KTB):123-4-56789-0",0,0);
          $pdf->Ln();
          $pdf->Ln();
          $pdf->SetX(10);
          $pdf->Cell(120,5,'Item',1,0,'C');
          $pdf->Cell(30,5,'Quantity',1,0,'C');
          $pdf->Cell(40,5,'Price',1,0,'C');
          $pdf->Ln();
          for($i = 0 ; $i < count($temp1) ; $i++){
            $pdf->SetX(10);
            $pdf->SetFont('THSarabunNew','',12);
            $pdf->Cell(120,5,iconv('UTF-8','TIS-620',$temp1[$i]["item_name"]),1,0);
            $pdf->Cell(30,5,$temp1[$i]["item_quantity"],1,0);
            $pdf->Cell(40,5,$temp1[$i]["item_price"],1,0);
            $pdf->Ln();
          }
          $pdf->Cell(120,5,'',0,0);
          $pdf->Cell(30,5,'Total Price',1,0);
          $pdf->Cell(40,5,$_SESSION["total_price"],1,0,'C');

          //$pdf->SetY(2);
          // Select Arial italic 8
          //$pdf->SetFont('Arial','I',10);
          // Print centered page number
          //$pdf->Cell(0,15,'testing',0,0,'C');
          $fileName = 'invoice-' . $idd . '.pdf';
          $pdf->Output($fileName,'D');





    }
    if(isset($_SESSION["flag"]) && $_SESSION["flag"] == 0){
      queryOrder();
      $_SESSION["flag"] = 1;
    }else if(isset($_SESSION["flag"]) && $_SESSION["flag"] == 1){
      echo "<script>alert('Cannot create more reciept.Sorry For inconvenience..');window.location.replace('../index.php?re=1')</script>";
    }




?>
