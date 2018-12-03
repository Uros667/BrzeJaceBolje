<?php
$db['db_host']="localhost";
$db['db_user']="root";
$db['db_pass']="";
$db['db_name']="uros";

foreach ($db as $key => $value) {
	
define(strtoupper($key), $value);	


}





$konekcija = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME );



if (mysqli_connect_errno()) {
    printf(": %s\n", mysqli_connect_error());
    exit();
}

mysqli_character_set_name($konekcija);

/* change character set to utf8 */
if (!mysqli_set_charset($konekcija, "utf8")) {
    printf("\n", mysqli_error($konekcija));
    exit();
} else {
    printf(" \n", mysqli_character_set_name($konekcija));
}

?>