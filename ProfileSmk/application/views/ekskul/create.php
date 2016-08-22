<form action="<?php echo base_url();?>ekskul/create_save" method="post"  enctype="multipart/form-data">
  <div class="form-group">
    <label for="ekskul_type">Jenis Ekskul</label>
    <select class="form-control" id="ekskul_type" name="ekskul_type" required>
        <option value="" >Pilih Jenis Ekskul</option>
        <option value="Ekskul Sekolah" >Sekolah</option>
        <option value="Ekskul Jurusan" >Jurusan</option>
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
  <div class="form-group">
    <label for="nama">Nama Ekskul</label>
    <input type="text" class="form-control" id="nama" placeholder="Nama Ekskul" name="nama" required>
  </div>
  <div class="form-group">
    <label for="keterangan">Keterangan</label>
    <textarea type="text" class="form-control" id="keterangan" placeholder="keterangan" name="keterangan" required></textarea>
  </div>
  
  <button type="submit" class="btn btn-default" id="button-submit">Submit</button>
</form>

<script>
    $("form").validate();
    $('#ekskul_type').change(function() {
        if($(this).val() != 'Ekskul Jurusan'){
            $('#jurusanContainer').hide();
            $('#jurusan').prop('required' , false)
        }else{
            $('#jurusanContainer').show();
            $('#jurusan').prop('required' , true)
        }
    })
    $('#ekskul_type').change();
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
        browseClass: "btn btn-primary btn-block",
        showCaption: false,
        showRemove: false,
        showUpload: false
    });
    
</script>