       <div class="post">
			<h1><?php echo($beritaModel->judul ); ?> 
			<span class="author">Oleh : <?php echo($beritaModel->nama_user ? $beritaModel->nama_user : "-"  ); echo(" "); echo($beritaModel->tanggal_buat ); ?></span></h1>
			<br>
			<div class="image">
			sadjaskldja
			</div>
            <?php echo($beritaModel->isi)?>
			<span><a href="post.html" class="more">Back to News</a></span>
		</div>