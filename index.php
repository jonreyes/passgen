<?php
function rand_char($string){
	$i = random_int(0,strlen($string)-1);
	return $string[$i];
}

function rand_string($length, $char_set){
	$output = '';
	for($i=0; $i < $length; $i++){
		$output .= rand_char($char_set);
	}	
	return $output;
}

function generate_password($length){
	$low = implode(range('a','z'));
	$up = implode(range('A','Z'));
	$num = implode(range('0','9'));
	$sym = '$*?!-';
	
	$use_low = true;
	$use_up = true;
	$use_num = true;
	$use_sym = true;

	$chars = '';

	if($use_low === true){$chars .= $low;}
	if($use_up === true){$chars .= $up;}	
	if($use_num === true){$chars .= $num;}
	if($use_sym === true){$chars .= $sym;}

	return rand_string($length,$chars);
}

echo generate_password(16);
?>
