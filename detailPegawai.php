<?php
require_once 'detailpegawai.php';
$id = $_REQUEST['id'];
$obj = new pegawai();
$rs = $obj->getdetailpegawai($id);
?>
<div class="card" style="width: 18rem;">
  <?php
  $gambar = (!empty($rs['foto'])) ? $rs['foto'] : "no_image.jpg";
  ?>
  <img src="images/<?= $gambar ?>" width="40%" class="card-img-top">
  <div class="card-body">
    <h5 class="card-title"><?= $rs['nama'] ?></h5>
    <p class="card-text">
        Id  : <?= $rs['kode'] ?>
        <br/>Nama: <?= $rs['kondisi'] ?>
        <br/>Alamat : RP. <?= number_format($rs['alamat'],0,',','.') ?>
        <br/>Nip : <?= $rs['Nip'] ?>
        <br/>Divisi: <?= $rs['Divisi'] ?>
        <br/>email: <?= $rs['email'] ?>
        <br/>No.telepon: <?= $rs['No.telepon'] ?>
    </p>
    <a href="index.php?hal=dataProduk" class="btn btn-primary">kembali</a>
  </div>
</div>