<div class="content">
  <div class="col-md-10 mx-auto">
    <div class="card card-user">
      <div class="card-header">
        <h5 class="card-title pl-5">Edit Pesanan</h5>
      </div>
      <form action="" method="POST">
      <div class="card-body">
        <div class="row">                   
          <div class="col-md-4 ml-5">
            <div class="form-group">
              <label>Atas Nama</label>
              <input type="text" name="nama" class="form-control" placeholder="Atas Nama" value="<?=$get->atasnama?>">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Pesanan</label>
              <select name="pesanan" class="form-control p-1" aria-selected="<?=$get->nama_pesanan?>">
                <option value="Fast Clean">Fast Clean</option>
                <option value="Deep Clean">Deep Clean</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 ml-5">
            <div class="form-group">
              <label>Merk Sepatu</label>
              <input type="text" name="sepatu" class="form-control" placeholder="Merk Sepatu" value="<?=$get->nama_sepatu?>">
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label>Size</label>
                <input type="number" name="size" class="form-control" placeholder="Total" value="<?=$get->size?>">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>Total</label>
              <input type="number" name="total" class="form-control" placeholder="Total" value="<?=$get->total?>">
            </div>
          </div>
        </div>

        <div class="row mb-3 col-md-12">
          <div class="mt-3 mx-auto">
            <input class="btn btn-primary btn-round" name="submit" type="submit" value="Update">
          </div>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>