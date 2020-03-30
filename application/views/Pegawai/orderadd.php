<div class="col-md-8 mt-3">
  <div class="card card-user">
    <div class="card-header">
      <h5 class="card-title ml-4">Tambah Pesanan</h5>
    </div>
    <div class="card-body">
      <?= form_open('Pegawai/addJobProcess');?>
        <div class="row">                   
          <div class="col-md-4 pl-3">
            <div class="form-group">
              <label>Kode Pesanan</label>
              <input type="text" name="kode" class="form-control" placeholder="Kode Pesanan">
            </div>
          </div>
          <div class="col-md-4 pl-1">
            <div class="form-group">
              <label for="date">Tgl Pesanan</label>
              <input type="date" name="tgl" class="form-control" placeholder="Tanggal">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-5 pr-1">
            <div class="form-group">
              <label>Merk Sepatu</label>
              <input type="text" name="sepatu" class="form-control" placeholder="Merk Sepatu">
            </div>
          </div>
          <div class="col-md-5 pr-1">
            <div class="form-group">
              <label>Atas Nama</label>
              <input type="text" name="nama" class="form-control" placeholder="Atas Nama">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 pr-1">
            <div class="form-group">
              <label>Pesanan</label>
              <select name="pesanan" class="form-control p-1">
                <option value="Fast Clean">Fast Clean</option>
                <option value="Deep Clean">Deep Clean</option>
              </select>
            </div>
          </div>
          <div class="col-md-4 px-1">
            <div class="form-group">
              <label>Total</label>
              <input type="number" name="total" class="form-control" placeholder="Total">
            </div>
          </div>
          <div class="ml-3 mt-3">
            <input type="submit" name="submit" class="btn btn-primary btn-round" value="Add Job">
          </div>
        </div>
      <?=form_close();?>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title ml-4">List Order Newly</h4>
        </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>Kode</th>
              <th>Nama</th>
              <th>Sepatu</th>
              <th>Pesanan</th>
              <th>Tanggal</th>
              <th>Total</th>
              <th>Action</th>
            </thead>
            <tbody>
              <?php foreach ($ListOrder as $key) {?>
              <tr>
                <td><?=$key['kode_pesanan']?></td>
                <td><?=$key['atasnama']?></td>
                <td><?=$key['nama_sepatu']?></td>
                <td><?=$key['nama_pesanan']?></td>
                <td><?=$key['tgl_pesanan']?></td>
                <td><?=$key['total']?></td>
                <td>
                  <a href="<?=base_url()?>Pegawai/editJob/<?=$key['register_id']?>" class="badge badge-primary p-2">
                    <i class="fa fa-edit"></i> Edit
                  </a>
                </td>
              </tr>
              <?php }?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
