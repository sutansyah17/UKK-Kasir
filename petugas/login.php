<?php 
include "../koneksi/koneksi.php";

 error_reporting(0);
 session_start();

if (isset($_POST['submit'])) {
    $namauser = $_POST['NamaUser'];
    $password = md5($_POST['Password']);
    
    $sql = "SELECT * FROM user WHERE NamaUser='$namauser' AND Password='$password'";
    $result = mysqli_query($koneksi, $sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);

        $level= $row['Level'];
        $_SESSION['Level'] = $level;            

        $_SESSION['NamaUser'] = $row['NamaUser'];
       
        header("Location: index.php");    
        echo "<script>alert('Berhasil Masuk!')</script>";
    } else {
        echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UKK</title>

    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center"><Label>Login</Label></h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-3 mt-3">
                                <label for="" class="form-label">Nama</label>
                                <input type="text" name="NamaUser" class="form-control" placeholder="namauser">
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="" class="form-label">Password</label>
                                <input type="password" name="Password" class="form-control" placeholder="password">
                             </div>
                                <button name="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <script src="../bootstrap-5.3.2-dist/css/bootstrap.min.js"></script>
    <script src="../bootstrap-5.3.2-dist/css/jquery.min.js"></script>
    
</body>
</html>