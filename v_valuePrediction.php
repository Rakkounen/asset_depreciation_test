<?php
include "koneksiMVC.php";
$koneksi = new koneksiMVC();
$koneksi->mysqli->query("UPDATE asset SET asset_value = asset_price - asset_price * (('$_POST[month]'- MONTH(asset_settle_date)) + (12 * ('$_POST[year]' -YEAR(asset_settle_date)))) / asset_lifetime");
$koneksi->mysqli->query("UPDATE asset SET asset_remaining_lifetime = asset_lifetime - (('$_POST[month]' - MONTH(asset_settle_date)) + (12 * ('$_POST[year]' -YEAR(asset_settle_date))))");
$rs = $koneksi->mysqli->query("SELECT * FROM asset");
?>
<html>
<head></head>
<body>
    <h2> Prediksi Nilai Asset </h2>
    <table border="1">
    <tr align="center">
    <td>Nomor Asset</td>
    <td>Nama Asset</td>
    <td>Harga Asset</td>
	<td>Asset Lifetime</td>
	<td>Value</td>
	<td>Settle Date</td>
	<td>Remaining Lifetime</td>
    <td colspan="2">Update</td>
     <?php
	$value_sum=0;
	$price_sum=0;
    while ($asset = mysqli_fetch_array($rs)){
		if ($asset['asset_price']>=$asset['asset_value']){
			echo "<tr><td>$asset[asset_id]</td>
			<td>$asset[asset_name]</td>
			<td>$asset[asset_price]</td>
			<td>$asset[asset_lifetime] Bulan</td>
			<td>$asset[asset_value]</td>
			<td>$asset[asset_settle_date]</td>
			<td>$asset[asset_remaining_lifetime] Bulan</td>
			<td><a href=\"v_assetManipulation.php?asset_id=$asset[asset_id]&e=1\">Edit</a></td>
			<td><a href=\"delete.php?asset_id=$asset[asset_id]\" onclick = 'return confirmHapus()'>Delete</a>
			</td></tr>";
			$value_sum+=$asset['asset_value'];
			$price_sum+=$asset['asset_price'];
		}
	}
	echo '</table>';
	echo "<br>Total Nilai Aset saat ini : ", $value_sum;
	echo "<br>Total Nilai depresiasi Aset saat ini : ", $price_sum-$value_sum;
    ?>
    <br>
    <form action="index.php" method="POST">
        <input type="submit" name="add" value="Kembali">
    </form>
</body>
</html>