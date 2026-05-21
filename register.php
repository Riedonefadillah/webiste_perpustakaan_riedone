<?php
    include"koneksi.php";
    session_start();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $alamat = $_POST['alamat'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $password = $_POST['password'];
        $nama_anggota = $_POST['nama_anggota'];
        $email = $_POST['email'];
        $cekemail = mysqli_query($koneksi, "select * from anggota where email = '$email' ");
        if(mysqli_num_rows($cekemail) > 0){
            echo "<script>alert('Email sudah terdaftar!');</script>";
         
        } else{
            $insert = mysqli_query($koneksi, "insert into anggota (nama_anggota, alamat, jenis_kelamin, email, password) values ('$nama_anggota', '$alamat', '$jenis_kelamin', '$email', '$password')");
            if($insert){
                echo "<script> alert('Data Berhasil Dimasukkan');
                </script>";
                header("location:login.php");
                exit(); 
            } else{
                echo "<script> alert('Data Gagal Dimasukkan');</script>";
                
            }
        }
        
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="register.php">
                                            
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="text"         name="nama_anggota" placeholder="name@example.com"></input>
                                                <label for="inputEmail">Nama Anggota  </label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email"        name="email" placeholder="name@example.com"></input>
                                                <label for="inputEmail">Email  </label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <textarea class="form-control" id="inputEmail" type="textarea"  name="alamat" placeholder="name@example.com"></textarea>
                                                <label for="inputEmail">Alamat  </label>
                                            </div>

                                              <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="password"     name="password" placeholder="name@example.com" />
                                                <label for="inputEmail">Password </label>
                                            </div>
                                            
                                             <div class="form-floating mb-3 mb-md-0">
                                                        <select class="form-select" id="inputJK" name="jenis_kelamin"  placeholder="name@example.com">
                                                        <option value=""> Pilih Jenis Kelamin </option>
                                                        <option value="Pria">Pria</option>
                                                        <option value="Wanita">Wanita</option>
                                                    </select>
                                                    <label for="inputJenisKelamin">Jenis Kelamin</label>
                                                </div>
                                                
                                               
                                           
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><input type="submit" class="btn btn-primary" value="Create account?"></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="d-flex justify-content-center card-footer text-center py-3 gap-3">
                                        <div class="small"><a href="login.php" class="btn btn-primary">Login</a></div>
                                        <div class="small"><a href="register.php" class="btn btn-danger">Register</a></div>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                                    </div>
                                </div>

                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
