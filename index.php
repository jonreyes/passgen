<?php
function random_char($string) {
  $i = mt_rand(0, strlen($string)-1);
  return $string[$i];
}
function random_string($length, $char_set) {
  $output = '';
  for($i=0; $i < $length; $i++) {
    $output .= random_char($char_set); 
  }
  return $output;
}
function generate_password($options) {
  // define character sets
  $lower = implode(range('a','z'));
  $upper = implode(range('A','Z'));
  $numbers = implode(range('0','9'));
  $symbols = '$*?!-';
  
  // extract configuration flags into variables
  $use_lower = isset($options['lower']) ? $options['lower'] : '0';
  $use_upper = isset($options['upper']) ? $options['upper'] : '0';;
  $use_numbers = isset($options['numbers']) ? $options['numbers'] : '0';;
  $use_symbols = isset($options['symbols']) ? $options['symbols'] : '0';;
  $chars = '';
  if($use_lower == '1') { $chars .= $lower; }
  if($use_upper == '1') { $chars .= $upper; }
  if($use_numbers == '1') { $chars .= $numbers; }
  if($use_symbols == '1') { $chars .= $symbols; }
  
  $length = isset($options['length']) ? $options['length'] : 8;
  
  return random_string($length, $chars);
}
$options = array(
  'length' => $_GET['length'],
  'lower' => $_GET['lower'],
  'upper' => $_GET['upper'],
  'numbers' => $_GET['numbers'],
  'symbols' => $_GET['symbols']
);
$password = generate_password($options);
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Password Generator</title>
    <style>
    html{
		text-align:center;
		background:cornflowerblue;
	}
	</style>
  </head>
  <body>

    <p><b>Password Generator</b></p>
    <p><?php echo $password; ?></p>
    <form action="" method="get">
   	  <p>Generate a password with the following options.</p>
      Length: <input type="text" name="length" value="<?php if(isset($_GET['length'])) { echo $_GET['length']; } ?>" /><br>
      <input type="checkbox" name="lower" value="1" <?php if($_GET['lower'] == 1) { echo 'checked'; } ?> /> Lowercase
      <input type="checkbox" name="numbers" value="1" <?php if($_GET['numbers'] == 1) { echo 'checked'; } ?> /> Numbers<br>
      <input type="checkbox" name="upper" value="1" <?php if($_GET['upper'] == 1) { echo 'checked'; } ?> /> Uppercase
      <input type="checkbox" name="symbols" value="1" <?php if($_GET['symbols'] == 1) { echo 'checked'; } ?> /> Symbols<br>
      <br>
      <input type="submit" value="Submit" />
      <br>
    </form>
    <br>
    

  </body>
</html>
