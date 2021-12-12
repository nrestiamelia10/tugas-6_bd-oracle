<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
  $id = $_POST['id_pembelian'];
  $jum = $_POST['jumlah_beli'];
  $sub= $_POST['sub_total'];

	$query = "INSERT INTO PEMBELIAN_10019 (ID_PEMBELIAN,JUMLAH_BELI,SUB_TOTAL) VALUES ('".$id."','".$jum."','".$sub."')";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data tersimpan
    echo "<script>alert('Data Pembelian berhasil ditambahkan'); 
	window.location.href='pembelian.php'</script>";
  } else {
    // pesan jika data gagal disimpan
    echo "<script>alert('Data Barang gagal ditambahkan');
	window.location.href='pembelian.php'</script>";
  }
} else {
  //jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: pembelian.php'); 
}