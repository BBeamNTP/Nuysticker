<?php
session_start();
require '../connection.php';
require 'baht_text.php';

if (!isset($_SESSION['email'])) {
    header('location: login.php');
}
$user_id = $_SESSION['id'];
$billing_id = $_GET['id'];
$user_products_query = "select * from users_items ut inner join items it on it.id=ut.item_id where ut.user_id='$user_id' and ut.bill_id='$billing_id' and ut.status='Confirmed'";
$user_products_result = mysqli_query($con, $user_products_query) or die(mysqli_error($con));
$no_of_user_products = mysqli_num_rows($user_products_result);
$sum = 0;

$user_query = "select us.id, us.name, us.email, us.contact, us.city, us.address, bl.time, bl.id from users us inner join billing bl on us.id=bl.user_id where us.id = '$user_id' and bl.id='$billing_id'";
$user_result = mysqli_query($con, $user_query) or die(mysqli_error($con));
$row = mysqli_fetch_array($user_result);
$user_email = $row['email'];
$user_name = $row['name']; //name user
$user_status = $_SESSION['status']; //status user
$user_contact = $row['contact']; //contact user
$user_city = $row['city'];//city user
$user_address = $row['address']; //address user
$billing_time = $row['time'];
if ($no_of_user_products == 0) {
    ?>
    <script>
        window.alert("No items in the cart!!");
    </script>
    <?php
} else {
    while ($row = mysqli_fetch_array($user_products_result)) {
        $sum = $sum + $row['totalprice'];
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="logo.jpg"/>

    <style type="text/css" media="print">
        input {

            display: none;
        }
    </style>

    <title>Nuy Sticker Store</title>
    <link rel="stylesheet" href="style.css" media="all"/>
    <input type="image" src="print.png" width="20px" height="auto" align="right" style="padding-top:6% " name="button"
           id="button" value="Print" onclick="print();">
</head>
<body>
<header class="clearfix">
    <h3 style="color: #5d6975; padding-left: 80%">ใบเสร็จเลขที่ : <?php echo $billing_id;?></h3>
    <h3 style="color: #5d6975; padding-left: 80%">วันที่ : <?php echo $billing_time;?></h3>

    <div id="logo">
        <img src="logo.jpg" ">
    </div>

    <div align="center"><h1>ใบเสร็จรับเงิน</h1></div>
    <div id="company" class="clearfix">
        <div>ร้าน Nuy Sticker Shop</div>
        <div>เลขที่ 25 ถนนสวนผัก แขวงตลิ่งชัน <br/> เขตตลิ่งชัน กรุงเทพมหานคร 10170</div>
        <div>เบอร์โทร 028867366</div>
        <div>อีเมล <a href="mailto:company@example.com">nuysticker@gmail.com</a></div>
    </div>
    <div id="project">
        <div><span>วันที่</span> <?php echo $billing_time ?></div>
        <div><span>สั่งซื้อโดย</span> <?php echo $user_name ?> </div>
        <div><span>ที่อยู่</span> <?php echo $user_address ?></div>
        <div><span>เบอร์โทร</span> <?php echo $user_contact ?></div>
        <div><span>อีเมล</span> <?php echo $user_email ?></div>
    </div>
</header>
<main>
    <table>
        <thead>

        </thead>
        <tbody>
        <div class="container">
            <table class="table table-bordered table-striped">
                <tbody>
                <tr style="background-color: rgba(239,253,0,0.31)" >
                    <th>รายการที่</th>
                    <th>ชื่อรายการ</th>
                    <th>จำนวน (ชิ้น)</th>
                    <th>ราคา (บาท/ชิ้น)</th>
                    <th>ราคารวม (บาท)</th>
                </tr>
                <?php
                $user_products_result = mysqli_query($con, $user_products_query) or die(mysqli_error($con));
                $no_of_user_products = mysqli_num_rows($user_products_result);
                $counter = 1;
                while ($row = mysqli_fetch_array($user_products_result)) {

                    ?>
                   <tr>
                        <th style="background-color: rgba(253,245,0,0.06)"><?php echo $counter ?></th>
                        <th style="text-align: left;"><?php echo $row['name'] ?></th>
                        <th style="text-align: right; background-color: rgba(253,245,0,0.06)"><?php echo number_format( $row['quantity'] ) ?></th>
                        <th style="text-align: right"><?php echo number_format(  $row['price'] , 2 )?></th>
                        <th style="text-align: right; background-color: rgba(253,245,0,0.06)"><?php echo number_format(  $row['totalprice'] , 2 ) ?></th>
                    </tr>
                    <?php $counter = $counter + 1;
                } ?>

                <tr>
                <th></th>
                    <th style="text-align: right" ><br><?php echo "(".baht_text($sum).")"; // สามร้อยหกสิบเอ็ดบาทเจ็ดสิบห้าสตางค์ ?><br></th>
                    <th></th>
                    <th style="text-align: right"><br>รวมทั้งสิ้น<br></th>

                    <th style="text-align: right"><br><?php echo number_format(  $sum , 2 ) ; ?><br></th>
                </tr>
                </tbody>
            </table>
            <div style="max-width: 200px;padding-left: 65%; padding-top: 10%">

                <img src="../img/Untitled-1.png" style="max-width: 200px">
                <h3 style="color: #5d6975; margin-left: 50px">วันที่ <?php echo $billing_time ?></h3>
            </div>

        </div>
        </tbody>
    </table>

</main>

</body>
</html>