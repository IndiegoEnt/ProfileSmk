  <div class="row">
    <div class="col-lg-6">
      <h2><?php echo($title);?></h2>
    </div> 
    <div class="col-lg-6">
      <h2 class="pull-right"><a class="btn btn-primary" href="<?php echo base_url();?>kategori/create">Tambah</a> </h2>
    </div> 
  </div>
  <div class="table-responsive">
  <table class="table table-bordered table-hover" id="myTable">
    <thead>
      <tr>
        <th>#</th>
        <th>Nama Kategori</th>
        <th>Keterangan</th>
        <th width="150px">Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($tableData as $key => $value) { ?>
      <tr>
        <td><?php echo ($key + 1);?></td>
        <td><?php echo ($value->nama);?></td>
        <td><?php echo ($value->keterangan);?></td>
        <td>
          <div><a class="btn btn-warning" href="<?php echo base_url();?>kategori/edit/<?php echo $value->id;?>">Edit</a> <a class="btn btn-danger"  href="<?php echo base_url();?>kategori/delete/<?php echo $value->id;?>">Delete</a></td>
      </tr>
    <?php }?>
    </tbody>
  </table>
   <script>
    $(document).ready(function(){
        $('#myTable').DataTable();
    });
  </script>