<nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
  <div class="container-fluid">
    <div class="navbar-wrapper">
      <p class="navbar-brand">My Job</p>
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
                <th>Sepatu</th>
                <th>Size</th>
                <th>Pesanan</th>
                <th>Action</th>
              </thead>
              <tbody>
                <?php
                $i = 1;
                foreach ($list as $key) {?>
                <tr>
                  <td><?=$i?></td>
                  <td><?=$key['nama_sepatu']?></td>
                  <td><?=$key['size']?></td>
                  <td><?=$key['nama_pesanan']?></td>
                  <td>
                    <form action="" method="post">
                      <input type="hidden" name="status" value="in progress">
                      <input type="hidden" name="username" value="<?=$this->session->userdata('username')?>">
                      <button type="submit" class="badge badge-success p-2"><i class="fa fa-check"></i> Take it</button>
                    </form>
                  </td>
                </tr>
                <?php $i++;}?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
         