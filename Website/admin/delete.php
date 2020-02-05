<?php 
include('../server.php');

$id_del = $_GET['delete'];

$del = "DELETE FROM users WHERE id=$id_del";
$del2 = "DELETE FROM data WHERE id=$id_del";
$del3 = "DELETE FROM game WHERE id=$id_del";

$qry_del1= mysqli_query($db, $del);
$qry_del2= mysqli_query($db, $del2);
$qry_del3= mysqli_query($db, $del3);

if(($qry_del1)&&($qry_del2)&&($qry_del3))
{
    header("location: databaze.php");
}

?>