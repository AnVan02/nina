<?php
	class Compare
	{
		private $d;

		function __construct($d)
		{
			$this->d = $d;
		}
		
		public function remove_compare($id=0)
		{
			if(isset($_SESSION['compare']) && $id >0)
			{
				$max = count($_SESSION['compare']);

				for($i=0;$i<$max;$i++)
				{
					if($id == $_SESSION['compare'][$i]['productid'])
					{
						unset($_SESSION['compare'][$i]);
						break;
					}
				}

				$_SESSION['compare'] = array_values($_SESSION['compare']);
			}
		}
		
		public function addtocompare($pid=0, $cate='' ,$q=1)
		{
			if($pid<1 or $q<1) return;
			
			$code = md5($pid.$cate);

			if(isset($_SESSION['compare']))
			{
				if(!$this->product_exists_compare($code,$q))
				{
					$max = count($_SESSION['compare']);
					$_SESSION['compare'][$max]['productid'] = $pid;
					$_SESSION['compare'][$max]['qty'] = $q;
					$_SESSION['compare'][$max]['cate'] = $cate;
					$_SESSION['compare'][$max]['code'] = $code;
				}
			}
			else
			{
				$_SESSION['compare'] = array();
				$_SESSION['compare'][0]['productid'] = $pid;
				$_SESSION['compare'][0]['qty'] = $q;
				$_SESSION['compare'][0]['cate'] = $cate;
				$_SESSION['compare'][0]['code'] = $code;
			}
		}
		
		private function product_exists_compare($code='', $q=1)
		{
			$flag = 0;
			
			if(isset($_SESSION['compare']) && $code != '')
			{
				$q = ($q>1)?$q:1;
				$max = count($_SESSION['compare']);

				for($i=0;$i<$max;$i++)
				{
					if($code == $_SESSION['compare'][$i]['code'])
					{
						$_SESSION['compare'][$i]['qty'] += $q;
						$flag = 1;
					}
				}
			}

			return $flag;
		}
	}
?>