<form action="<?php echo base_url();?>galeri/create_save" method="post"  enctype="multipart/form-data">
  <div class="form-group">
    <label for="galery_type">Jenis Galery</label>
    <select class="form-control" id="galery_type" name="galery_type" required>
        <option value="" >Pilih Jenis Ekskul</option>
        <option value="GALERY_GENERAL" >General</option>
        <option value="GALERY_EVENT" >Event</option>
    </select>
  </div> 
  <div class="form-group" id="eventContainer">
    <label for="event">Event </label>
    <select class="form-control" id="event" name="event_id" >
        <option value="" >Pilih Event</option>
        <?php foreach($events as $key => $val) { ?>
          <option value="<?php echo $val->id; ?>" ><?php echo $val->nama; ?></option>
        <?php } ?>
    </select>
  </div>
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
    $('#galery_type').change(function() {
        if($(this).val() != 'GALERY_EVENT'){
            $('#eventContainer').hide();
            $('#event').prop('required' , false)
        }else{
            $('#eventContainer').show();
            $('#event').prop('required' , true)
        }
    })
    $('#galery_type').change()
</script>