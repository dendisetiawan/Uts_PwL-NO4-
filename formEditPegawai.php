<?php
require_once 'pegawai.php';
$ar_status = ['Baru','lama'];
$obj = new Pegawai();
$rs = $obj->datapegawai();
$id = $_REQUEST['id'];
$data_edit = $obj->getPegawai($id);
?>

<h3>Form Pegawai</h3>
<form method="POST" action="controllers/produkController.php">
  <div class="form-group row">
    <label for="kode" class="col-4 col-form-label">id</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-address-card"></i>
          </div>
        </div> 
        <input id="kode" name="kode" value="<?= $data_edit['kode'] ?>" type="text" class="form-control" required="required">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Nama </label> 
    <div class="col-8">
      <input id="nama" name="nama" value="<?= $data_edit['nama'] ?>" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Alamat</label> 
    <div class="col-8">
    <?php
    $no = 0;
    foreach($ar_Alamat as $Alamat){
    //edit kondisi
    $cek = ($data_edit['Alamat'] == $Alamat) ? "checked" : "";    
    ?>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="Alamat" id="Alamat_<?= $no ?>" type="radio" class="custom-control-input" value="<?= $kondisi?>" <?= $cek ?> required="required"> 
        <label for="Alamat_<?= $no ?>" class="custom-control-label"><?= $Alamat?></label>
      </div>
    <?php 
    $no++;
    } ?>
    </div>
  </div>
  <div class="form-group row">
    <label for="No.Telepon" class="col-4 col-form-label">No.Telepon</label> 
    <div class="col-8">
      <input id="No.Telepon" name="No.Telepon" value="<?= $data_edit['No.Telepon'] ?>" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="stok" class="col-4 col-form-label">Email</label> 
    <div class="col-8">
      <input id="email" name="email" type="text" value="<?= $data_edit['stok'] ?>" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="No.Telepon" class="col-4 col-form-label">No.Telepon</label> 
    <div class="col-8">
      <select id="No.Telepon" name="No.Telepon" class="custom-select" required="required">
        <option value="">-- Pilih agama --</option>
        <?php
        foreach($rs as $j){
        //edit jenis
        $sel = ($data_edit['idagama'] == $j['id']) ? "selected" : ""; 
        ?>
            <option value="<?= $j['id'] ?>" <?= $sel ?>> <?= $j['nama'] ?> </option>
        <?php } ?>    
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="foto" class="col-4 col-form-label">Foto</label> 
    <div class="col-8">
      <input id="foto" name="foto" value="<?= $data_edit['foto'] ?>" type="text" class="form-control">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="proses" type="submit" value="ubah" class="btn btn-primary">Ubah</button>
      <input type="hidden" name="idx" value="<?= $id ?>" />
    </div>
  </div>
</form>