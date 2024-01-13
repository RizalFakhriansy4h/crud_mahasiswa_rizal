<?php

require '../DatabaseConn/DatabaseConn.php';

// ambil id yang ada di url
$nim = $_GET["nim"];

// data yang mau diedit kembalikan value
$mhs = query("SELECT * FROM regular WHERE nim = $nim")[0];

function editData($post){
	global $conn;
	
	// ambil data dari tiap form 
  $nimLama = $_GET["nim"];
	$nim = $post["nim"];
	$nama = htmlspecialchars($post["nama"]);
	$tgllahir = htmlspecialchars($post["tgllahir"]);
	$alamat = htmlspecialchars($post["alamat"]);
	$email = htmlspecialchars($post["email"]);
	$notelp = htmlspecialchars($post["notelp"]);
	$fakultas = htmlspecialchars($post["fakultas"]);
	$jurusan = htmlspecialchars($post["jurusan"]);
	// kirim data yang sudah di ubah ke database
	$query= "UPDATE regular SET
			nim ='$nim', 
			nama ='$nama',
			tgllahir ='$tgllahir',
			alamat='$alamat',
			email ='$email',
			notelp ='$notelp',
			fakultas ='$fakultas',
			jurusan ='$jurusan'

			WHERE nim =$nimLama;
			";
	
mysqli_query($conn, $query);

return mysqli_affected_rows($conn);

}

// cek apakah tombol submit sudah dipencet apa belum

if ( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil ditambah atau tidak
	if (editData($_POST) > 0 ){
				echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href=
				'../';
			</script>
			";	
			}	
	else { echo "
			<script>
					alert('data gagal diubah!');
					document.location.href=
					'../';
			</script>
			";
			}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>EDIT DATA MAHASISWA</title>
</head>
<body style="background-image: url('https://mdbootstrap.com/img/Photos/new-templates/tables/img2.jpg');">
  <div class="form-container">
    <h3>EDIT DATA MAHASISWA</h3>

    <form action="" autocomplete="off" method="post" enctype="multipart/form-data">
      <label for="NIM">NIM</label>
      <input type="text" id="nim" name="nim" value="<?=$mhs["nim"] ?>"  style="background-color: #f2f2f2;">


    <label for="nama">Nama</label>
      <input type="text" id="nama" name="nama" placeholder="Masukkan Nama" required value="<?=$mhs["nama"] ?>">
    
    <label for="tglLahir">Tanggal Lahir</label><p></p>
      <input type="date" id="tglLahir" name="tgllahir" placeholder="Masukkan Tanggal Lahir" value="1998-01-01"
       min="1998-01-01" max="2006-12-31"required value="<?=$mhs["tgllahir"] ?>"><p></p>

	  <label for="alamat">Alamat</label>
      <input type="text" id="alamat" name="alamat" placeholder="Masukkan Alamat" required value="<?=$mhs["alamat"] ?>">

	  <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Masukkan Email" required value="<?=$mhs["email"] ?>">

	  <label for="notelp">No Telepon</label>
      <input type="tel" id="notelp" name="notelp" placeholder="Masukkan No Telepon" required value="<?=$mhs["notelp"] ?>">

	  <label for="fakultas">Fakultas</label>
    <select id="fakultas" name="fakultas" onchange="labeljurusan()">
      <option value="<?=$mhs["fakultas"] ?>"><?= $mhs["fakultas"] ?></option>
      <option value="Teknologi Informasi">Teknologi Informasi</option>
      <option value="Ilmu Sosial dan Ilmu Politik">Ilmu Sosial dan Ilmu Politik</option>
      <option value="Psikologi">Psikologi</option>
      <option value="Teknik">Teknik</option>
      <option value="Ekonomi dan Bisnis">Ekonomi dan Bisnis</option>
    </select>

	  <label for="jurusan">Jurusan</label>
    <select id="jurusan" name="jurusan">
     <option value="<?=$mhs["jurusan"] ?>"><?=$mhs["jurusan"] ?>
    </select>
    <script>
    function labeljurusan() {
      var fakultas = document.getElementById("fakultas");
      var jurusan = document.getElementById("jurusan");

      // Menghapus semua pilihan pada jurusan
      jurusan.innerHTML = "";

      // Mendapatkan nilai yang dipilih pada fakultas
      var fakultasValue = fakultas.value;

      // Menambahkan pilihan sesuai dengan nilai fakultas yang dipilih
      if (fakultasValue === "Teknologi Informasi") {
        var sistemInformasi = document.createElement("option");
        sistemInformasi.value = "Sistem Informasi";
        sistemInformasi.text = "Sistem Informasi";
        jurusan.add(sistemInformasi);
      
      } else if (fakultasValue === "Ilmu Sosial dan Ilmu Politik") {
        var administrasiPublik = document.createElement("option");
        administrasiPublik.value = "Administrasi Publik";
        administrasiPublik.text = "Administrasi Publik";
        jurusan.add(administrasiPublik);
        var ilmuKomunikasi = document.createElement("option");
        ilmuKomunikasi.value = "Ilmu Komunikasi";
        ilmuKomunikasi.text = "Ilmu Komunikasi";
        jurusan.add(ilmuKomunikasi);
        var administrasiBisnis = document.createElement("option");
        administrasiBisnis.value = "Administrasi Bisnis";
        administrasiBisnis.text = "Administrasi Bisnis";
        jurusan.add(administrasiBisnis);
      
      } else if (fakultasValue === "Psikologi") {
        var psikologi = document.createElement("option");
        psikologi.value = "Psikologi";
        psikologi.text = "Psikologi";
        jurusan.add(psikologi);
      
      } else if (fakultasValue === "Teknik") {
        var teknikMesin = document.createElement("option");
        teknikMesin.value = "Teknik Mesin";
        teknikMesin.text = "Teknik Mesin";
        jurusan.add(teknikMesin);
        var teknikIndustri = document.createElement("option");
        teknikIndustri.value = "Teknik Industri";
        teknikIndustri.text = "Teknik Industri";
        jurusan.add(teknikIndustri);
      
      } else if (fakultasValue === "Ekonomi dan Bisnis") {
        var ekonomiPembagunan = document.createElement("option");
        ekonomiPembagunan.value = "Ekonomi Pembagunan";
        ekonomiPembagunan.text = "Ekonomi Pembagunan";
        jurusan.add(ekonomiPembagunan);
      
      }

    }
  </script>    
	
	<button type="submit" name="submit">Ubah Data</button>
  
  </form>
  </div>
</body>
</html>
