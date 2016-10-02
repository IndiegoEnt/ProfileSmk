<form action="<?php echo base_url();?>/guru/edit_save" method="post">
  <div class="form-group">
    <label for="nip">NIP</label>
    <input type="text" class="form-control" id="nip" placeholder="NIP" value="<?php echo ($guruModel->nip); ?>" name="nip" readonly>
    <input type="hidden" value="<?php echo ($guruModel->id); ?>" name="id">
  </div>
  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" class="form-control" id="nama" placeholder="Nama"  value="<?php echo ($guruModel->nama); ?>" name="nama" required>
  </div>
  <div class="form-group">
    <label for="pelajaran">Pelajaran</label>
    <input type="text" class="form-control" id="pelajaran" placeholder="Pelajaran"  value="<?php echo ($guruModel->pelajaran); ?>" name="pelajaran" required>
  </div>
  <div class="form-group">
    <label for="jabatan">Jabatan</label>
    <input type="text" class="form-control" id="jabatan" placeholder="Jabatan"  value="<?php echo ($guruModel->jabatan); ?>" name="jabatan" required>
  </div>
  <button type="submit" class="btn btn-default" id="button-submit">Submit</button>
</form>