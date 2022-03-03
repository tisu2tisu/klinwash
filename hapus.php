<?php 
include_once 'functions.php';

$app->hapus_transaksi($_GET['id']);
echo "<script>alert('berhasil di hapus');
       window.location.replace('lihat_transaksi.php');</script>";
?>