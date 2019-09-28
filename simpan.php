<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

<div class="container">
<?php
    require_once('koneksi.php');
    $koneksiObj = new Koneksi();
    $koneksi = $koneksiObj->getKoneksi();

    if($koneksi->connect_error){
        echo "Gagal Koneksi : ". $koneksi->connect_error;
    } 
    
    $nama       = $_POST['nama'];
    $username   = $_POST['username'];
    $password   = $_POST['password'];
    $email      = $_POST['email'];
   
    if($nama=='' || $username=='' || $password=='' || $email==''){
        echo "Data yang dimasukkan salah. Pastikan semua form telah terisi!<br>";
        echo '<a href="tambah.php">Kembali</a>';
        return;
    }

    $query1 = "select * from mahasiswa where username='$username' or email='$email'";
    $count = $koneksi->query($query1);
    if($count->num_rows > 0){
        echo "Username atau Email sudah terdaftar, mohon periksa kembali!";
        echo '<a href="tambah.php">Kembali</a>';
        return;
    }

    $query = "insert into mahasiswa (nama, username, password, email) values('$nama', '$username', '$password', '$email')";
    
    if($koneksi->query($query)===true){        
        echo '<br><div class="alert alert-success alert-dismissable">Data '.$nama.' berhasil disimpan. <a href="index.php">  Lihat Data</a></div>';
    } else{
        echo '<br><div class="alert alert-danger alert-dismissable">Data gagal disimpan! Kembali ke <a href="index.php">  Halaman Awal</a></div>';
    }
    
    $koneksi->close();
?>
</div>