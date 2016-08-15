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
				
				<?php foreach ($galeriModel as $key => $value) {?>
                <?php var_dump($value);?>
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