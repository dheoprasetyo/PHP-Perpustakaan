<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Transaksi
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>NPM</th>
                                            <th>Nama</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Terlambat</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        $sql = $conn->query("SELECT * FROM transaksi WHERE status='Pinjam'");
                                        while($row = $sql->fetch_assoc()) {?>
                                        <tr>
                                            <td><?=$no++ ?></td>
                                            <td><?= $row["judul"]; ?></td>
                                            <td><?= $row["npm"]; ?></td>
                                            <td><?= $row["nama"]; ?></td>
                                            <td><?= $row["tgl_pinjam"]; ?></td>
                                            <td><?= $row["tgl_kembali"]; ?></td>
                                            <td>
                                                <?php 
                                                    $denda = 1000;

                                                    $tgl_dateline = $row['tgl_kembali'];
                                                    $tgl_kembali = date('Y-m-d');

                                                    $lambat = terlambat($tgl_dateline, $tgl_kembali);
                                                    $denda1 = $lambat*$denda;

                                                    if($lambat>0){
                                                        echo "<font color='red'>$lambat hari<br>(Rp $denda1)</font>";
                                                    }else{
                                                        echo $lambat ."Hari";
                                                    } ?>
                                                
                                            </td>
                                            <td><?= $row["status"]; ?></td>
                                            <td> <a href="?page=transaksi&aksi=kembali&id=<?= $row["id"]; ?>&judul=<?= $row["judul"] ?>" class="btn btn-info">Kembali</a> 
                                                 <a href="?page=transaksi&aksi=perpanjang&id=<?= $row["id"]; ?>&judul=<?= $row["judul"] ?>$lambat=<?= $lambat ?>&tgl_kembali=<?= $row["tgl_kembali"]?>" class="btn btn-danger">Perpanjang</a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                       
                                    </tbody>
                                </table>
                                <a href="?page=transaksi&aksi=tambah" class="btn btn-primary">Tambah Data</a>
                                <a href="page/transaksi/cetak.php" target="blank" class="btn btn-default">Cetak</a>
