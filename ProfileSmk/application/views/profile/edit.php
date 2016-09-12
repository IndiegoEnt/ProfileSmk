<form action="<?php echo base_url();?>/profile/edit_save" method="post"  enctype="multipart/form-data">
    <input type="hidden" value="<?php echo ($profileModel->id); ?>" name="id">  
  <div class="form-group">
    <label for="isi">Content</label>
    <textarea class="form-control" id="isi" placeholder="Masukkan Profile..." name="isi" style="height:200px;" required><?php echo ($profileModel->isi); ?></textarea>
  </div>
  <div class="form-group" style="max-width: 300px;">
    <label class="control-label">Logo</label>
    <input id="input-1" type="file" class="file" name="logo">
  </div>
  <button type="submit" class="btn btn-default" id="button-submit">Submit</button>
</form>

<script>
	CKEDITOR.replace( 'isi' );
	$("#input-1").fileinput({
        initialPreview: [
            '<?php echo base_url();?>upload/<?php echo ($profileModel->logo); ?>'
        ],
        initialPreviewAsData: true,
        browseClass: "btn btn-primary btn-block",
        showCaption: false,
        showRemove: false,
        showUpload: false
    });

</script>