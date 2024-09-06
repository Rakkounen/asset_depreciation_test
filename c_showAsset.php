<?php
include_once("m_showAsset.php");
class c_showAsset {
public $model;
	public function __construct(){
	$this->model = new m_showAsset();
	}
	public function invoke(){
		$asset_depreciation_test = $this->model->getAllAsset();
		Include 'v_showAsset.php';
    }
	public function invokePrediction(){
		$asset_depreciation_prediction_test = $this->model->getPredictedValue();
		Include 'v_showAsset.php';
    }
    public function addAsset($asset_id, $asset_name, $asset_price, $asset_lifetime, $asset_settle_date, $asset_value){
        $this->model = new m_showAsset();
        $assetid = $asset_id;
        $assetname = $asset_name;
        $assetprice = $asset_price;
		$assetlifetime = $asset_lifetime;
		$assetsettle_date = $asset_settle_date;
		$assetvalue = $asset_value;
        $tambahProker = $this->model->setPogramKerja($assetid, $assetname, $assetprice, $assetlifetime, $assetsettledate, $assetvalue);
    }
}
?>
