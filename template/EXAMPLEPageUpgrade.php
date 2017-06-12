<!-- ================= Page Pilih Paket Upgrade ======================= -->
<?php

?>

<form class="container" action="<?php plugins_url('upgradeweb.php',__FILE__);?>" method="post">

	<div class="row">
		<div class="col-md-4">
			<ul>
				<div class="paket">
					<li>Paket Starter</li>
				</div>
				<div class="pharga">
					<li><b>Rp.700.000,-</b><br>
						setara Rp.2.000,- perhari</li>
				</div>
				<div class="lradio">
					<li>
						<div class="rad">
							<input class="disnone" type="radio" value=" Rp 700.000,- " name="rd" id="post1">
							<label for="post1">Pilih Paket</label>
						</div>
					</li>
				</div>
			</ul>
		</div>
			<div class="col-md-4">
				<ul>
					<div class="paket">
						<li>Paket Profesional</li>
					</div>
					<div class="pharga">
						<li><b>Rp.2.000.000,-</b><br>
							setara Rp 5.555,- perhari</li>
						</div>
						<div class="lradio">

							<li>
								<div class="rad">
									<input checked class="disnone" type="radio" value=" Rp 2.000.000,- " name="rd" id="post2">
									<label for="post2">Pilih Paket</label>
								</div>
							</li>
						</div>

					</ul>
				</div>
		<div class="col-md-4">
			<ul>
				<div class="paket">
					<li>Paket Bisnis</li>
				</div>
				<div class="pharga">
					<li><b>Rp.4.000.000,-</b><br>
						atau Rp.333.333,- perbulan</li>
				</div>
				<div class="lradio">

					<li>
						<div class="rad">
							<input class="disnone" type="radio" value=" Rp 4.000.000,- " name="rd" id="post3">
							<label for="post3">Pilih Paket</label>
						</div>
					</li>
				</div>
			</ul>
		</div>
	</div><br>
				<div ">
					<label>Masukan Nomor Telepon </label><br>
					<div >
					<input  type="number" name="hp" value="<?= $hp; ?>">
					</div>
					<input type="submit" name="upgrade" value="Upgrade">
				</div>
			</form>

