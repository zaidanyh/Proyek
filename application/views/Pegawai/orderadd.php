<div class="col-md-8 mt-3 mx-auto">
  <div class="card card-user">
    <div class="card-header col-md-12">
      <h5 class="card-title text-center">Tambah Pesanan</h5>
    </div>
    <div class="card-body">
      <?= form_open('Pegawai/addJobProcess');?>
        <div class="row">                   
          <div class="col-md-3 pl-3 ml-5">
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
          <div class="col-md-5 pr-1 ml-5">
            <div class="form-group">
              <label>Merk Sepatu</label>
              <input type="text" name="sepatu" class="form-control" placeholder="Merk Sepatu">
            </div>
          </div>
          <div class="col-md-4 pr-1">
            <div class="form-group">
              <label>Atas Nama</label>
              <input type="text" name="nama" class="form-control" placeholder="Atas Nama">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-2 ml-5">
            <div class="form-group">
              <label>Size</label>
                <select name="size" class="form-control p-1">
                  <option value="36">36</option>
                  <option value="37">37</option>
                  <option value="38">38</option>
                  <option value="39">39</option>
                  <option value="40">40</option>
                  <option value="41">41</option>
                  <option value="42">42</option>
                  <option value="43">43</option>
                  <option value="44">44</option>
                  <option value="45">45</option>
                  <option value="46">46</option>
                </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Pesanan</label>
              <select name="pesanan" class="form-control p-1">
                <option value="Fast Clean">Fast Clean</option>
                <option value="Deep Clean">Deep Clean</option>
              </select>
            </div>
          </div>
          <div class="col-md-3 px-1">
            <div class="form-group">
              <label>Total</label>
              <input type="number" name="total" class="form-control" placeholder="Total">
            </div>
          </div>
        </div>
        <div class="row col-md-12">
          <div class="mx-auto mb-2">
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
              <th>Size</th>
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
                <td><?=$key['size']?></td>
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
