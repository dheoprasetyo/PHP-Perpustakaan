 <?php 
    $sql = $conn->query("SELECT * FROM anggota");
    while ($row=$sql->fetch_assoc()){
        $jumlah_pengguna=$sql->num_rows;
    }
     $sql2 = $conn->query("SELECT * FROM transaksi WHERE status = 'Pinjam'");
    while ($rows=$sql2->fetch_assoc()){
        $jumlah_transaksi=$sql2->num_rows;
    }
    $sql3 = $conn->query("SELECT * FROM buku");
    while ($rows=$sql3->fetch_assoc()){
        $jumlah_buku=$sql3->num_rows;
    }

    ?>
 <marquee>Selamat Datang di Program Perpustakaan</marquee>
 <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">people_outline</i>
                        </div>
                        <div class="content">
                            <div class="text">Jumlah Anggota</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?= $jumlah_pengguna; ?></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">assignment_ind</i>
                        </div>
                        <div class="content">
                            <div class="text">Data Peminjaman</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?= $jumlah_transaksi; ?></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">payment</i>
                        </div>
                        <div class="content">
                            <div class="text">Data Buku</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?= $jumlah_buku; ?></div>
                        </div>
                    </div>
                </div>

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