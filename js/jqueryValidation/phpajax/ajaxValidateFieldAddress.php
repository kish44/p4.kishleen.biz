<?php

/* RECEIVE VALUE */
$validateValue=$_GET['fieldValue'];
$validateId=$_GET['fieldId'];


$validateError= "Google could not locate this address";
$validateSuccess= "Google found your address!";



	/* RETURN VALUE */
	$arrayToJs = array();
	$arrayToJs[0] = $validateId;

if($validateValue =="street_address"){		// validate??
	$arrayToJs[1] = true;			// RETURN TRUE
	echo json_encode($arrayToJs);			// RETURN ARRAY WITH success
}else{
	for($x=0;$x<1000000;$x++){
		if($x == 990000){
			$arrayToJs[1] = false;
			echo json_encode($arrayToJs);		// RETURN ARRAY WITH ERROR
		}
	}
	
}

?>