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
			<h1>Ekskul</h1>
			<ul class="news">
				<?php foreach ($tableData as $key => $value) {?>
				<li>
					
					<h1><?php echo ($value->nama); ?></h1>
					
					<div class='beritaThumb'>
						<h3><?php echo ($value->nama_jurusan); ?></h3>
					<?php echo ($value->keterangan); ?>
					</div>
					<div class="beritaAksi">
					</div>
					
				</li>
				<?php } ?>
			</ul>
			
		</div>
	</div>
	<div id="footer">
		<?php
            echo($foot);
        ?>
	</div>
</body>
</html>