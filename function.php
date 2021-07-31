<?php
	function getStringBetween($teks, $before, $after){
		$teks = ' ' . $teks;
		$thiss = strpos($teks, $before);
		if($thiss == 0 ) return '';
		$thiss += strlen($before);
		$long = strpos($teks, $after, $thiss) - $thiss;
		return substr($teks, $thiss, $long);
	}
?>