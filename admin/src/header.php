<?php
session_start();
  if($_SESSION['login'] == ""){
    echo "<script>alert('Anda Harus Login Terlebih Dahulu');window.location='../index.php'</script>";
}
include '../koneksi.php';

$id     = $_SESSION['id'];
$ambil  = mysqli_query($koneksi, "SELECT * FROM data_admin WHERE id_admin = '$_SESSION[id]'");
$dt     = mysqli_fetch_array($ambil);

$NamaCluster = array();
$QueryCluster = mysqli_query($koneksi, "SELECT * FROM data_cluster");
while($DataCluster = mysqli_fetch_array($QueryCluster)){
   array_push($NamaCluster, $DataCluster['nama_cluster']);
}

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <title>KMEANS CLUSTERING MOBIL</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" href="../assets/images/fevicon.png" type="image/png" />
      <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
      <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" />
      <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
      <link rel="stylesheet" href="../assets/style.css" />
      <link rel="stylesheet" href="../assets/css/responsive.css" />
      <link rel="stylesheet" href="../assets/css/colors.css" />
      <link rel="stylesheet" href="../assets/css/bootstrap-select.css" />
      <link rel="stylesheet" href="../assets/css/perfect-scrollbar.css" />
      <link rel="stylesheet" href="../assets/css/custom.css" />
   </head>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <div class="user_info">
                        </div>
                     </div>
                  </div>
               </div>
                  <h4>KMEANS MOBIL</h4>
                  <ul class="list-unstyled components">
                     <li><a href="index.php"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
                     <li><a href="data_mobil.php"><i class="fa fa-car"></i><span>Data Mobil</span></a></li>
                     <li><a href="data_hasil.php"><i class="fa fa-clipboard"></i><span>Perhitungan</span></a></li>
                  </ul>
               </div>
            </nav>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="right_topbar">
                           <div class="icon_info">
                              <ul class="user_profile_dd">
                                 <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><span class="name_user"><?= $dt['nama_admin'] ?></span></a>
                                    <div class="dropdown-menu">
                                       <a class="dropdown-item" href="logout.php"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
               <!-- end topbar -->
               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                           </div>
                        </div>
                     </div>
                     <div class="row column1">
                        <div class="col-md-6 col-lg-4">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-file blue1_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <?php
                                    $Query2 = mysqli_query($koneksi, "SELECT * FROM data_cluster");
                                    $Data2  = mysqli_num_rows($Query2);
                                    ?>
                                    <p class="total_no"><?= $Data2 ?></p>
                                    <p class="head_couter">Data Cluster</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-car yellow_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <?php
                                    $Query1 = mysqli_query($koneksi, "SELECT * FROM data_mobil");
                                    $Data1 = mysqli_num_rows($Query1);
                                    ?>
                                    <p class="total_no"><?= $Data1 ?></p>
                                    <p class="head_couter">Data Mobil</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-history red_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <?php
                                    $Query3 = mysqli_query($koneksi, "SELECT * FROM data_hasil");
                                    $Data3  = mysqli_num_rows($Query3);
                                    ?>
                                    <p class="total_no"><?= $Data3 ?></p>
                                    <p class="head_couter">Data Hasil</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>