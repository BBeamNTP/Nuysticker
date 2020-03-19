<?php
function function_alert($message) {

    // Display the alert box
    echo "<script>alert('$message');</script>";
}
require 'connection.php';

echo $name = $_POST['name'];
echo $price = $_POST['price'];
echo $gender = $_POST['types'];
$sql = "select * from items order by id desc limit 0,1";
$result=mysqli_query($con,$sql);
$num_result = mysqli_num_rows($result);
$dbarr = mysqli_fetch_row($result) ;
echo "++++++++++++++++++++++++++: ".$item_id = $dbarr[0]+1 ; // นำค่า id มาเพิ่มให้กับค่ารหัสสินค้าครั้งละ1




?>