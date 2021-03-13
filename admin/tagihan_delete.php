<?php
$del = $kdb->query("DELETE FROM tagihan");
$del1 = $kdb->query("DELETE FROM penggunaan");
if($del && $del1){
	header('location:index.php?hal=tagihan');
}
?>