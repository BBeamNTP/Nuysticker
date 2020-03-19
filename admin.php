<?php
session_start();
require 'connection.php';
if (!isset($_SESSION['email'])) {
    header('location: login.php');
}
$user_id = $_SESSION['id'];
$user_products_query = "select * from items";
$user_products_result = mysqli_query($con, $user_products_query) or die(mysqli_error($con));
$no_of_user_products = mysqli_num_rows($user_products_result);
$sum = 0;


?>
<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="img/logo.jpg"/>
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
    require 'headeradmin.php';
    ?>
    <br>
    <div class="container">
        <table width="87%" class="table table-dark">
            <tbody>
            <tr class="table-danger">
                <br>
                <th width="9%" height="52"><h4><b>รหัสสินค้า</th>
                <th width="16%"><h4><b>ประเภท</th>
                <th width="18%"><h4><b>ชื่อสินค้า</th>
                <th width="13%"><h4><b>ราคา</th>
                <th width="31%"><h4><b>รูป</th>
                <th width="13%"></th>
            </tr>
            <?php
            $user_products_result = mysqli_query($con, $user_products_query) or die(mysqli_error($con));
            $no_of_user_products = mysqli_num_rows($user_products_result);
            $counter = 1;
            while ($row = mysqli_fetch_array($user_products_result)) {

                ?>
                <tr>
                    <th><?php echo $row['id'] ?></th>
                    <th><?php echo $row['types'] ?></th>
                    <th><?php echo $row['name'] ?></th>
                    <th><?php echo $row['price'] ?></th>
                    <th>

                        <img src="<?php echo $row['image'] ?>" width="200px" height="auto" border="0"/>

                    </th>
                    <th>


                        <script language="JavaScript">
                            function chkConfirm() {
                                if (confirm('คุณต้องการลบ ใช่ หรือ ไม่') == true) {
                                    alert('ลบเรียบร้อยแล้ว');
                                    window.location.href = 'deleteproduct.php?id=<?php echo $row['id'] ?>';
                                }
                            }
                        </script>
                        <input type="button" class="btn btn-danger" name="btnConfirm" value="ลบรายการ"
                               OnClick="chkConfirm()">
                    </th>
                </tr>
                <?php $counter = $counter + 1;
            } ?>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </tbody>
        </table>
    </div>
    <br><br><br><br><br><br><br><br><br><br>
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
