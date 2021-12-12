<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
  $id = $_POST['id_jenis_barang'];
  $idbrg = $_POST['id_barang'];
  $jenis= $_POST['jenis_barang'];
  

	$query = "INSERT INTO JENIS_BARANG_0019 (ID_JENIS_BARANG,ID_BARANG,JENIS_BARANG) VALUES ('".$id."','".$idbrg."','".$jenis."')";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data tersimpan
    echo "<script>alert('Data Jenis Barang berhasil ditambahkan'); 
	window.location.href='jenis_barang.php'</script>";
  } else {
    // pesan jika data gagal disimpan
    echo "<script>alert('Data Jenis Barang gagal ditambahkan');
	window.location.href='jenis_barang.php'</script>";
  }
} else {
  //jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: jenis_barang.php'); 
}