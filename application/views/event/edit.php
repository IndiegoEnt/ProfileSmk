<form action="<?php echo base_url();?>/event/edit_save" method="post"  enctype="multipart/form-data">
    <input type="hidden" value="<?php echo ($eventModel->id); ?>" name="id">
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
    <label for="judul">Nama </label>
    <input type="text" class="form-control" id="nama" placeholder="nama" name="nama" required value="<?php echo ($eventModel->nama); ?>">
  </div>
  <div class="form-group">
    <label for="keterangan">Keterangan</label>
    <textarea type="text" class="form-control" id="keterangan" placeholder="keterangan" name="keterangan" required > <?php echo ($eventModel->keterangan); ?></textarea>
  </div>
  <div class="form-group" >
    <label class="control-label">Cover</label>
    <input id="input-1" type="file" class="files[]" multiple name="files[]">
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
    $('#event_type').val('<?php echo ($eventModel->event_type); ?>');
    $('#event_type').change();
    $('#jurusan').val('<?php echo ($eventModel->jurusan_id); ?>');
    $('#username').change(function(){
      $.ajax({
        url:'<?php echo base_url();?>/users/check_username/'+ $('#username').val(),
        success : function(data){
          if(JSON.parse(data).status == 1 ){
            $('#username-duplicate-error').show();
            $('#button-submit').prop('disabled', true);
          }else{
            $('#username-duplicate-error').hide();
            $('#button-submit').prop('disabled', false);
          }
        }
      })
    });
    CKEDITOR.replace( 'keterangan' );
    $("#input-1").fileinput({
        initialPreview: [
            <?php 
            if($event_galery){
            foreach ($event_galery as $key => $value) {
              echo ("'".base_url()."upload/". $value->image . "'," );
            }}
            ?>
        ],
        initialPreviewAsData: true,
        browseClass: "btn btn-primary btn-block",
        showCaption: false,
        showRemove: false,
        showUpload: false
    });
</script>