<nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
  <div class="container-fluid">
    <div class="navbar-wrapper">
      <p class="navbar-brand">My History</p>
    </div>
  </div>
</nav>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive" style="max-height: 443px">
            <table class="table">
              <thead class=" text-primary">
                <th>Name Customer</th>
                <th>Order Name</th>
                <th>Shoes</th>
                <th>Size</th>
                <th>Total</th>
                <th>Finish</th>
                <th>Washer</th>
                <th>Status</th>
              </thead>
              <tbody>
                <?php 
                foreach ($data as $key) {?>
                <tr>
                  <td><?=$key['atasnama']?></td>
                  <td><?=$key['nama_pesanan']?></td>
                  <td><?=$key['nama_sepatu']?></td>
                  <td><?=$key['size']?></td>
                  <td><?=$key['total']?></td>
                  <td><?=$key['tgl_terima']?></td>
                  <td><?=$key['washer']?></td>
                  <td>
                      <a class="text-primary"><i class="fa fa-check"></i> Complete</a>
                  </td>
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