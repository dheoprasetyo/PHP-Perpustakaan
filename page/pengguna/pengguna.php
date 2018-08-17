<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Pengguna
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Username</th>
                                            <th>Nama</th>
                                            <th>Password</th>
                                            <th>Level</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        $sql = $conn->query("SELECT * FROM user");
                                        while($row = $sql->fetch_assoc()) {?>
                                        <tr>
                                            <td><?=$no++ ?></td>
                                            <td><?=$row['username']  ?></td>
                                            <td><?=$row['nama']  ?></td>
                                            <td><?=$row['password']  ?></td>
                                            <td><?=$row['level']  ?></td>
                                            <td><img src="images/<?=$row['foto']  ?>" width="50" height="50"></td>
                                            <td>
                                                <a href="?page=pengguna&aksi=ubah&id=<?= $row['id'] ?>" class="btn btn-success">Ubah</a>
                                                <a  onclick="return confirm('yakin ?')" href="?page=pengguna&aksi=hapus&id=<?= $row['id'] ?>" class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                       
                                    </tbody>
                                </table>
                                <a href="?page=pengguna&aksi=tambah" class="btn btn-primary">Tambah Data</a>
