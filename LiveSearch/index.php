<?php

require '../DatabaseConn/DatabaseConn.php';

$keyword = $_GET["keyword"];
  
  $query= "SELECT * FROM regular WHERE

      nim LIKE '%$keyword%' OR 
      nama LIKE '%$keyword%' OR
      tgllahir LIKE '%$keyword%' OR 
      alamat LIKE '%$keyword%' OR
      email LIKE '%$keyword%' OR
      notelp LIKE '%$keyword%'OR
      fakultas LIKE '%$keyword%'OR
      jurusan LIKE '%$keyword%'
       
    ";

  $rows = query($query);


?>

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