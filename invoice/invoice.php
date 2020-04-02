<?php
session_start();
require '../connection.php';
if(!isset($_SESSION['email'])){
    header('location: login.php');
}
$user_id=$_SESSION['id'];
$user_products_query="select * from users_items ut inner join items it on it.id=ut.item_id where ut.user_id='$user_id' and ut.status='Confirmed'";
$user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
$no_of_user_products= mysqli_num_rows($user_products_result);
$sum=0;
if($no_of_user_products==0){
    //echo "Add items to cart first.";
    ?>
    <script>
        window.alert("No items in the cart!!");
    </script>
    <?php
}else{
    while($row=mysqli_fetch_array($user_products_result)){
        $sum=$sum+$row['totalprice'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Example 1</title>
    <link rel="stylesheet" href="style.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="logo.jpg">
      </div>
      <h1>ใบแจ้งชำระ</h1>
      <div id="company" class="clearfix">
        <div>ร้าน NuySticker Shop.</div>
        <div>เลขที่ 25 ถนน สวนผัก แขวง ตลิ่งชัน  <br /> เขต ตลิ่งชัน กรุงเทพมหานคร 10170 </div>
        <div>เบอร์โทร 028867366 </div>
        <div>อีเมล์ <a href="mailto:company@example.com">nuysticker@gmail.com</a></div>
      </div>
      <div id="project">
        <div><span>เรื่อง</span> รายการสั่งซื้อ และจำนวนเงินทั้งหมด</div>
        <div><span>สั่งซื้อโดย</span> John Doe</div>
        <div><span>ที่อยู่</span> 796 Silver Harbour, TX 79273, US</div>
        <div><span>อีเมล์</span> <a href="mailto:john@example.com">john@example.com</a></div>
        <div><span>วันที่</span> August 17, 2015</div>
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
                <tr>
                    <th>รายการที่</th><th>ชื่อรายการ</th><th>จำนวน (ชิ้น)</th><th>ราคา (บาท/ชิ้น)</th><th>ราคารวม (บาท)</th>
                </tr>
                <?php
                $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
                $no_of_user_products= mysqli_num_rows($user_products_result);
                $counter=1;
                while($row=mysqli_fetch_array($user_products_result)){

                    ?>
                    <tr>
                        <th><?php echo $counter ?></th><th><?php echo $row['name']?></th><th><?php echo $row['quantity']?></th><th><?php echo $row['price']?></th><th><?php echo $row['totalprice']?></th>
                    </tr>
                    <?php $counter=$counter+1;}?>

                <tr>
                    <th></th><th></th><th></th><th><br>รวมทั้งสิ้น <br></th><th><br><?php echo $sum;?> บาท <br></th>
                </tr>
                </tbody>
            </table>
        </div>
          <tr>
            <td colspan="4">SUBTOTAL</td>
            <td class="total">$5,200.00</td>
          </tr>
          <tr>
            <td colspan="4">TAX 25%</td>
            <td class="total">$1,300.00</td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">GRAND TOTAL</td>
            <td class="grand total">$6,500.00</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>