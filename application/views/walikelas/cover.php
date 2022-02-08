<html>

<head>
  <title><?= $title; ?></title>
  <link rel="stylesheet" href="<?= base_url('assets/plugins/');?>bootstrap/css/printer.css">
</head>

<body onload="window.print()">
  <h1 align=center>RAPORT SISWA <br>SEKOLAH MENENGAH PERTAMA <br> SMP MUHAMMADIYAH 1 SEYEGAN</h1>
  <center><br><br><br>
    <img width='200px' src='<?= base_url('assets/dist/img/');?>logo_ueu.png'><br><br><br><br><br><br>
    Nama Siswa :<br>
    <h3 style='border:1px solid #000; width:82%; padding:6px'><?= $tsiswa['nama_siswa']; ?></h3><br><br>

    NISN<br>
    <h3 style='border:1px solid #000; width:82%; padding:3px'><?php echo $tsiswa['nisn']; ?></h3>
    <br><br><br><br><br><br>

    <p style='font-size:22px'>KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN <br>REPUBLIK INDONESIA</p>
  </center>
</body>

</html>