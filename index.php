<?php
	$lower = implode(range('a','z'));
	$upper = implode(range('A','Z'));
	$num = implode(range('0','9'));
	$sym = '$*?!-';
	$chars = $lower.$upper.$num.$sym;
	
	function rand_char($string){
		$i = random_int(0,strlen($string)-1);
		return $string[$i];
	}
	
	echo rand_char($chars);
?>
