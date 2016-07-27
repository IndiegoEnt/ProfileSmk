  <div class="row">
    <div class="col-lg-6">
      <h2><?php echo($title);?></h2>
    </div> 
    <div class="col-lg-6">
      <h2 class="pull-right"><a class="btn btn-primary" href="<?php echo base_url();?>Jurusan/create">Tambah</a> </h2>
    </div> 
  </div>
  <div class="table-responsive">
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Nama</th>
        <th>User ID</th>
        <th>Created Date</th>    
        <th>Updated Date</th>
        <th>Status</th>
        <th width="150px">Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($tableData as $key => $value) { ?>
      <tr>
        <td><?php echo ($key + 1);?></td>
        <td><?php echo ($value->nama);?></td>
        <td><?php echo ($value->user_id);?></td>
        <td><?php echo ($value->tanggal_buat);?></td>
        <td><?php echo ($value->tanggal_edit);?></td>
        <td><?php echo ($value->active = "1" ? "Aktif" :  "Tidak Aktif" );?></td>
        <td>
          <div><a class="btn btn-warning" href="<?php echo base_url();?>Jurusan/edit/<?php echo $value->id;?>">Edit</a> <a class="btn btn-danger"  href="<?php echo base_url();?>jurusan/delete/<?php echo $value->id;?>">Delete</a></td>
      </tr>
    <?php }?>
    </tbody>
  </table>
  </div>