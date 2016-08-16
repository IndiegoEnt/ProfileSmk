            <div class="post">
			<div class="date">
				<p>
					<span><?php echo substr(($profileModel->tanggal_buat),8,2)?></span>
					<?php echo substr(($profileModel->tanggal_buat),0,7)?>
				</p>
			</div>
			<h1><?php echo($profileModel->profile_type == 'PROFILE_JURUSAN' ? $profileModel->nama : 'Sekolah' ); ?> <span class="author">Created : <?php echo($profileModel->tanggal_buat ); ?></span></h1>
			<br>
            <?php echo($profileModel->isi)?>
			<span><a href="<?php echo base_url();?>Profile" class="more">Back to Profile</a></span>
		</div>