<form action="<?php echo base_url();?>kategori/create_save" method="post">
  <div class="form-group">
    <label for="kategori_nama">Nama Kategori</label>
    <input type="text" class="form-control" id="kategori_id" placeholder="Nama Kategori" name="nama">
  </div>
  <div class="form-group">
    <label for="kategori_keterangan">Keterangan Kategori</label>
    <input type="text" class="form-control" id="berita_id" placeholder="Keterangan Kategori" name="keterangan">
  </div>
  <button type="submit" class="btn btn-default" id="button-submit">Submit</button>
</form>