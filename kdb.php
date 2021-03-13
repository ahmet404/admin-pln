<?php
$kdb = new mysqli("localhost","root","","listrik");
if($kdb->connect_error){
	die("Gagal Terkoneksi: " .$kdb->connect_error);
}
?>