<?php
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['email'])){
        header('location:index.php');
    }else{
        $user_id=$_GET['id'];

        $sql3 = "select MAX(bill_id) from users_items where user_id='$user_id' and status='Confirmed'";

        $result3=mysqli_query($con,$sql3);
        $dbarr = mysqli_fetch_row($result3) ;
        $bill_id = $dbarr[0]+1 ; // นำค่า id มาเพิ่มให้กับค่ารหัสสินค้าครั้งละ1

        $confirm_query="update users_items set status='Confirmed', bill_id='$bill_id' where user_id=$user_id and status='Added to cart' and bill_id='0'";
        $confirm_query_result=mysqli_query($con,$confirm_query) or die(mysqli_error($con));

        function DateThai($strDate)
        {
            $strYear = date("Y",strtotime($strDate))+543; // ปี
            $strMonth= date("n",strtotime($strDate));
            $strDay= date("j",strtotime($strDate));
            $strHour= date("H",strtotime($strDate))+5; // ชั่วโมง
            $strMinute= date("i",strtotime($strDate));
            $strSeconds= date("s",strtotime($strDate));
            $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
            $strMonthThai=$strMonthCut[$strMonth];
            return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
        }

        $strDate = date('Y-m-d H:i:s');
        $date = DateThai($strDate)." น.";

        $add_billing_query = "insert into billing(id, user_id, status, time) values ('$bill_id', '$user_id','Not paid','$date')";
        $add_billing_result = mysqli_query($con, $add_billing_query) or die(mysqli_error($con));

    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/logo.jpg" />
        <title>Projectworlds Store</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>
        <div>
            <?php
                require 'header.php';
            ?>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading"></div>
                            <div class="panel-body">
                                <p>Your order is confirmed. Thank you for shopping with us. <a href="products.php">Click here</a> to purchase any other item.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
               <div class="container">
                <center>
                   <p>Copyright &copy <a href="https://projectworlds.in">Projectworlds</a> Store. All Rights Reserved.</p>
                   <p>This website is developed by Yugesh Verma</p>
               </center>
               </div>
           </footer>
        </div>
    </body>
</html>
