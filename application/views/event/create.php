
<style>
  .kv-file-upload{
    display:none;
  }
</style>
<form action="<?php echo base_url();?>/event/create_save" method="post"  enctype="multipart/form-data">
  <?php if($role == 'ROLE_ADMIN') { ?>
  <div class="form-group">
    <label for="event_type">Jenis Event</label>
    <select class="form-control" id="event_type" name="event_type" required>
        <option value="" >Pilih Jenis Berita</option>
        <option value="EVENT_SEKOLAH" >Sekolah</option>
        <option value="EVENT_JURUSAN" >Jurusan</option>
    </select>
  </div> 
  <div class="form-group" id="jurusanContainer">
    <label for="jurusan_id">Jurusan </label>
    <select class="form-control" id="jurusan" name="jurusan_id" >
        <option value="" >Pilih Jurusan</option>
        <?php foreach($jurusans as $key => $val) { ?>
          <option value="<?php echo $val->id; ?>" ><?php echo $val->nama; ?></option>
        <?php } ?>
    </select>
  </div>
  <?php } ?>
  <div class="form-group">
    <label for="nama">Nama Event</label>
    <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" required>
  </div>
  <div class="form-group">
    <label for="keterangan">Keterangan</label>
    <textarea type="text" class="form-control" id="keterangan" placeholder="keterangan" name="keterangan" required></textarea>
  </div>
  <div class="form-group" >
    <label class="control-label">Cover</label>
    <input id="input-1" name="file[]" type="file" multiple class="file-loading">
    <div id="errorBlock" class="help-block"></div>
  </div>
  </br>
  </br>

  
  

  <button type="submit" class="btn btn-default" id="button-submit">Submit</button>
</form>

<script>
    $("form").validate();
    $('#event_type').change(function() {
        if($(this).val() != 'EVENT_JURUSAN'){
            $('#jurusanContainer').hide();
            $('#jurusan').prop('required' , false)
        }else{
            $('#jurusanContainer').show();
            $('#jurusan').prop('required' , true)
        }
    })
    $('#event_type').change();
    CKEDITOR.replace( 'keterangan' );
    $("#input-1").fileinput({
        showUpload: false,
        showBrowse: false,
        uploadUrl: '/',
        maxFilePreviewSize: 10240
    });
    $('#kategoris').on('itemAdded', function(event) {
      $('#kategori_container').val($(this).val())
    }).on('itemRemoved', function(event) {
      $('#kategori_container').val($(this).val())
    });
    
</script>