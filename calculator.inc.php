<?php
function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}
//$HV = "h";
//$diameter = 96;
//$length = 368;
//$inc = 0.125;
$HV = $_POST['hv'];
$diameter = $_POST['diameter'];
$length = $_POST['length']; //length or height
$inc = $_POST['increment'];
global $radius;
//if(isset($radius)) {
$radius = $diameter / 2;
//} else {
//$radius = 0;
//}
$iVer = 0;


//New vars for rectangle calculator
$width = $_POST['width'];
$height = $_POST['height'];

function CalcFul($v) {
	global $HV, $radius, $diameter;
	if(($HV == 'h') || ($HV == 'v')) {
		$radius = $diameter / 2;
		console_log('calculating full capacity of v/h tank using '.$v.' (L) and '.$radius.' (r).');
		$AreaHalf = pi() * ($radius*$radius)/2;
		$half231 = $AreaHalf / 231;
		return round($half231*2*$v, 1);
	} else {
		console_log('calculating full capacity of r tank.');
		$total = $_POST['length'] * $_POST['width']*$_POST['height']/231;
		return round($total, 1);
	}
}


function CalcRect($iVer) {
	global $length, $width, $height;
	$Area = $_POST['length'] * $_POST['width']*$iVer;
	$div231 = $Area/231;
	return round($div231, 2);
}

function CalcFormula($iVer) {
	global $diameter, $length, $radius;

	if($iVer == 0) {
		return 0;

	} elseif($iVer < $diameter / 2)	{

		$h = $radius - $iVer;
		$b = sqrt(($radius * $radius) - ($h * $h));
		$Area = atan($b / $h) * $radius * $radius  - $h * sqrt(($radius * $radius) - ($h * $h));
		$div231 = $Area/231;
		return round(round($div231, 3) * $length, 2);

	} elseif ($iVer == $diameter/2)	{

		$AreaHalf = pi() * ($radius * $radius) / 2;
		$half231 = $AreaHalf / 231;
		return round(round($half231, 3) * $length, 2);

	} else {

		$AreaHalf = pi() * ($radius * $radius) / 2;
		$half231 = $AreaHalf / 231;

		$h = $iVer - $radius;
		$b = sqrt(($radius * $radius) - ($h * $h));
		$Area = atan($b / $h) * $radius * $radius - $h * sqrt(($radius * $radius) - ($h * $h));
		$div231 = $Area/231;
		$raw = round((($half231 - $div231) + $half231) * $length, 2);
		return round($raw, 3);
	}
}

