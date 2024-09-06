<?php
include "koneksiMVC.php";
$koneksi = new koneksiMVC();
$rs = $koneksi->mysqli->query("SELECT * FROM asset");
// $rs = $mysqli->query("SELECT * FROM asset");
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
	<td>Value</td>
	<td>Settle Date</td>
	<td>Remaining Lifetime</td>
    <td colspan="2">Update</td>
    </tr>
    <?php
	$value_sum=0;
	$price_sum=0;
    while ($asset = mysqli_fetch_array($rs)){
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
