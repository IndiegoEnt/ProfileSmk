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
			<h1>Berita</h1>
			<ul class="news">
				<?php foreach ($tableData as $key => $value) {?>
				<li>
					<div class="date">
						<p>
							<span></span>
							<?php echo ($value->tanggal_buat); ?>
						</p>
					</div>
					<h2><?php echo ($value->judul); ?> <span><?php echo ($value->username); ?></span></h2>
					<p>
						<img src="<?php echo base_url();?>upload/<?php echo $value->image?>" width="100px"><?php echo ($value->isi); ?><span><a href="post.html" class="more">Read More</a></span>
					</p>
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