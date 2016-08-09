<form action="<?php echo base_url();?>galeri/edit_save" method="post"  enctype="multipart/form-data">
    <input type="hidden" value="<?php echo ($galeriModel->id); ?>" name="id"> 
  <div class="form-group">
    <label for="nama">Nama Galeri</label>
    <input type="text" class="form-control" id="nama" placeholder="Nama Galeri" name="nama" required value="<?php echo ($galeriModel->nama); ?>">
  </div>
  <div class="form-group">
    <label for="keterangan">Keterangan</label>
    <textarea type="text" class="form-control" id="keterangan" placeholder="Keterangan" name="keterangan" required><?php echo ($galeriModel->keterangan); ?></textarea>
  </div>
  <div class="form-group" style="max-width: 300px;">
    <label class="control-label">Gambar</label>
    <input id="input-1" type="file" class="file" name="image">
  </div>
  <div class="form-group">
  <?php 
    if(($galeriModel->tampilkan) == 1){
     $chk = "checked";
    }else{
      $chk = "";
    }
  ?>
    <input type="checkbox" name="tampilkan" id="tampilkan" value="1" <?php echo $chk; ?>> Tampilkan
  </div> 
  <button type="submit" class="btn btn-default" id="button-submit">Submit</button>
</form>

<script>
    $("form").validate();
    //$('#tampilkan').val('<?php echo ($galeriModel->tampilkan); ?>');

    CKEDITOR.replace( 'keterangan' );
    $("#input-1").fileinput({
        initialPreview: [
            '<?php echo base_url();?>upload/<?php echo ($galeriModel->image); ?>',
        ],
        initialPreviewAsData: true,
        browseClass: "btn btn-primary btn-block",
        showCaption: false,
        showRemove: false,
        showUpload: false
    });
    
</script>