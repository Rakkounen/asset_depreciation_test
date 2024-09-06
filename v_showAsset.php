<?php
include "koneksiMVC.php";
$koneksi = new koneksiMVC();
$rs = $koneksi->mysqli->query("SELECT * FROM asset");
?>
<html>
<head></head>
<body>
    <h2> Daftar Asset </h2>
    <table border="1">
    <tr align="center">
    <td>Nomor Asset</td>
    <td>Nama Asset</td>
    <td>Harga Asset</td>
	<td>Asset Lifetime</td>
	<td>Book Value</td>
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
    <form action="v_assetManipulation.php" method="POST">
        <input type="submit" name="add" value="Tambah Asset">
    </form>
	    </form>
    <form action="logout.php" method="post" name="logout">
        <input type="submit" id="logout" name="button" value="Logout" />
    </form>
    <form method="POST" action="v_valuePrediction.php">
	Select Month :
	<select id="month" name="month">  
		<option value="1">JAN</option>  
		<option value="2">FEB</option>  
		<option value="3">MAR</option>  
		<option value="4">APR</option>  
		<option value="5">MAY</option>  
		<option value="6">JUN</option>  
		<option value="7">JUL</option>  
		<option value="8">AUG</option> 
		<option value="9">SEP</option>
		<option value="10">OKT</option>
		<option value="11">NOV</option>
		<option value="12">DES</option>
	<select>
	Select Year :  
	<select id="year" name="year">
		<option value="2024">2024</option>  
		<option value="2025">2025</option>  
		<option value="2026">2026</option>  
	<select>
		<br><input type="submit" name="submit" value="Submit" /></td>
		
    </form>
</body>
</html>
<script>
    function confirmHapus() {
        var x = confirm("Anda yakin ingin menghapus program kerja tersebut?");
        if (x)
        return true;
        else
        return false;
    }
</script>
