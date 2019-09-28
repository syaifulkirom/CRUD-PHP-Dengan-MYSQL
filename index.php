<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.validate.min.js"></script>
    <title> CRUD PHP </title>
</head>

<body>
    <?php 
        include 'header.php';
    ?>
    
    <div class="container">
        <br>  
        <hr>
        <br>

        <div class="container">
            <div class="row justify-content-between">
                <div class="">
                    <a href="tambah.php" class="btn btn-success"><i class="fa "></i> Tambah Data Anggota</a>
                </div>
            </div>
        </div>

        <br>
        
        <!-- start table data responsive -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="tb-mahasiswa">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Email</th>                    
                        <th>Menu</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        require_once('koneksi.php');

                        $no = 1;
                        $koneksiObj = new koneksi();
                        $koneksi    = $koneksiObj->getKoneksi();
                        
                        if($koneksi->connect_error){
                            echo "Gagal Koneksi : ". $koneksi->connect_error;
                            echo "</td></tr>";
                        }

                        $query = "select * from mahasiswa order by nama";
                        $data  = $koneksi->query($query);
                        
                        if($data->num_rows <= 0){
                            echo "<tr>";
                            echo "<td colspan='7' class='text-center'><i>Data kosong</i></td>";
                            echo "</tr>";
                        } else{
                            $sql = mysqli_query($koneksi, "SELECT * FROM mahasiswa"); 
                            
                            if(mysqli_num_rows($sql) == 0){ 
                                echo '<tr><td colspan="14">Data Tidak Ada.</td></tr>';
                            }else{ 
                                
                                while($row = mysqli_fetch_assoc($sql)){ 
                                    echo "<tr>";
                                    echo "<td>".$no++."</td>";
                                    echo "<td class='center'>".$row['nama']."</td>";
                                    echo "<td class='center'>".$row['username']."</td>";
                                    echo "<td class='center'>".$row['password']."</td>";
                                    echo "<td class='center'>".$row['email']."</td>";
                                    echo '<td class="text-center"><a href="edit.php?id='.$row['id'].'" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> Edit</a>';
                                    echo ' 
                                    <a href="hapus.php?id='.$row['id'].'" class="btn btn-danger btn-sm delete-link"><i class="fa fa-trash"></i> Hapus</a></td>';
                                    echo "</tr>";
                                }
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    

</body>
</html>
