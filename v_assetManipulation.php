<?php
include "koneksiMVC.php";
$mysqli = new koneksiMVC();
if (empty($_GET['e']))
    $title = "Asset Addition";
else {
    $e = $_GET['e'];
    $title = "Edit Asset";
    $rs = $mysqli->mysqli->query("SELECT * FROM asset WHERE asset_id='$_GET[asset_id]'");
    $data = mysqli_fetch_array($rs);
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <title><?php echo $title ?></title>
</head>
    <body>
    <h1><?php echo $title ?></h1>
    <form method="POST" action="c_assetManipulation.php">
        <input type="hidden" name="e" value="<?php if (isset
        ($data)) echo $data['asset_id'];?>"/>
        <table border="1">
            <tr>
            <td>Nomor Asset</td>
            <td><input name="asset_id" type="text" value="<?php if (isset($data['asset_id'])) echo $data['asset_id'];?>"/></td>
            </tr>
            <tr>
            <td>Nama Asset</td>
            <td><input name="asset_name" type="text" value="<?php if (isset($data)) echo $data['asset_name'] ?>"/></td>
            </tr>
            <tr>
            <td>Harga Asset</td>
            <td><input name="asset_price" type="text" value="<?php if (isset($data)) echo $data['asset_price'] ?>"/></td>
            </tr>
			<td>Asset Lifetime</td>
            <td><input name="asset_lifetime" type="text" value="<?php if (isset($data)) echo $data['asset_lifetime'] ?>"/></td>
            </tr>
            <tr>
            <td>Asset Settle Date</td>
            <td><input name="asset_settle_date" type="text" value="<?php if (isset($data)) echo $data['asset_settle_date'] ?>"/></td>
            </tr>
        </table>
        <br><input type="submit" name="submit" value="Submit" /></td>
    </form>
    <form method="POST" action="v_showAsset.php">
        <input type="submit" name="submit" value="Batal" /></td>
    </form>
</body>
</html>
