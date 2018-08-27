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
        <th>Judul</th>
        <th>Pengarang</th>
        <th>Penerbit</th>
        <th>ISBN</th>
        <th>Jumlah Buku</th>
    </tr>

    <?php 
    $no =1;
    $sql = $conn-> query("SELECT * FROM buku");

    while($row = $sql->fetch_assoc()) {?>
             <tr>
              <td><?=$no++ ?></td>
              <td><?=$row['judul']  ?></td>
               <td><?=$row['pengarang']  ?></td>
               <td><?=$row['penerbit']  ?></td>
               <td><?=$row['tahun_terbit']  ?></td>
                <td><?=$row['isbn']  ?></td>
                <td><?=$row['jumlah_buku']  ?></td>
                <td><?=$row['lokasi']  ?></td>
                <td><?=$row['tgl_input']  ?></td>
        
    </tr>
     <?php } ?>
     
 </table>