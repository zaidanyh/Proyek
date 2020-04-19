<nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
  <div class="container-fluid">
    <div class="navbar-wrapper">
      <p class="navbar-brand">Transaction Complete</p>
    </div>
  </div>
</nav>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive" style="max-height: 442px;">
            <table class="table">
              <thead class=" text-primary">
                <th>No</th>
                <th>Name</th>
                <th>Order</th>
                <th>Shoes</th>
                <th>Size</th>
                <th>Total</th>
                <th>Transaction</th>
                <th>Received</th>
                <th>Pencuci</th>
                <th>Pegawai</th>
              </thead>
              <tbody>
                <?php 
                $no = 1;
                foreach ($transaction as $key) { ?>
                  <tr>
                    <td><?=$no?></td>
                    <td><?=$key['atasnama']?></td>
                    <td><?=$key['nama_pesanan']?></td>
                    <td><?=$key['nama_sepatu']?></td>
                    <td><?=$key['size']?></td>
                    <td><?=$key['total']?></td>
                    <td><?=$key['tgl_transaksi']?></td>
                    <td><?=$key['tgl_terima']?></td>
                    <td><?=$key['washer']?></td>
                    <td><?=$key['username']?></td>
                  </tr>
                <?php $no++;}?>
              </tbody>
            </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>