<?php
	$lower = implode(range('a','z'));
	$upper = implode(range('A','Z'));
	$num = implode(range('0','9'));
	$sym = '$*?!-';
	$chars = $lower.$upper.$num.$sym;

	echo $chars;
	echo '<br>';
?>
