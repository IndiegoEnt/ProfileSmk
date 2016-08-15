  <div class="row">
    <div class="col-lg-6">
      <h2><?php echo($title);?></h2>
    </div> 
    <div class="col-lg-6">
      <h2 class="pull-right"><a class="btn btn-primary" href="<?php echo base_url();?>profile/create">Tambah</a> </h2>
    </div> 
  </div>
  <div class="table-responsive">
  <table class="table table-bordered table-hover" id="myTable">
    <thead>
      <tr>
        <th>#</th>
        <th>Jurusan</th>
        <th>Isi</th>
        <th>Created</th>    
        <th>Updated</th>
        <th width="150px">Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($tableData as $key => $value) { ?>
      <tr>
        <td><?php echo ($key + 1);?></td>
        <td><?php echo ($value->profile_type == 'PROFILE_JURUSAN' ? $value->nama_jurusan : 'Sekolah');?></td>
        <td><?php echo ($value->isi);?></td>
        <td><?php echo ($value->tanggal_buat);?></td>
        <td><?php echo ($value->tanggal_edit); ?> , <?php echo ($value->username);?></td>
        <td>
          <div><a class="btn btn-warning">Edit</a> <a class="btn btn-danger" href="<?php echo base_url();?>/profile/delete/<?php echo $value->id;?>">Delete</a></td>
      </tr>
    <?php }?>
    </tbody>
  </table>
  </div>
  <script>
    $(document).ready(function(){
        $('#myTable').DataTable();
    });
  </script>