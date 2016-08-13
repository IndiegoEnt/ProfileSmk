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
	<div id="slider">
		<div >
			<div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden; visibility: hidden;">
				<!-- Loading Screen -->
				<div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
					<div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
					<div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
				</div>
				<div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden;">
					<div data-p="225.00" style="display: none;">
						<img data-u="image" src="<?php echo base_url() ?>assets/zerotype/images/red.jpg" />
					</div>
					<div data-p="225.00" style="display: none;">
						<img data-u="image" src="<?php echo base_url() ?>assets/zerotype/images/purple.jpg" />
					</div>
					<div data-p="225.00" data-po="80% 55%" style="display: none;">
						<img data-u="image" src="<?php echo base_url() ?>assets/zerotype/images/blue.jpg" />
					</div>
					<a data-u="add" href="http://www.jssor.com" style="display:none">Jssor Slider</a>
				
				</div>
				<!-- Bullet Navigator -->
				<div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
					<!-- bullet navigator item prototype -->
					<div data-u="prototype" style="width:16px;height:16px;"></div>
				</div>
				<!-- Arrow Navigator -->
				<span data-u="arrowleft" class="jssora22l" style="top:0px;left:12px;width:40px;height:58px;" data-autocenter="2"></span>
				<span data-u="arrowright" class="jssora22r" style="top:0px;right:12px;width:40px;height:58px;" data-autocenter="2"></span>
			</div>
		</div>
	</div>

	<div id="separator">
	</div>
	
	<div id="contents">
		<div id="tagline" class="clearfix">
			<div class="main-tagline">
			<h1>Profile Sekolah</h1>
			
				<p><img src="<?php echo base_url() ?>assets/zerotype/images/logo.png" alt="Img" width="100px">
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
					<p>
						<?php echo ($value->isi);?>
					</p>
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