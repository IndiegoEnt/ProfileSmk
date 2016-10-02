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

		<div>
			<h1>Directory Guru</h1>
			<table class="table table-bordered table-hover">
			    <thead>
			      <tr>
			        <th>No</th>
			        <th>NIP</th>
			        <th>Nama</th>
			        <th>Pelajaran</th>
			        <th>Jabatan</th>
			      </tr>
			    </thead>
			    <tbody>
			    <?php foreach ($tableData as $key => $value) { ?>
			      <tr>
			        <td><?php echo ( $key +  1);?></td>
			        <td><?php echo ($value->nip);?></td>
			        <td><?php echo ($value->nama);?></td>
			        <td><?php echo ($value->pelajaran);?></td>
			        <td><?php echo ($value->jabatan);?></td>
			      </tr>
			    <?php }?>
			    </tbody>
			</table>
		</div>
	</div>
	<div id="footer">
		<?php
            echo($foot);
        ?>
	</div>
</body>
</html>