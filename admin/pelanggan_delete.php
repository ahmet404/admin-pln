<?php
$id = $_GET['id'];
$del = $kdb->query("DELETE FROM pelanggan WHERE id_pelanggan = '$id'");
if($del){
	header('location:index.php?hal=pelanggan');
}
?>