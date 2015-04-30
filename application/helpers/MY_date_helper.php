<?php
//the name of the file is indicated to the extend of the native date helper
#############################################################################################################################
//date format
///*
function date_db($date) {
	return mdate("%Y-%m-%d", $date);
}

function datetime_db($date) {
	return mdate("%Y-%m-%d %H:%i:%s", $date);
}

function date_view($date) {
	return mdate("%D, %j %M %Y", mysql_to_unix($date));
}

function datetime_view($date) {
	return mdate("%D, %j %M %Y %g:%i %a", mysql_to_unix($date));
}
//*/
#############################################################################################################################

?>