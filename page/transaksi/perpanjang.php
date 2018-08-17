<?php 
    $id = $_GET['id'];
    $judul = $_GET['judul'];
    $tgl_kembali = $_GET['tgl_kembali'];
    $lambat = $_GET['lambat'];

    if($lambat > 7){
        ?>
        <script type="text/javascript">
            alert("Pinjam Buku Tidak Dapat di Pepanjang Karena Lebih dari 7 Hari, Kembalikan dulu baru pinjam lagi");
            window.location.href="?page=transaksi";
        </script>

    <?php 
    }else{
        $pecah_tgl_kembali = explode("-", $tgl_kembali);
        $next_7_hari = mktime(0,0,0, $pecah_tgl_kembali[1], $pecah_tgl_kembali[0]+7, $pecah_tgl_kembali[2]);
        $hari_next = date("d-m-Y", $next_7_hari);

        $sql = $conn->query("UPDATE transaksi SET tgl_kembali='$hari_next' WHERE id='$id'");
        if($sql){
            ?>
            <script type="text/javascript">
                alert("Perpanjang Berhasil");
                window.location.href="?page=transaksi";
            </script>
            <?php 

            }else{
                ?>
                <script type="text/javascript">
                alert("Perpanjang Berhasil");
                window.location.href="?page=transaksi";
            </script>
            <?php  
            } 
        }
    ?>
