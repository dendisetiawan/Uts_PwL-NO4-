<?php
require_once 'models/Produk.php';
//ciptakan object dari class Produk
$obj = new Produk();
//panggil method tampilkan data
$rs = $obj->dataProduk();
?>
<h3>Data Pegawai</h3>
<?php
if(isset($member)){
?>
<a href="index.php?hal=formProduk" class="btn btn-primary">Tambah</a>
<?php } ?>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">id</th>
      <th scope="col">Nama</th>
      <th scope="col">Alamat</th>
      <th scope="col">Divisi</th>
      <th scope="col">Agama</th>
      <th scope="col">email</th>
      <th scope="col">No.Telepone</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $no = 1;
  foreach($rs as $prod){  
  ?>
    <tr>
      <td><?= $no; ?></td>
      <td><?= $prod['id']; ?></td>
      <td><?= $prod['Nama']; ?></td>
      <td><?= $prod['Alamat']; ?></td>
      <td><?= $prod['Divisi']; ?></td>
      <td><?= $prod['Agama']; ?></td>
      <td><?= $prod['email']; ?></td>
      <td><?= $prod['No.telepone']; ?></td>
      
      <form method="POST" action="controllers/produkController.php">
      <a href="index.php?hal=detailProduk&id=<?= $prod['id']; ?>"
         class="btn btn-info">Detail</a>
      <?php
      $role = $member['role'];
      if(isset($member)){
      ?>   
      <a href="index.php?hal=formEditProduk&id=<?= $prod['id']; ?>"
         class="btn btn-warning">Ubah</a>
         <?php
          if($role != 'staff'){
          ?> 
        <button name="proses" value="hapus"
         onclick="return confirm('Anda Yakin Data diHapus?')"
         class="btn btn-danger">Hapus</button>
        <?php } ?>
         <input type="hidden" name="idx" value="<?= $prod['id']; ?>" />
         <?php } ?> 
      </form>   
      </td>
    </tr>
  <?php 
  $no++;
  }
  ?>  
  </tbody>
</table>