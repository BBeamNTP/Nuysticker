<?php
require 'connection.php';
session_start();
if (isset($_SESSION['email'])) {
    header('location: products.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="img/lifestyleStore.png"/>
    <title>NuySticker Shop</title>
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
    <style>
        div.fileinputs {
            position: relative;
        }

        div.fakefile {
            position: absolute;
            top: 0px;
            left: 0px;
            z-index: 1;
        }

        input.file {
            position: relative;
            text-align: right;
            -moz-opacity: 0;
            filter: alpha(opacity:0);
            opacity: 0;
            z-index: 2;
        }

        #showImage {
            display: none;
        }

        #showImage[src] {
            display: block;
            height: 400px;
            border: solid 5px #000;
            border-radius: 5px;
            margin-top: 30px;
        }

    </style>
    <script>
        function showtxt() {
            var fartxt = document.getElementById('fileToUpload').value;
            document.getElementById('showtext').innerHTML = fartxt;
        }
    </script>
</head>
<body>
<div>
    <?php
    require 'header.php';
    ?>
    <table width="1227" border="0" align="center">
        <tr>
            <td width="113" rowspan="3">&nbsp;</td>
            <td width="561" rowspan="3">
                <div>
                    <div style="height: 500px; width: 560px">
                        <h1><b>สั่งทำสติกเกอร์</b></h1>
                        <form action="detail.php" method="post" enctype="multipart/form-data">
                            <!--                            <div class="form-group">-->
                            <!--                                <input type="text" class="form-control" name="name" id="name" placeholder="ชื่อสินค้า" required>-->
                            <!--                            </div>-->


                            <div class="form-group">
                                <label for="comment">ขนาดสติกเกอร์ / 1 รูป :</label>
                                <input type="number" class="form-control" name="price" id="wide"
                                       placeholder="ขนาดความกว้าง / เซนติเมตร" required pattern=""
                                       onkeyup="myFunction()">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="price" id="hight"
                                       placeholder="ขนาดความยาว / เซนติเมตร" required pattern="" onkeyup="myFunction()">
                            </div>


                            <p id="demo1" hidden></p>
                            <p id="demo2" hidden></p>
                            <p id="demo3" hidden></p>
                            <p id="demo4"></p>

                            <script>
                                function myFunction() {
                                    var wide = document.getElementById("wide").value;
                                    var hight = document.getElementById("hight").value;
                                    var meter = document.getElementById("meter").value;

                                    var total = wide * hight;
                                    var sum = 1000 / total;
                                    var total2 = meter * sum;
                                    document.getElementById("demo1").innerHTML = wide;
                                    document.getElementById("demo2").innerHTML = hight;
                                    document.getElementById("demo3").innerHTML = total;
                                    document.getElementById("demo4").innerHTML = "จำนวนรูปที่ได้ / 1 ตารางเมตรคือ : " + sum + " รูป";
                                    document.getElementById("demo5").innerHTML = meter;
                                    document.getElementById("demo6").innerHTML = "จำนวนรูปที่ได้ทั้งหมด โดยประมาณคือ : " + total2 + " รูป";

                                }
                            </script>


                            <div class="form-check"><b> ประเภทสติกเกอร์ : </b>&nbsp;
                                <input type="radio"
                                       name="types" <?php if (isset($types) && $types == "female") echo "checked"; ?>
                                       value="Letter" checked>
                                สะท้อนแสง 1000 บาท / 1 เมตร
                                &nbsp;
                                <input type="radio"
                                       name="types" <?php if (isset($types) && $types == "male") echo "checked"; ?>
                                       value="Picture">
                                ไม่สะท้อนแสง 800 บาท / 1 เมตร
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="comment">จำนวนตารางเมตร:</label>
                                <input type="number" class="form-control" name="meter" id="meter"
                                       placeholder="หน่วยตารางเมตร" maxlength="2" required pattern="[0-9]{2}"
                                       onkeyup="myFunction()">
                            </div>
                            <p id="demo5" hidden></p>
                            <p id="demo6"></p>

                            <br>
                            <div class="form-group">
                                <label for="comment">รายละเอียดเพิ่มเติม:</label>
                                <textarea class="form-control" rows="5" id="comment"></textarea>
                            </div>

                            <div class="fileinputs">
                                <input type="file" class="file" name="fileToUpload" id="fileToUpload"
                                       onchange="showtxt()"/>
                                <div class="fakefile">
                                    <input type="button" value="ค้นหาไฟล์"/>
                                    <span id="showtext"> ที่อยู่ไฟล์ </span></div>
                            </div>
                            <br>
                            <br>
                            <script>
                                var filename = document.getElementById('fileToUpload');
                                filename.onchange = function () {
                                    var files = filename.files[0];
                                    var reader = new FileReader();
                                    reader.readAsDataURL(files);
                                    reader.onload = function () {
                                        var result = reader.result;
                                        document.getElementById('showImage').src = result;
                                    };
                                };
                            </script>
                            <br>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="ถัดไป">
                            </div>
                        </form>
                    </div>
                </div>
            </td>
            <td width="34">&nbsp;</td>
            <td width="463" height="73">&nbsp;</td>
            <td width="34" rowspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td height="401">
                <img align="right" id="showImage" class="rounded-circle" alt="Cinque Terre" width="auto" height="auto">
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
    </table>
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
