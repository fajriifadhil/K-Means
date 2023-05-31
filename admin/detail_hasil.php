<?php 
include "src/header.php"; 

mysqli_query($koneksi, "TRUNCATE TABLE centroid");
?>

<div class="row column2 graph margin_bottom_30">
   <div class="col-md-l2 col-lg-12">
      <div class="white_shd full">
         <div class="full graph_head">
            <div class="heading1 margin_0">
               <h2>Detail Proses Clustering</h2>
            </div>
         </div>
         <div class="full graph_head">
            <div class="row">
               <div class="col-md-12">
                  <div class="content">
                    <div class="table-responsive-sm">

                      <?php
                        $query_total_data = mysqli_query($koneksi, "SELECT COUNT(*) as SIZE FROM data_mobil");
                        $n_iterasi = 100;
                        $n_data = mysqli_fetch_array($query_total_data)['SIZE'];
                        $n_cluster = 3;
                        $old_iterasi = array();
                        $arrayIterasi = array();
                                
                        for ($i=0; $i < $n_iterasi; $i++) { 
                          array_push($arrayIterasi, $i);
                      ?>
                        <?php
                          $centroid = array();

                          if ($i == 0) {
                            $query_total_data = mysqli_query($koneksi, "SELECT * FROM data_cluster");
                            $index_centroid = 1;
                        ?>
                        <div class="page-header">
                          <small> Centroid Awal  </small>
                        </div>
                        <table class="table table-bordered" width="100%" cellspacing="0"> 
                          <?php
                          $cluster_= 1;
                          while ($row = mysqli_fetch_array($query_total_data)) {
                            //Centroid awal
                            if ($index_centroid == 1 or $index_centroid == 2 or $index_centroid == 3) {
                              array_push($centroid, $row);

                              mysqli_query($koneksi, "INSERT INTO centroid VALUES('','$row[c1]','$row[c2]')");
                          ?>
                          <tr>
                            <th><?php echo 'Cluster'.$cluster_++; ?></th>
                            <th><?php echo "Rp. ".number_format($row['c1']) ?></th>
                            <th><?php echo "Rp. ".number_format($row['c2']) ?></th>
                          </tr>
                          <?php } $index_centroid++; } ?>
                        </table>
                        <?php } else{ ?>

                      <div class="page-header">
                        <h1>
                          <small> Iterasi ke  <i class="ace-icon fa fa-angle-double-right"></i> <?php echo ($i) ?> </small>
                        </h1>
                      </div>
                      <div style="margin: 2px 2px;">

                        <div class="page-header">
                          <small> Centroid Baru </small>
                        </div>
                        <table class="table table-bordered" width="100%" cellspacing="0">
                          <?php
                            //Menghitung centroid baru
                            for ($j=0; $j < $n_cluster; $j++) {
                              $query_centroid = "SELECT data_mobil.*, data_hasil.*, AVG(data_mobil.c1) as 'c1', AVG(data_mobil.c2) as 'c2' FROM data_hasil, data_mobil WHERE data_hasil.id_mobil = data_mobil.id_mobil AND data_hasil.Cluster = 'Cluster-".($j+1)."'";
                              $resultat_centroid = mysqli_query($koneksi, $query_centroid);
                              while ($row_centroid = mysqli_fetch_array($resultat_centroid)) {
                                array_push($centroid, $row_centroid);
                          ?>
                          <tr>
                            <th><?php echo 'Cluster'.($j+1); ?></th>
                            <th><?php echo "Rp. ".number_format($row_centroid['c1']) ?></th>
                            <th><?php echo "Rp. ".number_format($row_centroid['c2']) ?></th>
                          </tr>
                          <?php
                          $nom = $j+1;
                          mysqli_query($koneksi, "UPDATE centroid SET c1 = '$row_centroid[c1]', c2 = '$row_centroid[c2]' WHERE no_centroid = '$nom'");
                           } } ?>
                        </table>
                        <?php }
                          $resultat = mysqli_query($koneksi, "SELECT data_hasil.*, data_mobil.* FROM data_hasil, data_mobil WHERE data_hasil.id_mobil = data_mobil.id_mobil");
                          $no = 1;
                          if ($i == 0) {
                            while ($row = mysqli_fetch_array($resultat)) {
                              $temp_cluster = array();
                              for ($j=0; $j < $n_cluster; $j++) {
                                $nilai_cluster = sqrt(pow(($row['c1']-$centroid[$j]['c1']), 2)+pow(($row['c2']-$centroid[$j]['c2']), 2));
                                $temp_cluster['Cluster-'.($j+1)] = $nilai_cluster;
                              }

                              $my_cluster = array($temp_cluster['Cluster-1'], $temp_cluster['Cluster-2'], $temp_cluster['Cluster-3']);
                              sort($my_cluster);


                              $cluster = '';
                              foreach ($temp_cluster as $key => $value) {
                                if ($value == $my_cluster[0]) {
                                  $cluster = $key;
                                  break;
                                }
                              }
                              $id =  $row['id_hasil'];
                              $query_update = mysqli_query($koneksi, "UPDATE data_hasil SET Cluster= '$cluster' WHERE id_hasil = '$id'") or die(mysqli_error($koneksi));
                            }
                          } else {
                        ?>
                        <div class="page-header">
                          <small> Hasil Cluster </small>
                        </div>
                        <div class="table-responsive">
                          <table class="table table-bordered" id="tabel-data<?=$i+1?>" width="100%" cellspacing="0">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Jenis Tipe Mobil</th>
                                <th>Harga Jual</th>
                                <th>Harga Beli</th>
                                <th>Clus 1</th>
                                <th>Clus 2</th>
                                <th>Clus 3</th>
                                <th>Cluster</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                while ($row = mysqli_fetch_array($resultat)) {
                                  $temp_cluster = array();
                                  for ($j=0; $j < $n_cluster; $j++) {
                                    $nilai_cluster = sqrt(pow(($row['c1']-$centroid[$j]['c1']), 2)+pow(($row['c2']-$centroid[$j]['c2']), 2));
                                    $temp_cluster['Cluster-'.($j+1)] = $nilai_cluster;
                                  }

                                  $my_cluster = array($temp_cluster['Cluster-1'], $temp_cluster['Cluster-2'], $temp_cluster['Cluster-3']);
                                  sort($my_cluster);


                                  $cluster = '';
                                  foreach ($temp_cluster as $key => $value) {
                                    if ($value == $my_cluster[0]) {
                                      $cluster = $key;
                                      break;
                                    }
                                  }
                              ?>
                              <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['jenis_mobil'] ?></td>
                                <td><?= "Rp. ".number_format($row['c1']) ?></td>
                                <td><?= "Rp. ".number_format($row['c2']) ?></td>
                                <th><?php echo "Rp. ".number_format($temp_cluster['Cluster-1']) ?></th>
                                <th><?php echo "Rp. ".number_format($temp_cluster['Cluster-2']) ?></th>
                                <th><?php echo "Rp. ".number_format($temp_cluster['Cluster-3']) ?></th>
                                <th><?php echo $cluster ?></th>
                              </tr>
                              <?php
                                $id =  $row['id_hasil'];
                                $query_update = mysqli_query($koneksi, "UPDATE data_hasil SET Cluster= '$cluster' WHERE id_hasil = '$id'") or die(mysqli_error($koneksi));
                                }
                              ?>
                            </tbody>
                          </table>
                          <?php }
                            if ($i <= 0) {
                              for ($k=0; $k < $n_cluster; $k++) { 
                                $query_old_iterasi = "SELECT `no_centroid`, `c1` FROM `centroid` WHERE `no_centroid` = '".($k+1)."'";
                                $resultat_old_iterasi = mysqli_query($koneksi, $query_old_iterasi) or die(mysqli_error($koneksi));
                                    
                                while ($row = mysqli_fetch_array($resultat_old_iterasi)) {
                                  $old_iterasi[$row['no_centroid']] = $row['c1'];
                                }
                              }
                            }else{
                              $check = true;

                              for ($k=0; $k < $n_cluster; $k++) { 
                                $query_old_iterasi = "SELECT `no_centroid`, `c1` FROM `centroid` WHERE `no_centroid` = '".($k+1)."'";
                                $resultat_old_iterasi = mysqli_query($koneksi, $query_old_iterasi) or die(mysqli_error($koneksi));
                                while ($row = mysqli_fetch_array($resultat_old_iterasi)) {
                                  if($old_iterasi[$row['no_centroid']] != $row['c1']){
                                    $check = false;
                                    $k = $k + $n_cluster+1;
                                    break;
                                  }
                                }
                              }

                              if ($check == true) {
                                $i = $n_iterasi+1;
                              }else{
                                $old_iterasi = array();
                                for ($k=0; $k < $n_cluster; $k++) { 
                                  $query_old_iterasi = "SELECT `no_centroid`, `c1` FROM `centroid` WHERE `no_centroid` = '".($k+1)."'";
                                  $resultat_old_iterasi = mysqli_query($koneksi, $query_old_iterasi) or die(mysqli_error($koneksi));
                                    
                                  while ($row = mysqli_fetch_array($resultat_old_iterasi)) {
                                    $old_iterasi[$row['no_centroid']] = $row['c1'];
                                  }
                                }
                              }
                            }
                          ?>
                          </div>
                          <?php } ?>
                        </div>

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<?php include 'src/footer.php'; ?>