<?php

include ('connection.php');
$query = 'select * from kelas';
$datakelas = $conn->query($query);
$queryMahasiswa = "select mahasiswa.*, kelas.nama AS kelas_nama from mahasiswa join kelas on mahasiswa .kelas_id=kelas.kelas_id";

$dataMahasiswa = $conn->query($queryMahasiswa);





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  <link rel="stylesheet" href="./assets/bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container">
      <div class="py-5 text-center">
        <h2>Form Mahasiswa</h2>
      </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <table class="table">
  <thead>
    <tr>
      <th scope="col">NO</th>
      <th scope="col">NAMA LENGKAPA</th>
      <th scope="col">ALAMAT</th>
      <th scope="col">KELAS</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    foreach($dataMahasiswa as $mahasiswa){
      ?>
    <tr>
      <th scope="row"><?= $no++ ?></th>
      <td><?= $mahasiswa['nama_lengkap'] ?></td>
      <td><?= $mahasiswa['alamat'] ?></td>
      <td><?= $mahasiswa['kelas_nama'] ?></td>
    </tr>
    <?php
    }
    ?>
    
    
  </tbody>
</table>
        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Input Data</h4> 
<form action ="simpan_mahasiswa.php" method="POST" > 
  <div class="mb-3"> 
    <label for="nama_lengkap">Nama Lengkap</label> 
    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required> 
  </div> 
  <div class="mb-3"> 
    <label for="alamat">Alamat</label> 
    <input type="text" class="form-control" id="alamat" name="alamat" required> 
  </div> 
  <div class="mb-3"> 
    <label for="kelas">Kelas</label> 
    <select class="form-select d-block w-100" id="Kelas" name="kelas_id" required> 
      <option value="">Pilih...</option> 

      <?php
      foreach($datakelas as $kelas){ 
        ?>
        <option value="<?= $kelas['kelas_id'] ?>"><?= $kelas['nama']?></option>
        <?php
      }
      ?>

    </select> 
  </div> 
  <div class="row"> 
  </div> 
  <hr class="mb-4"> 
  <button class="btn btn-primary btn-lg btn-block" type="submit">Simpan Data</button> 
</form> 
        </div>
      </div>

    </div>
  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017-2019 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
<script> src="/assets/bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"</script>
</body>
</html>