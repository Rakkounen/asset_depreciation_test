<?php
include "koneksiMVC.php";
$mysqli = new koneksiMVC();
$rs = $mysqli->mysqli->query("DELETE FROM asset WHERE asset_id='$_GET[asset_id]'");
header("location:index.php");
?>
