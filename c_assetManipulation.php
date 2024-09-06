<?php
include "koneksiMVC.php";
$mysqli = new koneksiMVC();
$e = $_POST['e'];
if (empty($e)) {
    $rs = $mysqli->mysqli->query("INSERT INTO asset VALUES ('".$_POST['asset_id']."', '".$_POST['asset_name']."', '".$_POST['asset_price']."', '".$_POST['asset_lifetime']."', '".$_POST['asset_price']."', '".$_POST['asset_settle_date']."', '".$_POST['asset_lifetime']."')");
    echo "OK";
}
else
    $rs = $mysqli->mysqli->query("UPDATE asset SET asset_name = '$_POST[asset_name]', asset_price = '$_POST[asset_price]', asset_lifetime = '$_POST[asset_lifetime]', asset_settle_date = '$_POST[asset_settle_date]' WHERE asset_id = '$_POST[asset_id]'");
    header("location:index.php");
?>
