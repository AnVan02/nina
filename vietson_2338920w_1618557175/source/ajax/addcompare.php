<?php
	include "ajax_config.php";
	$id=$_GET['id'];
	$cate=$_GET['cate'];
	if($id > 0)
	{
		$compare->addtocompare($id,$cate);
		$max = (isset($_SESSION['compare'])) ? count($_SESSION['compare']) : 0;
		$data = array('max' => $max);
		echo json_encode($data);
	}
?>