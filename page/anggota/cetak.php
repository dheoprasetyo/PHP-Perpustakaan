<?php 
$conn = new mysqli("localhost", "root", "", "sim"); 
 ?>

<style>
	@media print{
		input.noPrint{
			display: none;
		}
	}
</style>
<table border="1" width="100%" style="border-collapse: collapse;">
	<caption>Laporan Data Siswa</caption>
	<thead>
		<tr>
			<th>Nomor</th>
            <th>NPM</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Kelas</th>
            <th>Semester</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			  $no = 1;
			  $sql = $conn->query("SELECT * FROM mahasiswa");
              while($row = $sql->fetch_assoc()) {?>
             <tr>
              <td><?=$no++ ?></td>
              <td><?=$row['npm']  ?></td>
               <td><?=$row['nama']  ?></td>
               <td><?=$row['alamat']  ?></td>
               <td><?=$row['telepon']  ?></td>
                <td><?=$row['email']  ?></td>
                <td><?=$row['kelas']  ?></td>
                <td><?=$row['semester']  ?></td>
			                                           
			   </tr>
        <?php } ?>
	</tbody>
</table>
<br>
<input type="button" class="noPrint" value="Cetak" onclick="window.print()">