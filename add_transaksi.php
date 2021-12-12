<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
 $id = $_POST['id_transaksi'];
  $idpem = $_POST['id_pembelian'];
  $tgljual= $_POST['tanggal_jual'];
  $hrgjual = $_POST['harga_jual'];
  $bayar = $_POST['uang_bayar'];
  $kembali = $_POST['uang_kembali'];

	$query = "INSERT INTO TRANSAKSI_019 (ID_TRANSAKSI,ID_PEMBELIAN,TGL_JUAL,HARGA_JUAL,UANG_BAYAR,UANG_KEMBALI) VALUES ('".$id."','".$idpem."','".$tgljual."','".$hrgjual."','".$bayar."','".$kembali."')";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data tersimpan
    echo "<script>alert('Data Transaksi berhasil ditambahkan'); 
	window.location.href='transaksi.php'</script>";
  } else {
    // pesan jika data gagal disimpan
    echo "<script>alert('Data Barang gagal ditambahkan');
	window.location.href='transaksi.php'</script>";
  }
} else {
  //jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: transaksi.php'); 
}