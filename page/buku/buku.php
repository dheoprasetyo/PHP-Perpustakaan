<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Buku
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Pengarang</th>
                                            <th>Penerbit</th>
                                            <th>ISBN</th>
                                            <th>Jumlah Buku</th>
                                            <th>Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        $sql = $conn->query("SELECT * FROM buku");
                                        while($row = $sql->fetch_assoc()) {?>
                                        <tr>
                                            <td><?=$no++ ?></td>
                                            <td><?php echo  $row["judul"]; ?></td>
                                            <td><?php echo  $row["pengarang"]; ?></td>
                                            <td><?php echo  $row["penerbit"]; ?></td>
                                            <td><?php echo  $row["isbn"]; ?></td>
                                            <td><?php echo  $row["jumlah_buku"]; ?></td>
                                            <td> <a href="?page=buku&aksi=ubah&id=<?= $row["id"]; ?>" class="btn btn-info">Ubah</a> 
                                                 <a onclick="return confirm('yakin?');" href="?page=buku&aksi=hapus&id=<?= $row["id"]; ?>" class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                       
                                    </tbody>
                                </table>
                                <a href="?page=buku&aksi=tambah" class="btn btn-primary">Tambah Data</a>
