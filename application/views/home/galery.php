<!DOCTYPE HTML>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>  
    <?php
        echo($header);
    ?>
<script type="text/javascript" src="<?php echo base_url() ?>assets/photoswipe/dist/photoswipe.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/photoswipe/dist/photoswipe.css"></link>

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
				
				<?php foreach ($galeriModel as $key => $value) {?>
						<img src="<?php echo base_url();?>upload/<?php echo $value->image?>" width="200px">
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