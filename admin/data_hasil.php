<?php 
include "../koneksi.php";

//PROSES CLUSTERING
$query_total_data = mysqli_query($koneksi, "SELECT COUNT(*) as SIZE FROM data_mobil") or die(mysqli_error($koneksi));
$n_iterasi = 100; //JUMLAH ITERASI YANG AKAN DILAKUKAN
$n_data = mysqli_fetch_array($query_total_data)['SIZE']; //JUMLAH DATA NILAI
$n_cluster = 3; //JUMLAH CLUSTER/KATEGORI
$old_iterasi = array(); //DEKLRASI UNTUK MENYIMPAN ITERASI YANG LAMA
  
  for ($i=0; $i < $n_iterasi; $i++) {
    $centroid = array();
    
    if ($i == 0) {
      //MENGAMBIL TITIK PUSAT SETIAP CLUSTER
      $query_total_data = mysqli_query($koneksi, "SELECT * FROM data_cluster");
      $index_centroid = 1;

      while ($row = mysqli_fetch_array($query_total_data)) {
        //Centroid awal
        if ($index_centroid == 1 or $index_centroid == 2 or $index_centroid == 3) {
          array_push($centroid, $row);
        }
        $index_centroid++;
      }
    }else{
      //MENCARI/MENGHITUNG TITIK PUSAT(CENTROID) BARU
      for ($j=0; $j < $n_cluster; $j++) {
        $query_centroid = "SELECT data_mobil.*, data_hasil.*, AVG(data_mobil.c1) as 'c1', AVG(data_mobil.c2) as 'c2' FROM data_hasil, data_mobil WHERE data_hasil.id_mobil = data_mobil.id_mobil AND data_hasil.Cluster = 'Cluster-".($j+1)."'";
        $resultat_centroid = mysqli_query($koneksi, $query_centroid) or die(mysqli_error($koneksi));
        while ($row_centroid = mysqli_fetch_array($resultat_centroid)) {
          array_push($centroid, $row_centroid);
        }
      }
    }
    //MENGHITUNG JARAK METODE KMEANS
    $query = "SELECT data_hasil.*, data_mobil.* FROM data_hasil, data_mobil WHERE data_hasil.id_mobil = data_mobil.id_mobil";
    $resultat = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
    
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

      $id =  $row['id_mobil'];
      $query_update = mysqli_query($koneksi, "UPDATE data_hasil SET Cluster= '$cluster' WHERE id_hasil = '$id'") or die(mysqli_error($koneksi));
    }

    if ($i <= 0) {
      for ($k=0; $k < $n_cluster; $k++) { 
        $query_old_iterasi = "SELECT id_hasil, Cluster FROM data_hasil WHERE Cluster = 'Cluster-".($k+1)."'";
        $resultat_old_iterasi = mysqli_query($koneksi, $query_old_iterasi) or die(mysqli_error($koneksi));
        
        while ($row = mysqli_fetch_array($resultat_old_iterasi)) {
          $old_iterasi[$row['id_hasil']] = $row['Cluster'];
        }
      }
    }else{
      $check = true;

      for ($k=0; $k < $n_cluster; $k++) { 
        $query_old_iterasi = "SELECT id_hasil, Cluster FROM data_hasil WHERE Cluster = 'Cluster-".($k+1)."'";
        $resultat_old_iterasi = mysqli_query($koneksi, $query_old_iterasi) or die(mysqli_error($koneksi));
        while ($row = mysqli_fetch_array($resultat_old_iterasi)) {
          if($old_iterasi[$row['id_hasil']] != $row['Cluster']){
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
          $query_old_iterasi = "SELECT id_hasil, Cluster FROM data_hasil WHERE Cluster = 'Cluster-".($k+1)."'";
          $resultat_old_iterasi = mysqli_query($koneksi, $query_old_iterasi) or die(mysqli_error($koneksi));
        
          while ($row = mysqli_fetch_array($resultat_old_iterasi)) {
            $old_iterasi[$row['id_hasil']] = $row['Cluster'];
          }
        }
      }
    }
  }

include "src/header.php"; 
?>

<div class="row column2 graph margin_bottom_30">
   <div class="col-md-l2 col-lg-12">
      <div class="white_shd full">
         <div class="full graph_head">
            <div class="heading1 margin_0">
               <h2>Data Hasil Clustering</h2>
            </div>
         </div>
         <div class="full graph_head">
            <div class="row">
               <div class="col-md-12">
                  <a href="detail_hasil.php"><button type="button" class='d-sm-inline-block btn btn-sm btn-warning shadow-sm'><span aria-hidden="true"></span><i class="fa fa-eye"></i> Detail Perhitungan</button></a>

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
                              <th>Cluster</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              $no = 1;
                              $query = mysqli_query($koneksi, "SELECT data_mobil.*, data_hasil.* FROM data_hasil, data_mobil WHERE data_hasil.id_mobil = data_mobil.id_mobil");
                              while($data = mysqli_fetch_array($query)){
                                if($data['Cluster'] == "Cluster-1"){
                                  $cluster = $NamaCluster[0];
                                }elseif($data['Cluster'] == "Cluster-2"){
                                  $cluster = $NamaCluster[1];
                                }elseif($data['Cluster'] == "Cluster-3"){
                                  $cluster = $NamaCluster[2];
                                }
                            ?>
                            <tr>
                              <td><?= $no++ ?></td>
                              <td><?= $data['jenis_mobil'] ?></td>
                              <td><?= "Rp. ".number_format($data['c1']) ?></td>
                              <td><?= "Rp. ".number_format($data['c2']) ?></td>
                              <td><?= $cluster ?></td>
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
