<nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
  <div class="container-fluid">
    <div class="navbar-wrapper">
      <p class="navbar-brand">User List</p>
    </div>
    <a type="button" class="badge badge-pill badge-primary p-3 m-3 text-white" data-toggle="modal" data-target="#addUser">
      <i class="fa fa-user-plus"></i> Add Worker
    </a>
  </div>
</nav>
<div class="content">
  <div class="row col-md-12">
    <div class="col-md-6">
      <div class="card mt-3">
        <div class="card-header">
          <div class="row col-md-12">
            <h6 class="mt-2 col-md-6">Pegawai/Admin</h6>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive" style="max-height: 379px;">
            <table class="table">
              <thead class=" text-primary">
                <th class="text-left">Username</th>
                <th>Fullname</th>
                <th class="text-center">email</th>
              </thead>
              <tbody>
                <?php foreach ($hasilPegawai as $key) { ?>
                <tr>      
                  <td><a type="button" data-toggle="modal" data-target="#detail<?=$key['username']?>"><?=$key['username']?></a></td>
                  <td><a type="button" data-toggle="modal" data-target="#detail<?=$key['username']?>"><?=$key['nama_lengkap']?></a></td>
                  <td><a type="button" data-toggle="modal" data-target="#detail<?=$key['username']?>"><?=$key['email']?></a></td>
                </tr>
                <?php }?>
              </tbody>
            </table>    
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card mt-3">
        <div class="card-header">
          <div class="row col-md-12">
            <h6 class="mt-2 col-md-5">Pencuci</h6>
          </div>          
        </div>
        <div class="card-body">
          <div class="table-responsive" style="max-height: 379px;">
            <table class="table">
              <thead class=" text-primary">
                <th class="text-left">Username</th>
                <th>Fullname</th>
                <th class="text-center">Email</th>
              </thead>
              <tbody>
                <?php foreach ($hasilPencuci as $key) { ?>
                <tr>      
                  <td><a type="button" data-toggle="modal" data-target="#washer<?=$key['username']?>"><?=$key['username']?></a></td>
                  <td><a type="button" data-toggle="modal" data-target="#washer<?=$key['username']?>"><?=$key['nama_lengkap']?></a></td>
                  <td><a type="button" data-toggle="modal" data-target="#washer<?=$key['username']?>"><?=$key['email']?></a></td>
                </tr>
                <?php }?>
              </tbody>
            </table>    
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel">Add User for Worker</h6>
        </div>
        <?=form_open('Manager/addUser')?>
        <div class="modal-body">
          <div class="row ml-3 mb-2">
            <div class="col-md-4">
              <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Username">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
              </div>
            </div>
          </div>
          <div class="row ml-3 mb-2">
            <div class="col-md-5">
              <div class="form-group">
                <label>Fullname</label>
                <input type="text" name="fullname" class="form-control" placeholder="Fullname">
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label>Address</label>
                <input type="text" name="alamat" class="form-control" placeholder="Address">
              </div>
            </div>
          </div>
          <div class="row ml-3 mb-1">
            <div class="col-md-5">
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Your Email">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>As :</label>
                <select name="level" class="form-control p-2">
                  <option value="pencuci">Pencuci</option>
                  <option value="pegawai">Pegawai/Admin</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" name="submit" class="btn btn-success" value="Submit" data-toggle="modal">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
        <?=form_close();?>
      </div>
    </div>
  </div>
  <?php foreach ($hasilPegawai as $key) { ?>
    <div class="modal fade" id="detail<?=$key['username']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detail Pegawai</h5>
          </div>
          <div class="modal-body" style="max-height: 400px;">
            <div class="row col-md-12">
              <div class="col-md-5" style="border-right: 1px solid #f3f3f3">
                <div class="row">
                  <div class="col-md-6">
                    <img class="rounded-circle" src="<?=base_url('uploads/user/'.$key['foto'])?>">
                  </div>
                  <div class="col-md-6">
                    <h6 style="color: midnightblue;"><i class="fa fa-id-badge"></i> Fullname</h6>
                    <p><?=$key['nama_lengkap']?></p>
                    <h6 style="color: midnightblue;"><i class="fa fa-user"></i> Username</h6>
                    <p><?=$key['username']?></p>
                    <h6 style="color: midnightblue;"><i class="fa fa-address-book"></i> Address</h6>
                    <p><?=$key['alamat']?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                  <h6 style="color: midnightblue;"><i class="fa fa-envelope"></i> Email : </h6>
                  </div>
                  <div class="col-md-9 pl-0">
                    <p><?=$key['email']?></p>
                  </div>
                </div>
              </div>
              <div class="col-md-7 my-auto">
                <div class="row col-md-12 mx-auto">
                  <div class="col-md-4">
                    <div class="card mt-3" style="background: springgreen">
                      <div class="card-header" style="border-bottom: 1px solid #fff">
                        <h6 class="text-center text-white">Transaction</h6>
                      </div>
                      <div class="card-body">
                        <h6 class="text-center text-white"><?=$key['transaksi']?></h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card mt-3 bg-primary">
                      <div class="card-header" style="border-bottom: 1px solid #fff">
                        <h6 class="text-center text-white">Income</h6>
                      </div>
                      <div class="card-body">
                        <h6 class="text-center text-white">Rp. <?=$key['total']?></h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  <?php }?>
  <?php foreach ($hasilPencuci as $key) { ?>
    <div class="modal fade" id="washer<?=$key['username']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detail Pencuci</h5>
          </div>
          <div class="modal-body" style="max-height: 400px;">
            <div class="row col-md-12">
              <div class="col-md-5" style="border-right: 1px solid #f3f3f3">
                <div class="row">
                  <div class="col-md-6">
                    <img class="rounded-circle" src="<?=base_url('uploads/user/'.$key['foto'])?>">
                  </div>
                  <div class="col-md-6">
                    <h6 style="color: midnightblue;"><i class="fa fa-id-badge"></i> Fullname</h6>
                    <p><?=$key['nama_lengkap']?></p>
                    <h6 style="color: midnightblue;"><i class="fa fa-user"></i> Username</h6>
                    <p><?=$key['username']?></p>
                    <h6 style="color: midnightblue;"><i class="fa fa-address-book"></i> Address</h6>
                    <p><?=$key['alamat']?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                  <h6 style="color: midnightblue;"><i class="fa fa-envelope"></i> Email : </h6>
                  </div>
                  <div class="col-md-9 pl-0">
                    <p><?=$key['email']?></p>
                  </div>
                </div>
              </div>
              <div class="col-md-7 my-auto">
                <div class="row">
                  <div class="col-md-3">
                    <div class="card mt-3" style="background: tomato">
                      <div class="card-header" style="border-bottom: 1px solid #fff">
                        <h6 class="text-center text-white">Progress</h6>
                      </div>
                      <div class="card-body">
                        <h6 class="text-center text-white"><?=$key['progress']?></h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="card mt-3" style="background: orange">
                      <div class="card-header" style="border-bottom: 1px solid #fff">
                        <h6 class="text-center text-white">Finished</h6>
                      </div>
                      <div class="card-body">
                        <h6 class="text-center text-white"><?=$key['finished']?></h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="card mt-3" style="background: springgreen">
                      <div class="card-header" style="border-bottom: 1px solid #fff">
                        <h6 class="text-center text-white">Complete</h6>
                      </div>
                      <div class="card-body">
                        <h6 class="text-center text-white"><?=$key['complete']?></h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  <?php }?>
</div>