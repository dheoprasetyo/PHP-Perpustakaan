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
	<caption>Laporan Data Transaksi</caption>
	<thead>
		<tr>
			<th>Nomor</th>
            <th>Judul</th>
            <th>NPM</th>
            <th>Nama</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			  $no = 1;
			  $sql = $conn->query("SELECT * FROM transaksi WHERE status = 'Kembali'");
              while($row = $sql->fetch_assoc()) {?>
             <tr>
              <td><?=$no++ ?></td>
              <td><?=$row['judul']  ?></td>
               <td><?=$row['nama']  ?></td>
               <td><?=$row['npm']  ?></td>
               <td><?=$row['tgl_pinjam']  ?></td>
                <td><?=$row['tgl_kembali']  ?></td>
                <td><?=$row['status']  ?></td>
			                                           
			   </tr>
        <?php } ?>
	</tbody>
</table>
<br>
<input type="button" class="noPrint" value="Cetak" onclick="window.print()">