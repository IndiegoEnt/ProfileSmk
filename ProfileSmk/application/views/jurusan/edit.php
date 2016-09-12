<form action="<?php echo base_url();?>/jurusan/edit_save" method="post">
  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" class="form-control" id="nama" placeholder="Nama" value="<?php echo ($jurusanModel->nama); ?>" name="nama">
    <input type="hidden" value="<?php echo ($jurusanModel->id); ?>" name="id">
  </div>
  <button type="submit" class="btn btn-default" id="button-submit">Submit</button>
</form>