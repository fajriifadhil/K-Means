<?php 
include '../koneksi.php';

$NamaCluster = array();
$QueryCluster = mysqli_query($koneksi, "SELECT * FROM data_cluster");
while($DataCluster = mysqli_fetch_array($QueryCluster)){
   array_push($NamaCluster, $DataCluster['nama_cluster']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
      .tandatangan{
        text-align: center;
        margin-left: 545px;
      }

      @media print{
        .tandatangan{
          text-align: center;
          margin-left: 345px;
        }
      }
    </style>
    <style type="text/css">
      body { font-family: arial; background-color: #ccc  }
      .rangkasurat { width: 900px; margin: 0 auto; background-color: #fff; padding: 20px; }
      table { border-bottom: 5px solid #000; padding: 2px; }
      .tengah { text-align: center;line-height: 1px; }
    </style>
</head>
<body>  

  <div class="modal-view">
    <div class="rangkasurat">
      <table width="100%">
        <tr>
          <td><img src="../logo12.png" width="140px"></td>
          <td class="tengah">
            <h2>LAPORAN HASIL CLUSTERING MOBIL BEKAS</h2>
            <h2>ALGORITMA KMEANS CLUSTERING</h2>
          </td>
          <td><img src="../assets/space.png" width="140px"></td>
        </tr>
      </table>
      <br>
      <hr>
      <table border="1" width="100%" cellpadding="3" cellspacing="4">
      <thead>
        <tr bgcolor="yellow">
          <th>No</th>
          <th>Jenis Tipe Mobil</th>
          <th>Harga Jual</th>
          <th>Harga Beli</th>
          <th>Cluster</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $query1 = mysqli_query($koneksi, "SELECT data_mobil.*, data_hasil.* FROM data_hasil, data_mobil WHERE data_hasil.id_mobil = data_mobil.id_mobil");
        while($data = mysqli_fetch_array($query1)){

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
          <td><?= number_format($data['c1']) ?></td>
          <td><?= number_format($data['c2']) ?></td>
          <td><?= $cluster ?></td>
        </tr>
        <?php } ?>       
      </tbody>
    </table>
    <hr>
  </div>

    
</div>

</body>
<script type="text/javascript">
  window.print();
</script>
</html>