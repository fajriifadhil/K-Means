<?php include 'src/header.php'; ?>

<div class="row column2 graph margin_bottom_30">
   <div class="col-md-l2 col-lg-12">
      <div class="white_shd full">
         <div class="full graph_head">
            <div class="heading1 margin_0">
               <h2>Data Cluster</h2>
            </div>
         </div>
         <div class="full graph_head">
            <div class="row">
               <div class="col-md-12">
                  <div class="content">
                     <div class="table-responsive-sm">
                        <table class="table table-bordered" id="tabel-data">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Nama Cluster</th>
                              <th>Harga Jual</th>
                              <th>Harga Beli</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              $no = 1;
                              $query = mysqli_query($koneksi, "SELECT * FROM data_cluster");
                              while($data = mysqli_fetch_array($query)){
                            ?>
                            <tr>
                              <td><?= $no++ ?></td>
                              <td><?= $data['nama_cluster'] ?></td>
                              <td><?= "Rp. ".number_format($data['c1']) ?></td>
                              <td><?= "Rp. ".number_format($data['c2']) ?></td>
                              <td>
                                <a href="cluster_edit.php?id_cluster=<?php echo $data['id_cluster']; ?>"><button type="button" class='d-sm-inline-block btn btn-sm btn-primary shadow-sm'><span aria-hidden="true"></span>Edit</button></a>
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

