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
				<img src="<?php echo base_url() ?>assets/zerotype/images/logo.png" alt="Img" width="100px">
				<?php foreach ($tableData as $key => $value) {?>
				<h2><?php echo ($value->nama); ?></h2>
				<p>
					Kompetensi Keahlian Teknik Mekatronika merupakan Kompetensi Keahlian di bawah Bidang Studi Keahlian Teknologi dan Rekayasa. Dimana para Peserta Didik akan dibekali ilmu tentang Kelistrikan, Elektronika, Permesinan, Kontrol Mekanik,CNC dan Robotic.
				</p>
				<?php } ?>
			</div>
			
			<div>
				<img src="<?php echo base_url() ?>assets/zerotype/images/logo.png" alt="Img" width="100px">
				<h2>Rekayasa Perangkat Lunak</h2>
				<p>

					Kompetensi Keahlian Teknik Mekatronika merupakan Kompetensi Keahlian di bawah Bidang Studi Keahlian Teknologi dan Rekayasa. Dimana para Peserta Didik akan dibekali ilmu tentang Kelistrikan, Elektronika, Permesinan, Kontrol Mekanik,CNC dan Robotic.
				</p>
				
			</div>
			
			<div>
				<img src="<?php echo base_url() ?>assets/zerotype/images/logo.png" alt="Img" width="100px">
				<h2>Multimedia</h2>
				<p>

					Kompetensi Keahlian Teknik Mekatronika merupakan Kompetensi Keahlian di bawah Bidang Studi Keahlian Teknologi dan Rekayasa. Dimana para Peserta Didik akan dibekali ilmu tentang Kelistrikan, Elektronika, Permesinan, Kontrol Mekanik,CNC dan Robotic.
				</p>
				
			</div>
			
			<div>
				<img src="<?php echo base_url() ?>assets/zerotype/images/logo.png" alt="Img" width="100px">
				<h2>Animasi</h2>
				<p>

					Kompetensi Keahlian Teknik Mekatronika merupakan Kompetensi Keahlian di bawah Bidang Studi Keahlian Teknologi dan Rekayasa. Dimana para Peserta Didik akan dibekali ilmu tentang Kelistrikan, Elektronika, Permesinan, Kontrol Mekanik,CNC dan Robotic.
				</p>
				
			</div>
			
			<div>
				<img src="<?php echo base_url() ?>assets/zerotype/images/logo.png" alt="Img" width="100px">
				<h2>Kimia Industri</h2>
				<p>

					Kompetensi Keahlian Teknik Mekatronika merupakan Kompetensi Keahlian di bawah Bidang Studi Keahlian Teknologi dan Rekayasa. Dimana para Peserta Didik akan dibekali ilmu tentang Kelistrikan, Elektronika, Permesinan, Kontrol Mekanik,CNC dan Robotic.
				</p>
				
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