<form action="<?php echo base_url();?>kategori/edit_save" method="post">
  <div class="form-group">
    <label for="kategori_nama">Nama Kategori</label>
    <input type="text" class="form-control" id="nama" placeholder="Nama Kategori" value="<?php echo ($kategoriModel->nama); ?>" name="nama" readonly>
    <input type="hidden" value="<?php echo ($kategoriModel->id); ?>" name="id">
  </div>
  <div class="form-group">
    <label for="kategori_keterangan">Keterangan Kategori</label>
    <textarea class="form-control" id="kategori_keterangan" placeholder="Keterangan Kategori" name="keterangan" style="height:200px;"></textarea>
  </div>
  <button type="submit" class="btn btn-default" id="button-submit">Submit</button>
</form>