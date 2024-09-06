<?php
include_once("m_showAsset.php");
class c_valuePrediction {
public $model;
$year_value = $_POST[year];
$month_value = $_POST[month];

	public function __construct(){
	$this->model = new m_showAsset();
	}
	public function invoke($month_value, $year_value){
		$asset_depreciation_test = $this->model->getPredictedValue($month_value, $year_value);
		Include 'v_valuePrediction.php';
    }
}
?>
