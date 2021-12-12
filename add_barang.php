<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
  $id = $_POST['id_barang'];
  $idpem = $_POST['id_pembelian'];
  $barang= $_POST['nama_barang'];
  $modal = $_POST['harga_modal'];
  $harga = $_POST['harga_jual'];

	$query = "INSERT INTO BARANG_0019 (ID_BARANG,ID_PEMBELIAN,NAMA_BARANG,HARGA_MODAL,HARGA_JUAL) VALUES ('".$id."','".$idpem."','".$barang."','".$modal."','".$harga."')";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data tersimpan
    echo "<script>alert('Data Barang berhasil ditambahkan'); 
	window.location.href='barang.php'</script>";
  } else {
    // pesan jika data gagal disimpan
    echo "<script>alert('Data Barang gagal ditambahkan');
	window.location.href='barang.php'</script>";
  }
} else {
  //jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: barang.php'); 
}