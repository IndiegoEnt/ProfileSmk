<form action="<?php echo base_url();?>galeri/create_save" method="post"  enctype="multipart/form-data">
  
  <div class="form-group">
    <label for="nama">Nama Galeri</label>
    <input type="text" class="form-control" id="nama" placeholder="Nama Galeri" name="nama" required>
  </div>
  <div class="form-group">
    <label for="keterangan">Keterangan</label>
    <textarea type="text" class="form-control" id="keterangan" placeholder="Keterangan" name="keterangan" required></textarea>
  </div>
  <div class="form-group" style="max-width: 300px;">
    <label class="control-label">Gambar</label>
    <input id="input-1" type="file" class="file" name="image">
  </div>
  <div class="form-group">
    <input type="checkbox" name="tampilkan" id="tampilkan" value="1"> Tampilkan
  </div> 
  <button type="submit" class="btn btn-default" id="button-submit">Submit</button>
</form>

<script>
    CKEDITOR.replace( 'keterangan' );
    $("#input-1").fileinput({
        browseClass: "btn btn-primary btn-block",
        showCaption: false,
        showRemove: false,
        showUpload: false
    });
</script>