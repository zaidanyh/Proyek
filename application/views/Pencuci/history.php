<nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
  <div class="container-fluid">
    <div class="navbar-wrapper">
      <p class="navbar-brand">History My Job</p>
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
              <thead class="text-primary fixed">
                <th>No</th>
                <th>Sepatu</th>
                <th>Size</th>
                <th>Pesanan</th>
                <th>Status</th>
              </thead>
              <tbody>
                <?php 
                $i = 1;
                foreach ($history as $key) {?>
                <tr>
                  <td><?=$i?></td>
                  <td><?=$key['nama_sepatu']?></td>
                  <td><?=$key['size']?></td>
                  <td><?=$key['nama_pesanan']?></td>
                  <td><i class="fa fa-check text-primary" style="font-size: 14pt"></i></td>
                </tr>  
                <?php $i++; }?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>