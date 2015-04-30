<?php
#############################################################################################################################
///*
function generatePassword($length=6,$level=2) {
	list($usec, $sec) = explode(' ', microtime());
	srand((float) $sec + ((float) $usec * 100000));

	$validchars[1] = "0123456789abcdfghjkmnpqrstvwxyz";
	$validchars[2] = "0123456789abcdfghjkmnpqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$validchars[3] = "0123456789_!@#$%&*()-=+/abcdfghjkmnpqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_!@#$%&*()-=+/";

	$password  = "";
	$counter   = 0;

	while ($counter < $length) {
		$actChar = substr($validchars[$level], rand(0, strlen($validchars[$level])-1), 1);

		// All character must be different
		if (!strstr($password, $actChar)) {
		    $password .= $actChar;
		    $counter++;
		}
	}
	return $password;
};
//*/
#############################################################################################################################

?>