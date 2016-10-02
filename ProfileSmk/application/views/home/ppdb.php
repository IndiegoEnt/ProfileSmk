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
			<h1>Berita PPDB</h1>
			<ul class="news">
				<?php foreach ($tableData as $key => $value) {?>
				<li>
					<div class="date">
						<p>
							<span>
							<?php echo date( 'Y' , strtotime($value->tanggal_buat)  ); ?>
							</span>
							<?php echo date( 'm-d' , strtotime($value->tanggal_buat)  ); ?>
						</p>
					</div>
					<h2><?php echo ($value->judul); ?> <span><?php echo ($value->username); ?></span></h2>
					
					<div class='beritaThumb'>
					<div class="image">
						<img src="<?php echo base_url();?>upload/<?php echo $value->image?>" width="200px">
					</div>
					<?php echo ($value->isi); ?>
					</div>
					<div class="beritaAksi">
					<span>
						<a href="<?php echo base_url();?>home/view_ppdb_home/<?php echo $value->id;?>" class="more">Read More</a>
					</span>
					</div>
					
				</li>
				<?php } ?>
			</ul>
			<div class="news-nav">
				<?php if((($page) * 5 ) < $countData){?> 
				<div class="next item">
					<a href="<?php echo base_url();?>home/ppdb/<?php echo ($page + 1 )?>" style="text-decoration:none;color: inherit;">

						Next <i class="fa fa-arrow-right" aria-hidden="true"></i>
					</a>
				</div>
				<?php } ?>

				<?php if(($page - 1) > 0){?> 
				<div class="prev item">

					<a href="<?php echo base_url();?>home/ppdb/<?php echo ($page - 1 )?>" style="text-decoration:none;color: inherit;">
						<i class="fa fa-arrow-left" aria-hidden="true"></i> Prev
					<a>
				</div>
				<?php } ?>
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