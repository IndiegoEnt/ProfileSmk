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

	 <div class="post">
			<h1><?php echo($beritaModel->judul ); ?> 
			<span class="author">Oleh : <?php echo($beritaModel->nama_user ? $beritaModel->nama_user : "-"  ); echo(" "); echo($beritaModel->tanggal_buat ); ?></span></h1>
			<div class="image">
				<img src="<?php echo base_url() ?>upload/<?php echo $beritaModel->image?>" alt="Img" width="200px">
			</div>
            <?php echo($beritaModel->isi)?>
			<span><a href="<?php echo base_url() ?>home/berita" class="more">Back to News</a></span>
	</div>	   

	<div id="footer">
		<?php
            echo($foot);
        ?>
	</div>
</body>
</html>