<?php
if(isset($_POST['login'])){
    session_start();
    include 'koneksi.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    $login = mysqli_query($koneksi,"SELECT * FROM data_admin where username = '$username' and password = '$password'");
    $cek = mysqli_num_rows($login);

    if($cek > 0){
      $data = mysqli_fetch_assoc($login);
      $_SESSION['login']   = "Login";
      $_SESSION['id']      = $data['id_admin'];
      $_SESSION['nama']    = $data['nama_admin'];
      echo "<script>alert('Login Berhasil! Selamat Datang');window.location='admin/index.php'</script>"; 
    }else{
        echo "<script>alert('Login Gagal!Username dan Password Tidak Ditemukan');window.location='index.php'</script>";
    }
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
      <link rel="icon" href="assets/images/fevicon.png" type="image/png" />
      <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
      <link rel="stylesheet" href="assets/style.css" />
      <link rel="stylesheet" href="assets/css/responsive.css" />
      <link rel="stylesheet" href="assets/css/colors.css" />
      <link rel="stylesheet" href="assets/css/bootstrap-select.css" />
      <link rel="stylesheet" href="assets/css/perfect-scrollbar.css" />
      <link rel="stylesheet" href="assets/css/custom.css" />
      <link rel="stylesheet" href="assets/js/semantic.min.css" />
   </head>
   <body class="inner_page login">
      <div class="full_container">
         <div class="container">
            <div class="center verticle_center full_height">
               <div class="login_section">
                  <div class="logo_login">
                     <div class="center">
                        <h3 align="center" style="color: white">KMEANS CLUSTERING MOBIL</h3>
                     </div>
                  </div>
                  <div class="login_form">
                     <form method="POST" action="">
                        <fieldset>
                           <div class="field">
                              <label class="label_field">Username</label>
                              <input type="text" name="username" autocomplete="off" placeholder="Username" required autofocus>
                           </div>
                           <div class="field">
                              <label class="label_field">Password</label>
                              <input type="password" name="password" autocomplete="off" placeholder="Password" required>
                           </div>
                           <div class="field margin_0">
                              <label class="label_field hidden">hidden label</label>
                              <button type="submit" name="login" class="main_bt">Login</button>
                           </div>
                        </fieldset>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <script src="assets/js/animate.js"></script>
      <script src="assets/js/bootstrap-select.js"></script>
      <script src="assets/js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <script src="assets/js/custom.js"></script>
   </body>
</html>