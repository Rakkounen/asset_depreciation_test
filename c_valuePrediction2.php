<?php
include_once("m_showAsset.php");
class c_valuePrediction {
public $model;
$year = $post['year']
$month = $post['month']

	public function __construct(){
	$this->model = new m_showAsset();
	}
	public function invoke($month, $year){
		$asset_depreciation_test = $this->model->getPredictedValue($month, $year);
		Include 'v_valuePrediction.php';
    }
}
?>
