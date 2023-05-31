<?php 
include 'src/header.php'; 

if(isset($_POST['simpan'])){
  $nama   = $_POST['nama_admin'];
  $user   = $_POST['username'];
  $pass   = ($_POST['password']);

  $simpan = mysqli_query($koneksi, "UPDATE data_admin SET nama_admin = '$nama', username = '$user', password = '$pass' WHERE id_admin = '$_GET[id_admin]'");
  echo "<script>alert('Data Berhasil Di Update');window.location='data_admin.php'</script>";
}
?>

<div class="row column2 graph margin_bottom_30">
   <div class="col-md-l2 col-lg-12">
      <div class="white_shd full">
         <div class="full graph_head">
            <div class="heading1 margin_0">
               <h2>Edit Data Admin</h2>
            </div>
         </div>
         <?php
         $id_admin = $_GET['id_admin'];
         $query    = mysqli_query($koneksi, "SELECT * FROM data_admin WHERE id_admin = '$id_admin'");
         $data     = mysqli_fetch_array($query);
         ?>
         <div class="full graph_head">
            <div class="row">
               <div class="col-md-12">
                  <div class="content">
                     <div class="table-responsive-sm">
                        <form action="" method="POST">
                           <div class="form-group">
                             <label class="form-control-label" for="nama_admin">Nama Admin</label>
                             <input type="text" class="form-control" name="nama_admin" value="<?= $data['nama_admin'] ?>" autocomplete="off" placeholder="Input Nama Admin" required>
                           </div>
                           <div class="form-group">
                             <label class="form-control-label" for="username">Username</label>
                             <input type="text" class="form-control" id="username" name="username" value="<?= $data['username'] ?>" autocomplete="off" placeholder="Input Username" required>
                           </div>
                           <div class="form-group">
                             <label class="form-control-label" for="password">Password</label>
                             <input type="text" class="form-control" id="password" name="password" value="<?= $data['password'] ?>" autocomplete="off" placeholder="Input Password" required>
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

