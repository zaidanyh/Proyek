<div class="content">
  <div class="row">
    <div class="col-md-4 mt-2">
      <div class="card card-user">
        <div class="image">
          <img src="<?=base_url('assets/img/damir-bosnjak.jpg')?>" alt="...">
        </div>
        <div class="card-body">
          <div class="author">
            <img class="avatar rounded-circle" src="<?=base_url('uploads/user/'.$user->foto)?>">
            <h5 class="title"><?=$user->nama_lengkap?></h5>
          </div>
        </div>
      </div>      
    </div>
    <div class="col-md-8">
      <div class="card card-user">
        <div class="card-header">
          <h5 class="card-title ml-3">Edit Profile</h5>
        </div>
        <div class="card-body">
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-5 pr-1">
                <div class="form-group">
                  <label>Company Branch</label>
                  <input type="text" class="form-control" placeholder="Company" value="Point Care Malang" disabled>
                </div>
              </div>
              <div class="col-md-3 px-1">
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control" value="<?=$user->username?>" disabled>
                </div>
              </div>
              <div class="col-md-4 pl-1">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="email" class="form-control" placeholder="Email" value="<?=$user->email?>">
                </div>
              </div>
            </div>
              
            <div class="row">
              <div class="col-md-6 pr-1">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="fullname" class="form-control" placeholder="Fullname" value="<?=$user->nama_lengkap?>">
                </div>
              </div>
              <div class="col-md-6 pl-1">
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Password">
                  <input type="hidden" name="old_password" value="<?=$user->password?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-5">
                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" name="alamat" class="form-control" placeholder="Address" value="<?=$user->alamat?>">
                </div>
              </div>
              <div class="col-md-4">
                  <label>Foto</label>
                  <input type="hidden" name="foto_lama" value="<?=$user->foto?>">
                  <input type="file" name="foto" class="mt-1">
              </div>
            </div>
            <div class="row">
              <div class="ml-auto mr-auto">
                <input class="btn btn-primary btn-round" name="submit" type="submit" value="Update">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>