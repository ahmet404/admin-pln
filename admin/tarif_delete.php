<?php
$id = $_GET['id'];
$del = $kdb->query("DELETE FROM tarif WHERE id_tarif = '$id'");
if($del){
	header('location:index.php?hal=tarif');
}
?>