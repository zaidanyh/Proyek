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
        <div class="card-header">
          <a class="btn btn-primary btn-round" href="<?=base_url('Pegawai/addOrder')?>">ADD ORDER</a>
        </div>
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
                </tr>
                <?php $i++;} ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>