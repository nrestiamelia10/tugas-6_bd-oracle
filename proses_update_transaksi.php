<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
   $id = $_POST['id_transaksi'];
  $idpem = $_POST['id_pembelian'];
  $tgljual= $_POST['tanggal_jual'];
  $hrgjual = $_POST['harga_jual'];
  $bayar = $_POST['uang_bayar'];
  $kembali = $_POST['uang_kembali'];
 
  
  // update data berdasarkan id_produk yg dikirimkan
  
	$query = "UPDATE  TRANSAKSI_019  SET ID_PEMBELIAN='".$idpem."', TGL_JUAL ='".$tgljual."', HARGA_JUAL ='".$hrgjual."', UANG_BAYAR ='".$bayar."',UANG_KEMBALI='".$kembali."' WHERE  ID_TRANSAKSI= '".$id."' ";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data berubah
    echo "<script>alert('Data Transsksi berhasil diubah'); window.location.href='transaksi.php'</script>";
  } else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data Transaksi gagal diubah'); window.location.href='transaksi.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: transaksi.php'); 
}