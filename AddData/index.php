<?php
require '../DatabaseConn/DatabaseConn.php';

function tambahData($post) {
	global $conn;

	//ambil data dari setiap form 
	$nim = htmlspecialchars($post["nim"]);
	$nama = htmlspecialchars($post["nama"]);
	$tgllahir = htmlspecialchars($post["tgllahir"]);
	$alamat = htmlspecialchars($post["alamat"]);
	$email = htmlspecialchars($post["email"]);
	$notelp = htmlspecialchars($post["notelp"]);
	$fakultas = htmlspecialchars($post["fakultas"]);
	$jurusan = htmlspecialchars($post["jurusan"]);
  $result = mysqli_query($conn, "SELECT nim FROM regular WHERE nim = '$nim'"); 
  if (mysqli_fetch_assoc($result)) { 
    echo "<script> 
            alert ('nim sudah terisi');
            document.location.href =''; 
          </script> "; 
  }
// push ke database
	$query = "INSERT INTO regular 
				VALUES

			('$nim', 
			'$nama',
			'$tgllahir',
			'$alamat',
			'$email',
			'$notelp',
			'$fakultas',
			'$jurusan')
			";

mysqli_query($conn, $query);

return mysqli_affected_rows($conn);

}
// user klik tombol submit

if ( isset($_POST["submit"]) ) {

	// cek apakah data berhasil ditambah atau tidak
	if (tambahData($_POST) > 0 ){
			echo "
			<script>
			alert('data berhasil ditambahkan!');
			document.location.href = '../';
			</script>
		";	
		}	else { echo "
			<script>
			alert('data gagal ditambahkan!');
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
  <title>ADD DATA MAHASISWA</title>
</head>
<body style="background-image: url('https://mdbootstrap.com/img/Photos/new-templates/tables/img2.jpg');">
  <div class="form-container">
    <h3>TAMBAH DATA MAHASISWA</h3>

    <form action="" autocomplete="off" method="post">
      <label for="NIM">NIM</label>
      <input type="text" id="NIM" name="nim" placeholder="Nomor Induk Mahasiswa" required pattern="[0-9]{11}" inputmode="numeric" title="Masukkan tepat 11 angka">

      <label for="nama">Nama</label>
      <input type="text" id="nama" name="nama" placeholder="Masukkan Nama" required>

      <label for="tglLahir">Tanggal Lahir</label><p></p>
      <input type="date" id="tglLahir" name="tgllahir" placeholder="Masukkan Tanggal Lahir" value="1998-01-01"
       min="1998-01-01" max="2006-12-31"required><p></p>

      <label for="alamat">Alamat</label>
      <input type="text" id="alamat" name="alamat" placeholder="Masukkan Alamat" required>

      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Masukkan Email" required>

      <label for="notelp">No Telepon</label>
      <input type="tel" id="notelp" name="notelp" placeholder="Masukkan No Telepon" required>

      <label for="fakultas">Fakultas</label>
      <select id="fakultas" name="fakultas" onchange="labeljurusan()">
        <option value=""></option>
        <option value="Teknologi Informasi">Teknologi Informasi</option>
        <option value="Ilmu Sosial dan Ilmu Politik">Ilmu Sosial dan Ilmu Politik</option>
        <option value="Psikologi">Psikologi</option>
        <option value="Teknik">Teknik</option>
        <option value="Ekonomi dan Bisnis">Ekonomi dan Bisnis</option>
      </select>

      <label for="jurusan">Jurusan</label>
      <select id="jurusan" name="jurusan">
        <option value=""></option>
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
      <button type="submit" name="submit">Tambah Data</button>
    </form>
  </div>
</body>
</html>
