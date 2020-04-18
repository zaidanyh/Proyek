<nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
  <div class="container-fluid">
    <div class="navbar-wrapper">
      <p class="navbar-brand">Order List</p>
    </div>
    <a class="btn btn-primary btn-round" href="<?=base_url('Pegawai/addOrder')?>">ADD ORDER</a>
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
                <th>Status</th>
                <th>Pencuci</th>
              </thead>
              <?php 
              $i = 1;
              foreach ($OrderList as $key) { ?>
              <tbody>
                <tr>
                  <td><?=$i?></td>
                  <td><?=$key['kode_pesanan']?></td>
                  <td><?=$key['atasnama']?></td>
                  <td><?=$key['nama_sepatu']?></td>
                  <td><?=$key['size']?></td>
                  <td><?=$key['nama_pesanan']?></td>
                  <td><?=$key['total']?></td>
                  <td><?=$key['tgl_pesanan']?></td>
                  <td>
                    <?php
                      if ($key['status'] == "waiting") { ?>
                        <a class="badge badge-danger p-1">waiting</a>
                    <?php
                      } else if ($key['status'] == "in progress") { ?>
                        <a class="badge badge-warning p-1">in progress</a>
                    <?php
                      } else { ?>
                        <a class="badge badge-success p-1">finished</a>
                    <?php
                      }
                    ?>
                  </td>
                  <td><?=$key['username']?></td>
                </tr>
              </tbody>
              <?php $i++;} ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

