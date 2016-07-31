  <div class="row">
    <div class="col-lg-6">
      <h2><?php echo($title);?></h2>
    </div> 
    <div class="col-lg-6">
      <h2 class="pull-right"><a class="btn btn-primary" href="<?php echo base_url();?>/berita/create">Tambah</a> </h2>
    </div> 
  </div>
  <table class="table table-bordered table-hover" id="myTable">
    <thead>
      <tr>
        <th>Cover</th>
        <th>Judul</th>
        <th>Created Date</th>    
        <th>Updated Date</th>
        <th width="150px">Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($tableData as $key => $value) { ?>
      <tr>
        <td><?php echo ($value->image);?></td>
        <td><?php echo ($value->judul);?></td>
        <td><?php echo ($value->tanggal_buat);?></td>
        <td><?php echo ($value->tanggal_edit);?></td>
        <td>
          <div><a class="btn btn-warning" href="<?php echo base_url();?>/berita/edit/<?php echo $value->id;?>">Edit</a> <a class="btn btn-danger"  href="<?php echo base_url();?>/berita/delete/<?php echo $value->id;?>">Delete</a></td>
      </tr>
    <?php }?>
    </tbody>
  </table>

  <script>
    $(document).ready(function(){
        $('#myTable').DataTable();
    });
  </script>