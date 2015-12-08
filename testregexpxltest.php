<?php
include('php/converter.class.php');

$str = "Pxl-Test(TOTO,10)\n";

echo 'Avant: '.$str.'<br />';
preg_match_all("#Pxl-Test\([^,]+\,[^,:\)\s→]+#i", $str, $matches);
/*echo $matches[0][0];
echo '<pre>'; 
print_r($matches); 
echo '</pre>';
*/

echo '<br />What we must convert: <br /><ul>';

for($i=0;$i<count($matches[0]);$i++){

	$TestString = new Converter($matches[0][$i]."\n");
	//echo '<li><b>'.$matches[0][$i].'</b> -->Taille =  '.strlen($matches[0][$i]).' --> '.$TestString->ColorToMono().'</li><br />';
	//echo 'Portion du code à modifier: '.substr($str,stripos($str, $matches[0][$i]),1+strlen($matches[0][$i]));

	$str = str_replace($matches[0][$i], $TestString->ColorToMono(), $str);

	

	//echo '<br />FINAL='.preg_replace("#Pxl-Test\([^,]+\,[^,:\)\s→]+#i", $TestString->ColorToMono(),$str,1);


}
	echo ''.$str;
?>

