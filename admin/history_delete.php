<?php
$del = $kdb->query("DELETE FROM pembayaran");
if($del){
	header('location:index.php?hal=history');
}
?>