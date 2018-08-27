<?php 
$conn = new mysqli("localhost", "root", "", "perpus"); 
 ?>

<style>
	@media print{
		input.noPrint{
			display: none;
		}
	}
</style>
<table border="1" width="100%" style="border-collapse: collapse;">
	<caption>Laporan Data Buku</caption>
	<thead>
		<tr>
			<th>Nomor</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>ISBN</th>
            <th>Jumlah Buku</th>
            <th>Lokasi</th>
            <th>Tanggal Input</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			  $no = 1;
			  $sql = $conn->query("SELECT * FROM buku");
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
	</tbody>
</table>
<br>
<input type="button" class="noPrint" value="Cetak" onclick="window.print()">