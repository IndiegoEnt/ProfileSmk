<!DOCTYPE HTML>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>  
    <?php
        echo($header);
    ?>
	<style>
		#map{
			border:1px solid;
		}
	</style>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCufeXeQ-TsgDuKviyAOcZaSf0HuKOYo90"></script>
<script type="text/javascript" src="<?php echo base_url() ?>ProfileSmk/assets/gmaps/gmaps.js"></script>

</head>
<body>
	<div id="header">
        
        <?php
            echo($nav);
        ?>

	</div>
	<div id="contents">
		<div class="section">
			<h1>Alamat</h1>
			<table>
				<div>
				Jl. Kamarung KM. 1,5 No. 69 RT. 02/05 Ds. Nyalindung
				</div>
				<div>
				Kelurahan Citeureup - Cimahi Utara 40512
				</div>
				<div>
				Kota Cimahi
				</div>
				<div>
				Telp./Fax. (022) 665 6088
				</div>
			</table>
			
		</div>
		<div class="section">
			<div id="map" style="height:380px;"></div>
		</div>
	</div>
	<div id="footer">
		<?php
            echo($foot);
        ?>
	</div>	
<script>
$(document).ready(function () {
	new GMaps({
	div: '#map',
	lat: -12.043333,
	lng: -77.028333
	});
})

</script>
</body>
</html>