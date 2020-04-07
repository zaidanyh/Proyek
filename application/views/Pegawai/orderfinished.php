<nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
  <div class="container-fluid">
    <div class="navbar-wrapper">
      <p class="navbar-brand">Order Finished</p>
    </div>
  </div>
</nav>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Sepatu</th>
                <th>Size</th>
                <th>Pesanan</th>
                <th>Total</th>
                <th>Tanggal</th>
                <th>Pencuci</th>
                <th class="text-center">Action</th>
              </thead>
              <tbody>
                <?php 
                $i = 1;
                foreach ($finished as $key) {?>
                <tr>
                  <td><?=$i?></td>
                  <td><?=$key['kode_pesanan']?></td>
                  <td><?=$key['atasnama']?></td>
                  <td><?=$key['nama_sepatu']?></td>
                  <td><?=$key['size']?></td>
                  <td><?=$key['nama_pesanan']?></td>
                  <td><?=$key['total']?></td>
                  <td><?=$key['tgl_pesanan']?></td>
                  <td><?=$key['username']?></td>
                  <td>
                      <a href="" class="badge badge-success p-2" data-toggle="modal" 
                      data-target="#popup<?=$key['register_id']?>"><i class="fa fa-check"></i> Completing</a>
                  </td>
                </tr>
                <?php $i++;} ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php foreach ($finished as $key) {?>
  <div class="modal fade" id="popup<?=$key['register_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Transaksi</h5>
        </div>
        <div class="modal-body">
          <p>Apakah Anda ingin Menyelesaikan Transaksi?</p>
          <?=form_open('Pegawai/transaction')?>
            <input type="hidden" name="nama" value="<?=$key['atasnama']?>">
            <input type="hidden" name="pesanan" value="<?=$key['nama_pesanan']?>">
            <input type="hidden" name="sepatu" value="<?=$key['nama_sepatu']?>">
            <input type="hidden" name="size" value="<?=$key['size']?>">
            <input type="hidden" name="total" value="<?=$key['total']?>">
            <input type="hidden" name="tanggal" value="<?=$key['tgl_pesanan']?>">
            <input type="hidden" name="pencuci" value="<?=$key['username']?>">
            <input type="hidden" name="pegawai" value="<?=$key['pegawai']?>">
            <input type="hidden" name="idku" value="<?=$key['register_id']?>">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" data-toggle="modal">OK</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          <?=form_close();?>
        </div>
      </div>
    </div>
  </div>
  <?php }?>
</div>
