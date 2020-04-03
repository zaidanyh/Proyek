<nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
  <div class="container-fluid">
    <div class="navbar-wrapper">
      <p class="navbar-brand">List Job</p>
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
                foreach ($Job as $key) { ?>
                <tr>
                  <td><?=$i?></td>
                  <td><?=$key['nama_sepatu']?></td>
                  <td><?=$key['size']?></td>
                  <td><?=$key['nama_pesanan']?></td>
                  <td>
                    <a type="button" class="badge badge-pill badge-danger text-white p-2" data-toggle="modal" 
                      data-target="#confirm<?=$key['register_id']?>"><i class="fa fa-plus"></i> Take it</a>
                  </td>
                </tr>
                <?php $i++;}?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <?php foreach ($Job as $key) { ?>
        <div class="modal fade" id="confirm<?=$key['register_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirm Take Job</h5>
              </div>
              <form action="" method="post">
              <div class="modal-body">
                <p>Apakah Anda Yakin Mengambil Job Ini?</p>
                <input type="hidden" name="status" value="in progress">
                <input type="hidden" name="username" value="<?=$this->session->userdata('username')?>">
                <input type="hidden" name="idku" value="<?=$key['register_id']?>">
              </div>
              <div class="modal-footer">
                <input type="submit" name="submit" class="btn btn-success" value="OK">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      <?php }?>
    </div>
  </div>
</div>
         