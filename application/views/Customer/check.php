<div class="container" style="padding-top: 8%; ">
	<h4 class="text-center p-3">Check Your Shoes</h4>
	<div class="row col-md-12">
		<div class="col-md-4">
			<img src="<?=base_url('assets/image/1.png')?>" width="200" style="position: absolute; right: 0; ">
		</div>
		<div class="col-md-4">
			<form action="" method="post" class="col-md-12" style="margin-top: 19%">
    			<div class="input-group no-border">
      				<input id="input" type="text" name="keyword" value="<?=set_value("keyword")?>" class="form-control text-center" placeholder="Code" style="border-radius: 20px;">
				</div>
				<div class="input-group mt-3">
					<input id="result" type="submit" value="Search" class="form-control btn btn-primary btn-sm" style="border-radius: 20px">
				</div>
  			</form>
		</div>
		<div class="col-md-4 mt-3">
			<div id="card" class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
				<div class="card-title text-center" style="border-bottom: 1px solid #f0f0f0">
					<h6 class="p-2">Result Search</h6>
				</div>
				<table class="ml-3">
					<tbody>
					<?php
					if (empty($shoes)) { ?>
						<div class="col-md-12">
							<p class="text-center text-muted"><i>Result Not Found</i></p>
						</div>
					<?php } else {
					foreach ($shoes as $key) { ?>
					
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
									<?=$key['status']?><br><i>(menunggu proses)</i>
								<?php } elseif ($key['status'] == "in progress") { ?>
									<?=$key['status']?><br><i>(sedang dikerjakan)</i>
								<?php } else { ?>
									<?=$key['status']?><br><i>(sudah bisa diambil)</i>
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