if($HV == "h") {

	do{

		//Column1
		if($iVer <= (($diameter / 4) - $inc))	{
			$strcol1 = $strcol1 . number_format($iVer,3) . "<br>";
			//$strcol1a = $strcol1a . number_format(CalcFormula($iVer),2) . " |<br>";
			$strcol1a = $strcol1a . number_format(CalcFormula($iVer),2) . " |<br>";
		}

		//Column2
		if($iVer <= ((($diameter / 4)*2) - $inc) && ($iVer > (($diameter / 4) - $inc)))	{
			$strcol2 = $strcol2 . number_format($iVer,3) . "<br>";
			//$strcol2a = $strcol2a . number_format(CalcFormula($iVer),2) . " |<br>";
			$strcol2a = $strcol2a . number_format(CalcFormula($iVer),2) . " |<br>";
		}

		//Column3
		if($iVer <= ((($diameter / 4)*3) - $inc) && ($iVer > (($diameter / 4) *2 - $inc))) {
			$strcol3 = $strcol3 . number_format($iVer,3) . "<br>";
			$strcol3a = $strcol3a . number_format(CalcFormula($iVer),2) . " |<br>";
		}

		//Column4
		if($iVer <= ((($diameter / 4)*4) - $inc) && ($iVer > (($diameter / 4) *3 - $inc))) {
			$strcol4 = $strcol4 . number_format($iVer,3) . "<br>";
			$strcol4a = $strcol4a . number_format(CalcFormula($iVer),2) . " |<br>";
		}

		$iVer = $iVer + $inc;

	} while($iVer < $diameter);

}
if($HV == "v") {  // VERTICAL ROUND TANK

	do{

		//Column1
		if($iVer <= (($height / 4) - $inc))	{
			$strcol1 = $strcol1 . number_format($iVer,3) . "<br>";
			//$strcol1a = $strcol1a . number_format(CalcFormula($iVer),2) . " |<br>";
			$strcol1a = $strcol1a . number_format(CalcFormula($iVer),2) . " |<br>";
		}

		//Column2
		if($iVer <= ((($height / 4)*2) - $inc) && ($iVer > (($height / 4) - $inc)))	{
			$strcol2 = $strcol2 . number_format($iVer,3) . "<br>";
			//$strcol2a = $strcol2a . number_format(CalcFormula($iVer),2) . " |<br>";
			$strcol2a = $strcol2a . number_format(CalcFormula($iVer),2) . " |<br>";
		}

		//Column3
		if($iVer <= ((($height / 4)*3) - $inc) && ($iVer > (($height / 4) *2 - $inc))) {
			$strcol3 = $strcol3 . number_format($iVer,3) . "<br>";
			$strcol3a = $strcol3a . number_format(CalcFormula($iVer),2) . " |<br>";
		}

		//Column4
		if($iVer <= ((($height / 4)*4) - $inc) && ($iVer > (($height / 4) *3 - $inc))) {
			$strcol4 = $strcol4 . number_format($iVer,3) . "<br>";
			$strcol4a = $strcol4a . number_format(CalcFormula($iVer),2) . " |<br>";
		}

		$iVer = $iVer + $inc;

	} while($iVer < $diameter);

}
if($HV == "r") { // RECTANGLE TANK
	console_log('Calculating the volume of a retangle tank!');

	do{
		//console_log('starting loop and iVer is '.$iVer.', height is '.$height.' and incrementing at '.$inc.'.');
		//Column1
		if($iVer <= (($height / 4) - $inc))	{
			$strcol1 = $strcol1 . number_format($iVer,3) . "<br>";
			//console_log('calling CalcRect');
			$strcol1a = $strcol1a . number_format(CalcRect($iVer),2) . " |<br>";
		}

		//Column2
		if($iVer <= ((($height / 4)*2) - $inc) && ($iVer > (($height / 4) - $inc)))	{
			$strcol2 = $strcol2 . number_format($iVer,3) . "<br>";
			$strcol2a = $strcol2a . number_format(CalcRect($iVer),2) . " |<br>";
		}

		//Column3
		if($iVer <= ((($height / 4)*3) - $inc) && ($iVer > (($height / 4) *2 - $inc))) {
			$strcol3 = $strcol3 . number_format($iVer,3) . "<br>";
			$strcol3a = $strcol3a . number_format(CalcRect($iVer),2) . " |<br>";
		}

		//Column4
		if($iVer <= ((($height / 4)*4) - $inc) && ($iVer > (($height / 4) *3 - $inc))) {
			$strcol4 = $strcol4 . number_format($iVer,3) . "<br>";
			$strcol4a = $strcol4a . number_format(CalcRect($iVer),2) . " |<br>";
		}

		$iVer = $iVer + $inc;

	} while($iVer < $height);

} else { //$HV == "v"

	function verticaltank($a) {
		global $diameter, $length, $inc;
		$rad = ($diameter / 2) / 12;

		$cubic_feet = pi() * ($rad * $rad) * $a;

		$gallons = $cubic_feet * 7.47;

		return $gallons / 12;
	}

	do{

		//Column1
		if($iVer <= (($length / 4) - $inc)) {
			$strcol1 = $strcol1 . number_format($iVer,3) . "<br>";
			$strcol1a = $strcol1a . number_format(verticaltank($iVer),2) . " |<br>";

		}

		//Column2
		if($iVer <= ((($length / 4)*2) - $inc) && ($iVer > (($length / 4) - $inc))) {
			$strcol2 = $strcol2 . number_format($iVer,3) . "<br>";
			$strcol2a = $strcol2a . number_format(verticaltank($iVer),2) . " |<br>";
		}

		//Column3
		if($iVer <= ((($length / 4)*3) - $inc) && ($iVer > (($length / 4) *2 - $inc))) {
			$strcol3 = $strcol3 . number_format($iVer,3) . "<br>";
			$strcol3a = $strcol3a . number_format(verticaltank($iVer),2) . " |<br>";
		}

		//Column4
		if($iVer <= ((($length / 4)*4) - $inc) && ($iVer > (($length / 4) *3 - $inc))) {
			$strcol4 = $strcol4 . number_format($iVer,3) . "<br>";
			$strcol4a = $strcol4a . number_format(verticaltank($iVer),2) . " |<br>";
		}

		$iVer = $iVer + $inc;

	} while($iVer < $length);

}


?>
