 <?php 
    $sql = $conn->query("SELECT * FROM anggota");
    while ($row=$sql->fetch_assoc()){
        $jumlah_pengguna=$sql->num_rows;
    }
     $sql2 = $conn->query("SELECT * FROM transaksi WHERE status = 'Pinjam'");
    while ($rows=$sql2->fetch_assoc()){
        $jumlah_transaksi=$sql2->num_rows;
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
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">Data Anggota</div>
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