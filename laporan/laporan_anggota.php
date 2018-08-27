<?php 
$conn = new mysqli("localhost","root","","perpus");
$filename = "anggota_excel-(".date('d-m-Y').").xls";

header("content-disposition: attachment; filename='$filename'");
header("content-type: application/vdn.ms-exel");

 ?>

 <table border="1" width="100%" style="border-collapse: collapse;"">
    <h2>Laporan Data Anggota</h2>
 	<tr>
		<th>No</th>
		<th>NPM</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Tanggal Lahir</th>
        <th>Kelamin</th>
        <th>Jurusan</th>
    </tr>

    <?php 
    $no =1;
    $sql = $conn-> query("SELECT * FROM anggota");

    while ($row=$sql->fetch_assoc()){
    $kelamin =($row["kelamin"]=='L')?"Laki laki":"Perempuan";
    ?>
    <tr>
        <td><?=$no++; ?></td>
        <td><?= $row["npm"]; ?></td>
        <td><?= $row["nama"]; ?></td>
        <td><?= $row["kelas"]; ?></td>
        <td><?= $row["tgl_lahir"]; ?></td>
        <td><?= $kelamin; ?></td>
        <td><?= $row["jurusan"]; ?></td>
        
    </tr>
     <?php } ?>
     
 </table>