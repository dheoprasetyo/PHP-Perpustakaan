<?php 

$id = $_GET["id"];
$judul = $_GET["judul"];

$sql = $conn->query("UPDATE transaksi SET status='Kembali' WHERE id ='$id'");

$sql = $conn->query("UPDATE buku SET jumlah_buku=(jumlah_buku+1) WHERE judul ='$judul'");
 if ($sql) {
	# code...
?>

 <script type="text/javascript">alert('DAta Berhasil Diapus'); window.location.href="?page=transaksi";</script>
<?php } ?>