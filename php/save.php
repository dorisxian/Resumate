<?php
	// start making xml file, this will just basically paste the post into an xml
	// the semantic readability of this file will not be very high
	$xml = '<?xml version="1.0" ?>' . "\n" . '<info>' . "\n";
	foreach($_POST as $key=>$value) {
		if( is_array( $value ) ) {
			foreach($value as $subvalue) {
				$xml .= "\t" . '<'. $key . '>' . $subvalue . '</' . $key . '>' . "\n";
			}
		} else {
			$xml .= "\t" . '<'. $key . '>' . $value . '</' . $key . '>' . "\n";
		}	
	}
	xml .= '</info>';
	file_put_contents('xml/'.$xmlid.'.xml', $xml);
?>