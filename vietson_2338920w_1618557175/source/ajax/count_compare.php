<?php
	include "ajax_config.php";
	$max = (isset($_SESSION['compare'])) ? count($_SESSION['compare']) : 0;
	
	if(isset($_SESSION['compare']) && count($_SESSION['compare'])>0){
		$arr='';
		for ($i=0; $i < $max; $i++) { 
			$arr[]=$_SESSION['compare'][$i]['productid'];
		}
		$productid=implode(",", $arr);
		$cate=$_SESSION['compare'][0]['cate'];
	}else{
		$productid='';
		$cate='';
	}
	//echo $max;
	$data = array('countnum' => $max, 'productid' => $productid, 'cate' => $cate);
	echo json_encode($data);

?>