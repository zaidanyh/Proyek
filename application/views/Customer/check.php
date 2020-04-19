<div class="container" style="padding-top: 8%; ">
	<h4 class="text-center p-3">Check Your Shoes</h4>
	<div class="row col-md-12">
		<img src="<?=base_url('assets/image/1.png')?>" width="15%" style="position: absolute; left:43%">
		<div class="col-md-12">
			<div class="col-md-4 mx-auto">
			<form action="" method="post" style="padding-top: 65%">
    			<div class="input-group no-border">
      				<input id="input" type="text" name="keyword" value="<?=set_value("keyword")?>" class="form-control text-center" placeholder="Code" style="border-radius: 20px;">
				</div>
				<div class="input-group mt-3">
					<input id="result" type="submit" value="Search" class="form-control btn btn-primary btn-sm" style="border-radius: 20px">
				</div>
  			</form>
			</div>
		</div>
		<?php
		if (empty($shoes)) { ?>
		<div class="col-md-12 mt-3">
			<div class="col-md-5 alert alert-danger alert-dismissible fade show mx-auto text-center">
            	<button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                	<i class="nc-icon nc-simple-remove"></i>
            	</button>
				<span class="pl-5"><b>Result Not Found</b><br></span>
				<span class="pl-5">Try input another codes</span>
			</div>
		</div>
		<?php } else {
		foreach ($shoes as $key) { ?>
		<div class="col-md-12">
			<div class="col-md-6 mx-auto">
				<div id="card" class="card-body">				
					<div class="alert alert-primary alert-dismissible fade show">
						<button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
							<i class="nc-icon nc-simple-remove"></i>
						</button>
						<div class="col-md-12">
							<h6 class="text-center pl-5 pb-3">Result Search</h6>
						</div>
						<table class="ml-2">
							<tbody>
								<tr>
									<td width="100"><h6>Kode</h6></td>
									<td><?=$key['kode_pesanan']?></td>
								</tr>
								<tr>
									<td><h6>Nama</h6></td>
									<td><?=$key['atasnama']?></td>
								</tr>
								<tr>
									<td><h6>Sepatu</h6></td>
									<td><?=$key['nama_sepatu']?></td>
								</tr>
								<tr>
									<td><h6>Ukuran</h6></td>
									<td><?=$key['size']?></td>
								</tr>
								<tr>
									<td><h6>Pesanan</h6></td>
									<td><?=$key['nama_pesanan']?></td>
								</tr>
								<tr>
									<td><h6>Tanggal</h6></td>
									<td><?=$key['tgl_pesanan']?></td>
								</tr>
								<tr>
									<td><h6>Status</h6></td>
									<td>
									<?php if ($key['status'] == "waiting") {?>
										<a class="badge-lg badge-pill badge-danger text-white"><i>Sepatu anda masih dalam antrian</i></a>
									<?php } elseif ($key['status'] == "in progress") { ?>
										<a class="badge-lg badge-pill badge-warning"><i>Sepatu anda sedang dikerjakan</i></a>
									<?php } else { ?>
                	   					<a class="badge-lg badge-pill badge-success text-white"><i>Sepatu anda dapat diambil</i></a>
									<?php }?>
									</td>
								</tr>
								<?php } }?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	resultHide();
	
	if (document.getElementById("input").value == "") {
		resultHide();
	} else {
		document.getElementById("result").
		addEventListener("click", resultShow());
	}

	function resultHide() {
		document.getElementById("card").style.display = "none";
	}
	function resultShow() {
		document.getElementById("card").style.display = "block";
	}
</script>