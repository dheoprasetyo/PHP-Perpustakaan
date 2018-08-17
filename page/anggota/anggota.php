<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Anggota
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NPM</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Kelamin</th>
                                            <th>Jurusan</th>
                                            <th>Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        $sql = $conn->query("SELECT * FROM anggota");
                                        while ($row=$sql->fetch_assoc()){
                                                $kelamin =($row["kelamin"]==L)?"Laki laki":"Perempuan";
                                                ?>
                                        <tr>
                                            <td><?=$no++; ?></td>
                                            <td><?= $row["npm"]; ?></td>
                                            <td><?= $row["nama"]; ?></td>
                                            <td><?= $row["kelas"]; ?></td>
                                            <td><?= $row["tgl_lahir"]; ?></td>
                                            <td><?= $kelamin; ?></td>
                                            <td><?= $row["jurusan"]; ?></td>
                                            <td> <a href="?page=anggota&aksi=ubah&npm=<?= $row["npm"]; ?>" class="btn btn-info">Ubah</a> 
                                                 <a  onclick="return confirm('yakin ?')" href="?page=anggota&aksi=hapus&npm=<?= $row['npm'] ?>" class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                       
                                    </tbody>
                                </table>
                                <a href="?page=anggota&aksi=tambah" class="btn btn-primary">Tambah Data</a>
                                <a href="page/anggota/cetak.php" target="blank" class="btn btn-default">Cetak</a>
