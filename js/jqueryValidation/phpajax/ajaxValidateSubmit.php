<?php

/* RECEIVE VALUE */
$addressValue= isset($_GET['type']);

	/* RETURN VALUE */
	$arrayToJs = array();
	$arrayToJs[0] = array();
	$arrayToJs[1] = array();


if ($addressValue == "street_address"){		// validate??
	$arrayToJs[0][0] = 'address';
	$arrayToJs[0][1] = true;			// RETURN TRUE
	$arrayToJs[0][2] = "This address is valid";
			// RETURN ARRAY WITH success
}else{
	$arrayToJs[0][0] = 'address';
	$arrayToJs[0][1] = false;
	$arrayToJs[0][2] = "This address is not valid";
}
	echo json_encode($arrayToJs);
	
?>

