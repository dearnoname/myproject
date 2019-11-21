<?php
$link = new mysqli("localhost", "root", "", "compras_ex");
if($link->connect_errno){
	echo "Fallo: (" . $link->connect_error;
}
//echo $link->host_info . "\n";

?>