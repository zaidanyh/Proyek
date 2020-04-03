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
                    <?php 
                    if ($key['status'] == "in progress") {?>
                      <a type="button" class="badge badge-pill badge-success p-2 text-white" data-toggle="modal" 
                      data-target="#mbuh<?=$key['register_id']?>"><i class="fa fa-check"></i> Finish it</a>
                    <?php
                    } else if ($key['status'] == "finished") { ?>
                      <a class="text-primary" style="font-size: 14pt"><i class="fa fa-check"></i></a>
                    <?php
                    }
                    ?>
                  </td>
                </tr>
                <?php $i++;}?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <?php foreach ($list as $key) { ?>
        <div class="modal fate" id="mbuh<?=$key['register_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Confirm Finish Job</h5>
              </div>
              <form action="" method="post">
              <div class="modal-body">
                <p>Apakah Anda Sudah Menyelesaikan Job Ini?</p>
                  <input type="hidden" name="status" value="finished">
                  <input type="hidden" name="username" value="<?=$this->session->userdata('username')?>">
                  <input type="hidden" name="idku" value="<?=$key['register_id']?>">
              </div>
              <div class="modal-footer">
                <input type="submit" name="update" class="btn btn-success" value="OK">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>
         