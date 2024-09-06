<?php
class m_showAsset {
    private $asset_id;
    private $asset_name;
	private $asset_price;
	private $asset_lifetime;
	private $asset_settle_date;
	private $asset_value;
    public $hasil = array();
    private $mysqli;

    public function __construct()
    {
        $this->mysqli =  new mysqli("localhost", "root", "", "asset_depreciation_test");
    }
    public function setAsset($asset_id, $asset_name, $asset_price, $asset_lifetime, $asset_settle_date, $asset_value){
        $this->asset_id = $asset_id;
        $this->asset_name = $asset_name;
        $this->asset_price = $asset_price;
		$this->asset_lifetime = $asset_lifetime;
		$this->asset_settle_date = $asset_settle_date;
		$this->asset_value = $asset_value;
        $rs = $this->mysqli->query("INSERT INTO asset_depreciation_test VALUES ('$this->asset_id', '$this->asset_name', '$this->asset_price', '$this->asset_lifetime', '$this->asset_settle_date', '$this->asset_value') ");
    }
    
    public function getAllAsset(){
		$this->mysqli->query("UPDATE asset SET asset_value = asset_price - asset_price * ((MONTH(NOW()) - MONTH(asset_settle_date)) + (12 * (YEAR(NOW()) -YEAR(asset_settle_date)))) / asset_lifetime");
        $this->mysqli->query("UPDATE asset SET asset_remaining_lifetime = asset_lifetime - ((MONTH(NOW()) - MONTH(asset_settle_date)) + (12 * (YEAR(NOW()) -YEAR(asset_settle_date))))");
		$rs = $this->mysqli->query("SELECT * FROM asset");
        $rows = array();
        while($row = $rs->fetch_assoc()) {
            $rows[] = $row;
        }
        $this->hasil[] = $rows;
        return $this->hasil;
    }
	
	public function getPredictedValue($month_value, $year_value){
		$this->mysqli->query("UPDATE asset SET asset_value = asset_price - asset_price * (($month_value - MONTH(asset_settle_date)) + (12 * ($year_value -YEAR(asset_settle_date)))) / asset_lifetime");
        $this->mysqli->query("UPDATE asset SET asset_remaining_lifetime = asset_lifetime - (($month_value - MONTH(asset_settle_date)) + (12 * ($year_value -YEAR(asset_settle_date))))");
		$rs = $this->mysqli->query("SELECT * FROM asset");
        $rows = array();
        while($row = $rs->fetch_assoc()) {
            $rows[] = $row;
        }
        $this->hasil[] = $rows;
        return $this->hasil;
	}
}
?>
