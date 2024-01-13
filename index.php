<?php
require 'DatabaseConn/DatabaseConn.php';

$rows = query("SELECT * FROM regular");

// // tombol cari
// function cariData($keyword){
  
//   $query= "SELECT * FROM regular WHERE

//       nim LIKE '%$keyword%' OR 
//       nama LIKE '%$keyword%' OR
//       tgllahir LIKE '%$keyword%' OR 
//       alamat LIKE '%$keyword%' OR
//       email LIKE '%$keyword%' OR
//       notelp LIKE '%$keyword%'OR
//       fakultas LIKE '%$keyword%'OR
//       jurusan LIKE '%$keyword%'
       
//     ";

//   return query($query);
// }

// // mengecek ketika tombol cari sudah ditekan
// if (isset($_GET["cari"])) {

//   $rows = cariData($_GET["keyword"]);
// }


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>TABEL MAHASISWA</title>
</head>
<body>
  <section class="intro">
    <div class="bg-image h-100" style="background-image: url('https://mdbootstrap.com/img/Photos/new-templates/tables/img2.jpg');">
      <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, .25);">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="card bg-dark shadow-2-strong">
                <div class="card-body">
                  <div class="table-responsive-custom">
                      <h1 class="text-center">TABEL MAHASISWA</h1>
                    <div class="d-flex justify-content-between mb-3">
                      <div>
                        <a href="AddData/"><button type="button" class="btn btn-warning">TAMBAH DATA MAHASISWA</button></a>
                      </div>
                      <div>
                        <form action="" method="GET" class="form-inline">
                          <div class="form-group">
                            <input type="text" placeholder="Search.." autocomplete="off" class="form-control" name="keyword" id="keyword">
                          </div>
                          <button class="btn btn-secondary" name="cari" disabled>Cari</button>
                        </form>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-dark table-borderless mb-0">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Action</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Email</th>
                            <th scope="col">No telp</th>
                            <th scope="col">Fakultas</th>
                            <th scope="col">Jurusan</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i = 1; ?>
                          <?php foreach ($rows as $mhs) : ?>
                            <tr>
                              <td><?= $i; ?></td>
                              <td>
                                <a href="EditData/?nim=<?= $mhs["nim"] ?>"><button type="button" class="btn btn-primary">Edit</button></a>
                                <a href="Delete/?nim=<?= $mhs["nim"] ?>" onclick="return confirm('yakin ingin menghapus data ini?')"><button type="button" class="btn btn-danger">Delete</button></a>
                              </td>
                              <th scope="row"><?= $mhs["nim"]; ?></th>
                              <td><?= $mhs["nama"]; ?></td>
                              <td><?= $mhs["tgllahir"]; ?></td>
                              <td><?= $mhs["alamat"]; ?></td>
                              <td><?= $mhs["email"]; ?></td>
                              <td><?= $mhs["notelp"]; ?></td>
                              <td><?= $mhs["fakultas"]; ?></td>
                              <td><?= $mhs["jurusan"]; ?></td>
                            </tr>
                            <?php $i++; ?>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      <script>
        $(document).ready(function() {
          $('.table-responsive-custom').on('show.bs.dropdown', function() {
            $('.table-responsive-custom').css("overflow", "inherit");
          });

          $('.table-responsive-custom').on('hide.bs.dropdown', function() {
            $('.table-responsive-custom').css("overflow", "auto");
          });
        });
      </script>
      <script src="LiveSearch/script.js"></script>
    </body>
    </html>
