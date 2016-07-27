<form action="<?php echo base_url();?>/jurusan/edit_save" method="post">
  <div class="form-group">
    <label for="nama">Username</label>
    <input type="text" class="form-control" id="nama" placeholder="Nama" value="<?php echo ($jurusanModel->nama); ?>" name="nama">
    <input type="hidden" value="<?php echo ($jurusanModel->id); ?>" name="id">
  </div>
  <div class="form-group">
    <label for="user_id">Nama</label>
    <input type="text" class="form-control" id="user_id" placeholder="name"  value="<?php echo ($jurusanModel->user_id); ?>" name="user_id">
  </div>
  
  <button type="submit" class="btn btn-default" id="button-submit">Submit</button>
</form>