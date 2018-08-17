<?php 
$id = $_GET['id'];
$sql = $conn->query("DELETE FROM buku WHERE id ='$id'");
if ($sql) {
	# code...
?>
<script type="text/javascript">alert('DAta Berhasil Diapus'); window.location.href="?page=buku";</script>
<?php } ?>