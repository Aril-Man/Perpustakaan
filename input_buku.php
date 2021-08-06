<?php
include "config/koneksi.php";
include "library/controller.php";

$go = new controller();
$tabel = 'tbl_buku';
@$field = array('kodebuku'=>$_POST['kodebuku'],
                'judul'=>$_POST['judul'],
                'pengarang'=>$_POST['pengarang'],
                'penerbit'=>$_POST['penerbit'],
                'jumlah'=>$_POST['jumlah']);
$redirect = "?menu=tampil_buku";
@$where = "id = $_GET[id]";

if (isset($_POST['simpan'])) {
    $go->create($con, $tabel, $field, $redirect);
}
if (isset($_GET['edit'])) {
    @$edit = $go->edit($con, $tabel, $where);
}
if (isset($_POST['update'])) {
    $go->update($con, $tabel, $field, $where, $redirect);
}


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Input Buku</title>
  </head>
<body>

<br><br>
<!-- isi -->
<div class="container">
    <div class="card">
        <h5 class="card-header">Form Buku</h5>
        <div class="card-body">
            <form method="post">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Kode Buku</label>
                    <input class="form-control" type="text" name="kodebuku"  value="<?php echo @$edit['kodebuku'] ?>" placeholder="Masukan Kode Buku"  required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Judul Buku</label>
                    <input class="form-control" type="text" name="judul" value="<?php echo @$edit['judul'] ?>" placeholder="masukan Judul Buku" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Pengarang</label>
                    <input class="form-control" type="text" name="pengarang" value="<?php echo @$edit['pengarang'] ?>" placeholder="masukan nama Pengarang" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Penerbit</label>
                    <input class="form-control" type="text" name="penerbit" value="<?php echo @$edit['penerbit'] ?>" placeholder="masukan nama Penerbit" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Jumlah</label>
                    <input class="form-control" type="number" name="jumlah" value="<?php echo @$edit['jumlah'] ?>" placeholder="masukan Jumlah Buku" required>
                </div>

                
                <table>
                        <tr>
                            <td><?php if(@$_GET['id']==""){ ?>
                                    <input class="btn btn-outline-primary" type="submit" name="simpan" value="SIMPAN">
                                <?php }else{ ?>
                                    <input class="btn btn-outline-success" type="submit" name="update" value="UBAH">
                                <?php } ?></td>
                        </tr> 
                    </table>
            </form>
        </div>
    </div>
</div>




  </body>
</html>