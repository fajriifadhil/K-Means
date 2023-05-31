<?php 
include 'src/header.php'; 

if(isset($_POST['simpan'])){
  $jenis_mobil   = $_POST['jenis_mobil'];
  $c1            = $_POST['c1'];
  $c2            = $_POST['c2'];

  $simpan1 = mysqli_query($koneksi, "INSERT INTO data_mobil VALUES('','$jenis_mobil','$c1','$c2')");

  $QueryMobil = mysqli_query($koneksi, "SELECT max(id_mobil) AS MaxID FROM data_mobil");
  $DataMobil  = mysqli_fetch_array($QueryMobil);

  $simpan2 = mysqli_query($koneksi, "INSERT INTO data_hasil VALUES('','$DataMobil[MaxID]','')");

  echo "<script>alert('Data Berhasil Di Simpan');window.location='data_mobil.php'</script>";
}
?>

<div class="row column2 graph margin_bottom_30">
   <div class="col-md-l2 col-lg-12">
      <div class="white_shd full">
         <div class="full graph_head">
            <div class="heading1 margin_0">
               <h2>Tambah Data Mobil Bekas</h2>
            </div>
         </div>
         <div class="full graph_head">
            <div class="row">
               <div class="col-md-12">
                  <div class="content">
                     <div class="table-responsive-sm">
                        <form action="" method="POST">
                           <div class="form-group">
                             <label class="form-control-label" for="jenis_mobil">Jenis Tipe Mobil</label>
                             <input type="text" class="form-control" name="jenis_mobil" autocomplete="off" placeholder="Input Jenis Tipe Mobil" required>
                           </div>
                           <div class="form-group">
                             <label class="form-control-label" for="c1">Harga Jual</label>
                             <input type="number" class="form-control" name="c1" autocomplete="off" placeholder="Input Harga Jual" required>
                           </div>
                           <div class="form-group">
                             <label class="form-control-label" for="c2">Harga Beli</label>
                             <input type="number" class="form-control" name="c2" autocomplete="off" placeholder="Input Harga Beli" required>
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

