<?php
	class Cart
	{
		private $d;

		function __construct($d)
		{
			$this->d = $d;
		}

		public function get_product_info($pid=0)
		{
			$row = null;
			if($pid)
			{
				$row = $this->d->rawQueryOne("select * from #_product where id = ? limit 0,1",array($pid));
			}
			return $row;
		}
		
		public function get_product_mau($mau=0)
		{
			$str = '';
			if($mau)
			{
				$row = $this->d->rawQueryOne("select tenvi from #_product_mau where id = ? limit 0,1",array($mau));
				$str = $row['tenvi'];
			}
			return $str;
		}
		
		public function get_product_size($size=0)
		{
			$str = '';
			if($size)
			{
				$row = $this->d->rawQueryOne("select tenvi from #_product_size where id = ? limit 0,1",array($size));
				$str = $row['tenvi'];
			}
			return $str;
		}


		public function remove_product($code='')
		{
			if(isset($_SESSION['cart']) && $code != '')
			{
				$max = count($_SESSION['cart']);

				for($i=0;$i<$max;$i++)
				{
					if($code == $_SESSION['cart'][$i]['code'])
					{
						unset($_SESSION['cart'][$i]);
						break;
					}
				}

				$_SESSION['cart'] = array_values($_SESSION['cart']);
			}
		}

		public function maxnumber($pid=0)
		{
			
			if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0)
			{
				$row = $this->d->rawQueryOne("select * from #_product where id = ? limit 0,1",array($pid));
				$max = count($_SESSION['cart']);
				for($i=0;$i<$max;$i++)
				{
					if($_SESSION['cart'][$i]['productid']==$row['id']){
						$numb=$row['soluong']-$_SESSION['cart'][$i]['qty'];
					}else{
						$numb=1;
					}
				}
			}else{
				$numb=10;
			}
			return $numb;
		}

		public function shownumber($pid=0)
		{
			
			if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0)
			{
				$row = $this->d->rawQueryOne("select * from #_product where id = ? limit 0,1",array($pid));
				$max = count($_SESSION['cart']);
				for($i=0;$i<$max;$i++)
				{
					if($_SESSION['cart'][$i]['productid']==$row['id']){
						if($_SESSION['cart'][$i]['qty']>=$row['soluong']){
							$val=0;
						}else{
							$val=1;
						}
					}else{
						$val=1;
					}
				}
			}else{
				$val=1;
			}
			return $val;
		}


		public function get_provisional_total($pid=0,$soluong=0)
		{
			global $login_member;
			$proinfo = $this->get_product_info($pid);

			if(isset($_SESSION[$login_member]) && $proinfo['giasi']>0){
				$sumprovisi=$proinfo['giasi']*$soluong;
			}elseif($proinfo['giamoi']>0){
				$sumprovisi=$proinfo['giamoi']*$soluong;
			}else{
				$sumprovisi=$proinfo['gia']*$soluong;
			}

			return $sumprovisi;
		}

		public function total_get_price($pid=0,$soluong=0)
		{
			global $login_member, $cart, $rep_price1;
			$proinfo = $this->get_product_info($pid);
			$row = $this->d->rawQuery("select soluongtu,soluongden,giagiam,phantram,tuychon from #_gallery where id_photo = ? and com = ? and type = ? and kind = ? and val = ? order by stt,id desc",array($pid,'product','san-pham','man','so-luong'));
			$total_order=$this->get_provisional_total($pid,$soluong);
			if(isset($_SESSION[$login_member]) && count($row)>0){
				foreach ($row as $k => $val) {
					if($soluong>=$val['soluongtu'] && $soluong<=$val['soluongden']){
						if($val['tuychon']==1){
							$rep_price1=$total_order-$val['giagiam'];
						}else{
							$price=($total_order*$val['phantram'])/100;
							$rep_price1=$total_order-$price;
						}
						break;
					}elseif($soluong>=$val['soluongtu'] && $val['soluongden']==0){
						if($val['tuychon']==1){
							$rep_price1=$total_order-$val['giagiam'];
						}else{
							$price=($total_order*$val['phantram'])/100;
							$rep_price1=$total_order-$price;
						}
						break;
					}
				}
				
			}
			return $rep_price1;
		}


		public function total_order_end($pid=0,$soluong=0)
		{
			global $login_member, $cart, $rep_price;
			$proinfo = $this->get_product_info($pid);
			$row = $this->d->rawQuery("select soluongtu,soluongden,giagiam,phantram,tuychon from #_gallery where id_photo = ? and com = ? and type = ? and kind = ? and val = ? order by stt,id desc",array($pid,'product','san-pham','man','so-luong'));
			$total_order=$this->get_provisional_total($pid,$soluong);
			if(isset($_SESSION[$login_member]) && count($row)>0){
				foreach ($row as $k => $val) {
					if($soluong>=$val['soluongtu'] && $soluong<=$val['soluongden']){
						if($val['tuychon']==1){
							$rep_price=$total_order-$val['giagiam'];
						}else{
							$price=($total_order*$val['phantram'])/100;
							$rep_price=$total_order-$price;
						}
						break;
					}elseif($soluong>=$val['soluongtu'] && $val['soluongden']==0){
						if($val['tuychon']==1){
							$rep_price=$total_order-$val['giagiam'];
						}else{
							$price=($total_order*$val['phantram'])/100;
							echo $rep_price=$total_order-$price;
						}
						break;
					}else{
						$rep_price=$total_order;
					}
				}
				
			}else{
				$rep_price=$total_order;
			}

			return $rep_price;
			
		}

		public function get_sale_price($pid=0,$soluong=0)
		{
			global $login_member, $cart, $rep_sale, $func;
			$proinfo = $this->get_product_info($pid);
			$row = $this->d->rawQuery("select soluongtu,soluongden,giagiam,phantram,tuychon from #_gallery where id_photo = ? and com = ? and type = ? and kind = ? and val = ? order by stt,id desc",array($pid,'product','san-pham','man','so-luong'));
			$total_order=$cart->get_provisional_total($pid,$soluong);
			if(isset($_SESSION[$login_member]) && count($row)>0){
				foreach ($row as $k => $val) {
					if($soluong>=$val['soluongtu'] && $soluong<=$val['soluongden']){
						if($val['tuychon']==1){
							$rep_sale='-'.$func->format_money($val['giagiam']);
						}else{
							$rep_sale='-'.$val['phantram'].'%';
						}
						break;
					}elseif($soluong>=$val['soluongtu'] && $val['soluongden']==0){
						if($val['tuychon']==1){
							$rep_sale='-'.$func->format_money($val['giagiam']);
						}else{
							$rep_sale='-'.$val['phantram'].'%';
						}
						break;
					}
				}
				return $rep_sale;
			}
			
		}
		
		
		public function get_order_total()
		{
			global $login_member;
			$sum = 0;

			if(isset($_SESSION['cart']))
			{
				$max = count($_SESSION['cart']);

				for($i=0;$i<$max;$i++)
				{
					$pid = $_SESSION['cart'][$i]['productid'];
					$q = $_SESSION['cart'][$i]['qty'];
					$proinfo = $this->get_product_info($pid);
					if(isset($_SESSION[$login_member]) && $proinfo['giasi']>0){
						$price = $this->total_order_end($pid,$q);
					}elseif($proinfo['giamoi']){
						$price = $proinfo['giamoi']*$q;
					}else {
						$price = $proinfo['gia']*$q;
					}
					$sum += $price;
				}
			}

			return $sum;
		}
		
		public function addtocart($q=1, $pid=0, $mau=0, $size=0)
		{
			if($pid<1 or $q<1) return;
			
			$code = md5($pid.$mau.$size);

			if(isset($_SESSION['cart']))
			{
				if(!$this->product_exists($code,$q))
				{
					$max = count($_SESSION['cart']);
					$_SESSION['cart'][$max]['productid'] = $pid;
					$_SESSION['cart'][$max]['qty'] = $q;
					$_SESSION['cart'][$max]['mau'] = $mau;
					$_SESSION['cart'][$max]['size'] = $size;
					$_SESSION['cart'][$max]['code'] = $code;
				}
			}
			else
			{
				$_SESSION['cart'] = array();
				$_SESSION['cart'][0]['productid'] = $pid;
				$_SESSION['cart'][0]['qty'] = $q;
				$_SESSION['cart'][0]['mau'] = $mau;
				$_SESSION['cart'][0]['size'] = $size;
				$_SESSION['cart'][0]['code'] = $code;
			}
		}
		
		private function product_exists($code='', $q=1)
		{
			$flag = 0;
			
			if(isset($_SESSION['cart']) && $code != '')
			{
				$q = ($q>1)?$q:1;
				$max = count($_SESSION['cart']);

				for($i=0;$i<$max;$i++)
				{
					if($code == $_SESSION['cart'][$i]['code'])
					{
						$_SESSION['cart'][$i]['qty'] += $q;
						$flag = 1;
					}
				}
			}

			return $flag;
		}
	}
?>