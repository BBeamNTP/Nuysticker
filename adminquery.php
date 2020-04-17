<?php
session_start();
if ((!isset($_SESSION['email']) && ($_SESSION['status'] != "Member")) ) {
    header('location: login.php');
}
if (($_SESSION['status'] != "Member")) {
    header('location: admin.php');
}
$aDoor = $_POST['formDoor'];
if(empty($aDoor))
{
    echo("You didn't select any buildings.");
}
else
{
    $N = count($aDoor);

    echo("You selected $N door(s): ");
    for($i=0; $i < $N; $i++)
    {
        echo($aDoor[$i] . " ");
    }
}
?>