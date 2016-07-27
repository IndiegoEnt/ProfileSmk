  <div class="row">
    <div class="col-lg-6">
      <h2><?php echo($title);?></h2>
    </div> 
    <div class="col-lg-6">
      <h2 class="pull-right" href="<?php echo base_url();?>/kategori_berita/create"><a class="btn btn-primary">Tambah</a> </h2>
    </div> 
  </div>
  <div class="table-responsive">
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Id Kategori</th>
        <th>Id Berita</th>
       
        <th width="150px">Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($tableData as $key => $value) { ?>
      <tr>
        <td><?php echo ($key + 1);?></td>
        <td><?php echo ($value->kategori_id);?></td>
        <td><?php echo ($value->berita_id);?></td>
        
        <td>
          <div><a class="btn btn-warning">Edit</a> <a class="btn btn-danger">Delete</a>
        </td>
      </tr>
    <?php }?>
    </tbody>
  </table>
  </div>