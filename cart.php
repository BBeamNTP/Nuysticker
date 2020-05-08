<?php
session_start();
require 'connection.php';
if ((!isset($_SESSION['email']) && ($_SESSION['status'] != "Member")) ) {
    header('location: login.php');
}
if (($_SESSION['status'] != "Member")) {
    header('location: admin.php');
}
$user_id = $_SESSION['id'];
$user_products_query = "select * from users_items ut inner join items it on it.id=ut.item_id where ut.user_id='$user_id' and ut.status = 'Added to cart'";
$user_products_result = mysqli_query($con, $user_products_query) or die(mysqli_error($con));
$no_of_user_products = mysqli_num_rows($user_products_result);
$sum = 0;
if ($no_of_user_products == 0) {
    ?>
    <script>
        window.alert("ไม่มีสินค้าในตะกร้า");
    </script>
    <?php
} else {
    while ($row = mysqli_fetch_array($user_products_result)) {
        $sum = $sum + $row['totalprice'];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="img/logo3.jpg"/>
    <title>Projectworlds Store</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
    <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
<div>
    <?php
    require 'header.php';
    ?>
    <br>
    <div class="container">
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                <th class="text-center">รายการที่</th>
                <th class="text-center">ชื่อรายการ</th>
                <th class="text-center">จำนวน (ชิ้น)</th>
                <th class="text-center">ราคา (บาท/ชิ้น)</th>
                <th class="text-center" >ราคารวม (บาท)</th>
                <th></th>
            </tr>
            <?php
            $user_products_result = mysqli_query($con, $user_products_query) or die(mysqli_error($con));
            $no_of_user_products = mysqli_num_rows($user_products_result);
            $counter = 1;
            while ($row = mysqli_fetch_array($user_products_result)) {
                ?>
                <tr>
                    <th class="text-center"><?php echo $counter ?></th>
                    <th><?php echo $row['name'] ?></th>
                    <th class="text-center"><?php echo number_format( $row['quantity'] ) ?></th>
                    <th class="text-right"><?php echo number_format( $row['price'] , 2 ) ?></th>
                    <th class="text-right"><?php echo number_format( $row['totalprice'] , 2 )  ?></th>
                    <th class="text-center"><a href='cart_remove.php?id=<?php echo $row['id'] ?>'>ลบรายการ</a></th>
                </tr>
                <?php $counter = $counter + 1;
            } ?>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th class="text-right">รวมทั้งสิ้น</th>
                <th class="text-right"><?php echo number_format( $sum , 2 ) ?></th>
                <th class="text-center"><a href="success.php?id=<?php echo $user_id ?>&sum=<?php echo $sum; ?>" class="btn btn-primary">ยืนยันการสั่งซื้อ</a>
                </th>
            </tr>
            </tbody>
        </table>
    </div>
    <br><br><br><br><br><br>
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
