<?php 
include 'src/header.php'; 

if(isset($_POST['simpan'])){
  $jenis  = $_POST['jenis_mobil'];
  $c1     = $_POST['c1'];
  $c2     = $_POST['c2'];

  $simpan = mysqli_query($koneksi, "UPDATE data_mobil SET jenis_mobil = '$jenis', c1 = '$c1', c2 = '$c2' WHERE id_mobil = '$_GET[id_mobil]'");
  echo "<script>alert('Data Berhasil Di Update');window.location='data_mobil.php'</script>";
}
?>

<div class="row column2 graph margin_bottom_30">
   <div class="col-md-l2 col-lg-12">
      <div class="white_shd full">
         <div class="full graph_head">
            <div class="heading1 margin_0">
               <h2>Edit Data Mobil Bekas</h2>
            </div>
         </div>
         <?php
         $id_mobil   = $_GET['id_mobil'];
         $query      = mysqli_query($koneksi, "SELECT * FROM data_mobil WHERE id_mobil = '$id_mobil'");
         $data       = mysqli_fetch_array($query);
         ?>
         <div class="full graph_head">
            <div class="row">
               <div class="col-md-12">
                  <div class="content">
                     <div class="table-responsive-sm">
                        <form action="" method="POST">
                           <div class="form-group">
                             <label class="form-control-label" for="jenis_mobil">Jenis Tipe Mobil</label>
                             <input type="text" class="form-control" name="jenis_mobil" value="<?= $data['jenis_mobil'] ?>" autocomplete="off" placeholder="Input Jenis Tipe Mobil" required>
                           </div>
                           <div class="form-group">
                             <label class="form-control-label" for="c1">Harga Jual</label>
                             <input type="number" class="form-control" name="c1" value="<?= $data['c1'] ?>" autocomplete="off" placeholder="Input Harga Jual" required>
                           </div>
                           <div class="form-group">
                             <label class="form-control-label" for="c2">Harga Beli</label>
                             <input type="text" class="form-control" name="c2" value="<?= $data['c2'] ?>" autocomplete="off" placeholder="Input Harga Beli" required>
                           </div>
                           <div class="form-group">
                             <button type="submit" class='d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm' name="simpan"><span aria-hidden="true"></span>Simpan</button>
                           </div>
                         </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

