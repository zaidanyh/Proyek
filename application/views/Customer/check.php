<head>
  <meta charset="utf-8" />

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title><?=$title;?></title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="<?=base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" />
  <link href="<?=base_url('assets/css/paper-dashboard.css?v=2.0.0')?>" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?=base_url('assets/demo/demo.css')?>" rel="stylesheet" />
</head>

<div class="container" style="padding-top: 8%; ">
	<h4 class="text-center p-3">Check Your Shoes</h4>
	<div class="row col-md-15">
	<img src="<?=base_url('assets/image/1.png')?>" width="50" style="position: absolute; left: 48% ">
	
		<div class="col-md-4">
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
		
		
			

					<?php
					if (empty($shoes)) { ?>
					<div class="alert alert-danger alert-dismissible fade show" style="left: 33% ">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span>
                            <b>Result Not Found</b>  -  Try input another codes</span>
						</div>
						
						
						
						
					
					
					<?php } else {
					foreach ($shoes as $key) { ?>

						<div id="card" class="card-body">
				
				<div class="alert alert-primary alert-dismissible fade show">
				  <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
					<i class="nc-icon nc-simple-remove"></i>
				 	 </button>
				<div class="card-title text-center">
						<h6 class="p-2">Result Search</h6>
							</div>
				 	 <span>
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
							<td width="600px">
								<?php if ($key['status'] == "waiting") {?>
									<div class="card-body">
                       				 <div class="alert alert-danger">
                       		  	 	<span><i style="color:#000000">Sepatu anda masih dalam antrian</i></span>
                        			</div>
									
								<?php } elseif ($key['status'] == "in progress") { ?>
									<div class="card-body">
                       				 <div class="alert alert-warning">
                       		  	 	<span><i style="color:#000000">Sepatu anda sedang dikerjakan</i></span>
									</div>
									
								<?php } else { ?>
									<div class="card-body">
                       				 <div class="alert alert-success">
                       		  	 	<span><i style="color:#000000">Sepatu anda dapat diambil</i></span>
									</div>

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