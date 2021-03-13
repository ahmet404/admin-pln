<?php
$id = $_GET['id'];
$del = $kdb->query("DELETE FROM penggunaan WHERE id_penggunaan = '$id'");
if($del){
	header('location:index.php?hal=penggunaan');
}
?>