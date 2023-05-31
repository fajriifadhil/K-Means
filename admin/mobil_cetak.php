<?php 
include '../koneksi.php';
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
            <h2>LAPORAN DATA MOBIL BEKAS</h2>
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
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $query1 = mysqli_query($koneksi, "SELECT * FROM data_mobil");
        while($data = mysqli_fetch_array($query1)){
        ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $data['jenis_mobil'] ?></td>
          <td><?= number_format($data['c1']) ?></td>
          <td><?= number_format($data['c2']) ?></td>
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