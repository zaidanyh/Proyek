<nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
  <div class="container-fluid">
    <div class="navbar-wrapper">
      <p class="navbar-brand">Check Order</p>
    </div>
  </div>
  <form action="" method="post" class="col-md-4">
    <div class="input-group no-border">
      <input type="text" name="keyword" value="<?=set_value("keyword")?>" class="form-control" placeholder="Search...">
      <div class="input-group-append">
        <div class="input-group-text">
          <i class="nc-icon nc-zoom-split"></i>
        </div>
      </div>
    </div>
  </form>
</nav>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>Kode</th>
                <th>Nama</th>
                <th>Pesanan</th>
                <th>Sepatu</th>
                <th>Size</th>
                <th>Total</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Pencuci</th>
              </thead>
              <tbody>
                <?php 
                foreach ($check as $key) {?>
                <tr>
                  <td><?=$key['kode_pesanan']?></td>
                  <td><?=$key['atasnama']?></td>
                  <td><?=$key['nama_pesanan']?></td>
                  <td><?=$key['nama_sepatu']?></td>
                  <td><?=$key['size']?></td>
                  <td><?=$key['total']?></td>
                  <td><?=$key['tgl_pesanan']?></td>
                  <td>
                    <a class="badge badge-warning p-2"><?=$key['status']?></a>
                  </td>
                  <td><?=$key['username']?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

