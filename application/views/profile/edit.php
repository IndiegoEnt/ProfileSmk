<form action="<?php echo base_url();?>/profile/edit_save" method="post"  enctype="multipart/form-data">
    <input type="hidden" value="<?php echo ($profileModel->id); ?>" name="id">  
  <div class="form-group">
    <label for="isi">Content</label>
    <textarea class="form-control" id="isi" placeholder="Masukkan Profile..." name="isi" style="height:200px;" required><?php echo ($profileModel->isi); ?></textarea>
  </div>
  
  <button type="submit" class="btn btn-default" id="button-submit">Submit</button>
</form>

<script>
	CKEDITOR.replace( 'isi' );
    $("#input-1").fileinput({
        browseClass: "btn btn-primary btn-block",
        showCaption: false,
        showRemove: false,
        showUpload: false
    });

</script>