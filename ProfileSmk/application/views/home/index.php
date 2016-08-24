<!DOCTYPE HTML>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>  
    <?php
        echo($header);
    ?>

</head>
<body>
	<div id="header">
        
        <?php
            echo($nav);
        ?>

	</div>
	

	<div id="separator">
	</div>
	
	<div id="contents">
		<div id="tagline" class="clearfix">
			<div class="main-tagline">
			<h1>Profile Sekolah</h1>
			
				<p><img src="<?php echo base_url() ?>ProfileSmk/assets/zerotype/images/logo.png" alt="Img" width="100px">
					<?php foreach ($tableData as $key => $value) {
						echo ($value->isi);
					}

						?>
				</p>
			</div>
			<div class="second-tagline">
				<h1>Berita Terkini</h1>
				<ul class="posts">
				<?php foreach ($beritaData as $key => $value) {?>
				<li>
					<h4 class="title"><a href="<?php echo base_url();?>home/view_berita_home/<?php echo $value->id;?>"><?php echo ($value->judul);?></a></h4>
					<div class="beritaThumb">
						<?php echo ($value->isi);?>
					</div>
					<div class="beritaAksi">
					<span>
					<a href="<?php echo base_url();?>home/view_berita_home/<?php echo $value->id;?>" class="more">Read More</a></span>
					<span>
					</div>
				</li>
				<?php } ?>
			</ul>
		</div>
			</div>
		</div>
	</div>
	<div id="footer">
		<?php
            echo($foot);
        ?>
	</div>
</body>
</html>