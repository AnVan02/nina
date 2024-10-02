<?php
	include "ajax_config.php";
	$id=$_GET['id'];
	if($id > 0)
	{
		$compare->remove_compare($id);
		$max = (isset($_SESSION['compare'])) ? count($_SESSION['compare']) : 0;
		$data = array('max' => $max);
		echo json_encode($data);
	}
?>