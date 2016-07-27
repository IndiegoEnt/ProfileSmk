<form action="<?php echo base_url();?>/kategori_berita/create_save" method="post">
  <div class="form-group">
    <label for="kategori_id">Id Kategori</label>
    <input type="text" class="form-control" id="kategori_id" placeholder="Id Kategori" name="kategori_id">
  </div>
  <div class="form-group">
    <label for="berita_id">Id Berita</label>
    <input type="text" class="form-control" id="berita_id" placeholder="Id Berita" name="berita_id">
  </div>
  <button type="submit" class="btn btn-default" id="button-submit">Submit</button>
</form>