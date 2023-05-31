<?php include 'src/header.php'; ?>

<div class="row column2 graph margin_bottom_30">
   <div class="col-md-l2 col-lg-12">
      <div class="white_shd full">
         <div class="full graph_head">
            <div class="heading1 margin_0">
               <h2>Data Mobil Bekas</h2>
            </div>
         </div>
         <div class="full graph_head">
            <div class="row">
               <div class="col-md-12">
                  <a href="mobil_tambah.php"><button type="button" class='d-sm-inline-block btn btn-sm btn-success shadow-sm'><span aria-hidden="true"></span>Add</button></a></th>
                  <hr>
                  <div class="content">
                     <div class="table-responsive-sm">
                        <table class="table table-bordered" id="tabel-data">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Jenis Tipe Mobil</th>
                              <th>Harga Jual</th>
                              <th>Harga Beli</th>
                                <th>Aksi</th>
                             
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              $no = 1;
                              $query = mysqli_query($koneksi, "SELECT * FROM data_mobil");
                              while($data = mysqli_fetch_array($query)){
                            ?>
                            <tr>
                              <td><?= $no++ ?></td>
                              <td><?= $data['jenis_mobil'] ?></td>
                              <td><?= "Rp. ".number_format($data['c1']) ?></td>
                              <td><?= "Rp. ".number_format($data['c2']) ?></td>
                              <td>
                                <a href="mobil_edit.php?id_mobil=<?php echo $data['id_mobil']; ?>"><button type="button" class='d-sm-inline-block btn btn-sm btn-primary shadow-sm'><i class="fa fa-edit"></i></button></a>
                                <a href="mobil_hapus.php?id_mobil=<?php echo $data['id_mobil']; ?>" onclick="return confirm('Yakin Ingin Mneghapus Data Ini?')" ><button type="button" class='d-sm-inline-block btn btn-sm btn-danger shadow-sm'><span aria-hidden="true"><i class="fa fa-trash"></i></button></a>
                              </td>
                            </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<?php include 'src/footer.php'; ?>