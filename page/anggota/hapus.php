<?php 
$npm = $_GET['npm'];
$conn->query("DELETE FROM anggota WHERE npm ='$npm'");

	# code...
?>
<script type="text/javascript">alert('DAta Berhasil Diapus'); window.location.href="?page=anggota";</script>
