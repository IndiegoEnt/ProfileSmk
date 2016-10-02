<style>

.post {
	width: 785px;
	margin: 0 auto;
	
	padding-top:10px;
	padding-bottom:10px;
}
.post div.image{
	float:left;
	padding-right:10px;
	width: 200px; 
    word-break: break-all;

}
.post h1 {
	padding-top: 12px;
}

#contents {
	min-height: 510px;
	width: 880px;
	margin: 0 auto;
	padding: 54px 40px;
}
h1 {
	color: #3e3e3e;
	font-size: 30px;
	font-weight: normal;
	line-height: 30px;
	margin: 0 0 30px;
}
h2 {
	color: #2c2c2c;
	font-size: 24px;
	font-weight: normal;
	line-height: 24px;
	margin: 0 0 12px;
}
p {
	color: #585858;
	font-size: 16px;
	line-height: 24px;
	margin: 0 0 30px;
}
p a {
	color: #585858;
}

#tagline > .main-tagline {
	float: left;
	width: 584px;
	margin: 0 20px;
}
#tagline > .second-tagline {
	float: left;
	width: 216px;
	margin: 0 20px;
}

#tagline > .second-tagline ul, .news {
	list-style: none;
	margin: 0;
	padding: 0;
}

#contents .features {
	width: 810px;
	margin: 0 auto;
}
.features > div {
	display: inline-block;
	margin: 0 0 30px;
}
.features > h1 {
	border-bottom: 1px solid #eee;
	padding-bottom: 10px;
}
.features > div img {
	float: left;
	margin-right: 20px;
}
.date {
	float: left;
	height: 78px;
	width: 70px;
	margin-right: 20px;
	border: 1px solid #d5d5d5;
	text-align: center;
}
.date p {
	margin: 12px 0 0;
}
.date p span {
	display: block;
	font-size: 30px;
	margin-bottom: 6px;
}
.author {
	color: #585858;
	display: block;
	font-size: 12px;
}
.more {
	background-color: #727272;
	color: #fff;
	display: inline-block;
	font-size: 14px;
	line-height: 30px;
	width: 100px;
	text-align: center;
	text-decoration: none;
}
.more:hover, .message input[type='submit']:hover {
	background-color: #f99600;
	color: #000;
}

</style>
	<div class="post">
			<h1><?php echo($beritaModel->judul ); ?> 
			<span class="author">Oleh : <?php echo($beritaModel->nama_user ? $beritaModel->nama_user : "-"  ); echo(" "); echo($beritaModel->tanggal_buat ); ?></span></h1>
			<div class="image">
				<img src="<?php echo base_url() ?>upload/<?php echo $beritaModel->image?>" alt="Img" width="200px">
			</div>
            <?php echo($beritaModel->isi)?>
			<span><a href="<?php echo $backUrl ?>" class="more">Back to News</a></span>
	</div>	   