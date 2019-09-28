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
    <title> Data Member </title>
</head>

<body>
    <?php 
        include ('header.php');
    ?>
    
    <!-- start form tambah data -->
    <div class="container">
        <br>  
        <h2><i class="fa fa-angle-double-right"></i> Tambah Data</h2>
        <hr>
        <br>

        <form id="inputdata" class="form-horizontal" method="post" action="simpan.php">
            <div class="form-group">
                <label for="nim">Nama</label>
                <div>
                    <input type="text" class="form-control" id="nama" name="nama">
                </div>
            </div>

            <div class="form-group">
                <label for="nama">Username</label>
                <div>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
            </div>

            <div class="form-group">
                <label for="nama">Password</label>
                <div>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
            </div>

            <div class="form-group">
                <label for="nama">Email</label>
                <div>
                    <input type="text" class="form-control" id="email" name="email">
                </div>
            </div>

            <div class="form-group">
                <div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                    <a href="index.php" class="btn btn-danger"><i class="fa fa-ban"></i> Batal</a>
                </div>
            </div>                    
        </form>
    </div>
    <!-- end form tambah data -->
 
    

    <script language="javascript">
        $.validator.addMethod("alpha", function(value, element){
            return this.optional(element) || value.match(/^[a-zA-Z\s]+$/);
        });
        $("#inputdata").validate({
            rules: {
                username: "required",
                nama: {
                    required: true,
                    alpha: true
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 8
                }
            },
            message: {
                username: "Masukkan username anda!",
                nama: {
                    required: "Masukkan nama anda!",
                    alpha: "Inputan hanya diperbolehkan huruf dan spasi!"
                },
                email: "Masukkan email anda yang valid!",
                password: {
                    required: "Masukkan password anda!",
                    minlength: "Password minimal 8 karakter!"
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    </script>

</body>
</html>
