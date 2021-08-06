<?php 
include 'config/koneksi.php';
include 'library/controller.php';

$go = new Controller();
$tabel = 'tbl_buku';
@$where = "id = $_GET[id]";
$redirect = '?menu=tampil_buku';

if (isset($_GET['delete'])) {
    $go->delete($con, $tabel, $where, $redirect);
}

if (isset($_GET['edit'])) {
    $edit = $go->edit($con, $tabel, $where);
}

?>

<div class="container">
    <table align="center" border="2"  class="display mt-4 table table-striped table-hover table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Kode Buku</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Jumlah</th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                @$data = $go->show($con, $tabel);
                $no=0;
                if ($data =="") {
                    echo "<tr><td colspan='5'> no record </td></tr>";
                }
                else {
                    foreach ($data as $r) {
                        $no++
            ?>
            <tr>
                <td><?php echo $r['kodebuku'] ?></td>
                <td><?php echo $r['judul'] ?></td>
                <td><?php echo $r['pengarang'] ?></td>
                <td><?php echo $r['penerbit'] ?></td>
                <td><?php echo $r['jumlah'] ?></td>
                <td><a class="btn btn-danger" href="?menu=tampil_buku&delete&id=<?php echo $r['id']?>" onclick="return confirm('Hapus Data?')">Hapus</a></td>
                <td><a class="btn btn-warning" href="?menu=input_buku&edit&id=<?php echo $r['id']?>">Edit</a>
            </tr>

            <?php  } } ?>
        </tbody> 
    </table>
</div>