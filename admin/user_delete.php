<?php
$id = $_GET['id'];
$del = $kdb->query("DELETE FROM admin WHERE id_admin = '$id'");
if($del){
	header('location:index.php?hal=user');
}
?>