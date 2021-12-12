<?php
//membangun koneksi
$username="resti_019";
$password="resti_019";
$database="LOCALHOST/XE";

$koneksi=oci_connect($username,$password,$database);

if(!$koneksi){
	$err=oci_error();
	echo "gagal tersambung ke ORACLE". $err['text'];
} else {
	//echo "koneksi berhasil";
}

?>