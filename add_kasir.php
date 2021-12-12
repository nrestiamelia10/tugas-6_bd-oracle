<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
  $id = $_POST['id_kasir'];
  $idtrns = $_POST['id_transaksi'];
  $nama= $_POST['nama_kasir'];
 

	$query = "INSERT INTO KASIR_019 (ID_KASIR,ID_TRANSAKSI,NAMA_KASIR) VALUES ('".$id."','".$idtrns."','".$nama."')";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data tersimpan
    echo "<script>alert('Data Kasir berhasil ditambahkan'); 
	window.location.href='kasir.php'</script>";
  } else {
    // pesan jika data gagal disimpan
    echo "<script>alert('Data Kasir gagal ditambahkan');
	window.location.href='kasir.php'</script>";
  }
} else {
  //jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: kasir.php'); 
}