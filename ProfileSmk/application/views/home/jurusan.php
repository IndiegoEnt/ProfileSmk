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
		<div class="features">
			<h1>Jurusan</h1>
			<div>
				
				<?php foreach ($tableData as $key => $value) {?>
				<img src="<?php echo base_url() ?>upload/<?php echo $value->image ?>" alt="Img" width="150px" style=""><br>
				<h2><?php echo ($value->nama); ?></h2><br>
				
					<?php echo ($value->isi); ?><br>
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