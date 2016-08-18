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
	
	<div id="contents">
		<div class="main">
			<h1>Event</h1>
			<ul class="news">
				<?php foreach ($tableData as $key => $value) {?>
				<li>
					<div class="date">
						<p>
							<span></span>
							<?php echo ($value->tanggal_buat); ?>
						</p>
					</div>
					<h2><?php echo ($value->nama); ?></h2>
					
					<div class='beritaThumb'>
					<div class="image">
						<img src="<?php echo base_url();?>upload/<?php echo $value->image?>" width="200px">
					</div>
					<?php echo ($value->keterangan); ?>
					</div>
					<div class="beritaAksi">
					<span>
						<a href="<?php echo base_url();?>home/view_berita_home/<?php echo $value->id;?>" class="more">Read More</a>
					</span>
					</div>
					
				</li>
				<?php } ?>
			</ul>
			<div class="news-nav">
				<div class="next item">
					Next <i class="fa fa-arrow-right" aria-hidden="true"></i>
				</div>
				<div class="prev item">
					 <i class="fa fa-arrow-left" aria-hidden="true"></i> Prev
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