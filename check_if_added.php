<?php

function check_if_added_to_cart($item_id){
    $con=mysqli_connect("g8r9w9tmspbwmsyo.cbetxkdyhwsb.us-east-1.rds.amazonaws.com","ra4djws574rbluuq","b1ks82sowy27q7nr","nli1p003te1rfojq") or die(mysqli_error($con));

    $user_id=$_SESSION['id'];
        $product_check_query="select * from users_items where item_id='$item_id' and user_id='$user_id' and status='Added to cart'";
    $product_check_result = mysqli_query($con, $product_check_query) or die(mysqli_error($con));

    $num_rows=mysqli_num_rows($product_check_result);
        if($num_rows>=1)return 1;
        return 0;
    }
?>