  <div class="row">
    <div class="col-lg-6">
      <h2><?php echo($title);?></h2>
    </div> 
    <div class="col-lg-6">
      <h2 class="pull-right"><a class="btn btn-primary" href="<?php echo base_url();?>ekskul/create">Tambah</a> </h2>
    </div> 
  </div>
  <div class="table-responsive">
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Tipe Ekskul</th>
        <th>Id Jurusan</th>
        <th>Nama Ekskul</th>
        <th>Keterangan</th>
        <th>Tanggal Buat</th>
        <th>Tanggal Edit</th>
        <th>Id User</th>
        <th width="150px">Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($tableData as $key => $value) { ?>
      <tr>
        <td><?php echo ($key + 1);?></td>
        <td><?php echo ($value->ekskul_type);?></td>
        <td><?php echo ($value->jurusan_id);?></td>
        <td><?php echo ($value->nama);?></td>
        <td><?php echo ($value->keterangan);?></td>
        <td><?php echo ($value->tanggal_buat);?></td>
        <td><?php echo ($value->tanggal_edit);?></td>
        <td><?php echo ($value->user_id);?></td>
        <td>
          <div><a class="btn btn-warning" href="<?php echo base_url();?>Ekskul/edit/<?php echo $value->id;?>">Edit</a> <a class="btn btn-danger"  href="<?php echo base_url();?>ekskul/delete/<?php echo $value->id;?>">Delete</a></td>
      </tr>
    <?php }?>
    </tbody>
  </table>
  </div>