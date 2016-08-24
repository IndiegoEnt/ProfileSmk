<form action="<?php echo base_url();?>/profile/create_save" method="post"  enctype="multipart/form-data">
  <div class="form-group">
    <label for="profile_type">Profile Type</label>
    <select class="form-control" id="profile_type" name="profile_type" required>
        <option value="" >Pilih Jenis Profile</option>
        <option value="PROFILE_SEKOLAH" >Sekolah</option>
        <option value="PROFILE_JURUSAN" >Jurusan</option>
    </select>
  </div>

  <div class="form-group" id="jurusanContainer">
    <label for="jurusan">Jurusan</label> 
    <select class="form-control" id="jurusan12" name="jurusan_id">
        <option value="" >Pilih Jurusan</option>
        
        <?php foreach($jurusans as $key => $val) { ?>
          <option value="<?php echo $val->id; ?>" ><?php echo $val->nama; ?></option>	
        <?php } ?>
    </select>
  </div>
  <div class="form-group" style="max-width: 300px;">
    <label class="control-label">Logo</label>
    <input id="input-1" type="file" class="file" name="logo">
  </div>
  <div class="form-group">
    <label for="isi">Content</label>
    <textarea class="form-control" id="isi" placeholder="Masukkan Profile..." name="isi" style="height:200px;" required></textarea>
  </div>
  
  <button type="submit" class="btn btn-default" id="button-submit">Submit</button>
</form>

<script>
$(document).ready(function (){
	$("form").validate();
    $('#profile_type').change(function() {
        if($(this).val() != 'PROFILE_JURUSAN'){
            $('#jurusanContainer').hide();
            $('#jurusan').prop('required' , false)
        }else{
            $('#jurusanContainer').show();
            $('#jurusan').prop('required' , true)
        }
        if($('#profile_type').val()){
          $.ajax({
            url:'<?php echo base_url();?>/profile/check_profile_type/'+ $('#profile_type').val(),
            success : function(data){ console.log(data);
              if(JSON.parse(data).status == 1 ){
                $('#profile-duplicate-error').show();
                $('#button-submit').prop('disabled', true);
              }else{
                $('#profile-duplicate-error').hide();
                $('#button-submit').prop('disabled', false);
              }
            }
          })
        }
    })
	
    $('#profile_type').change();
    
     $('#jurusan12').change(function(){
      $.ajax({
        url:'<?php echo base_url();?>/profile/check_profile/'+ $('#jurusan12').val(),
        success : function(data){ console.log(data);
          if(JSON.parse(data).status == 1 ){
            $('#profile-duplicate-error').show();
            $('#button-submit').prop('disabled', true);
          }else{
            $('#profile-duplicate-error').hide();
            $('#button-submit').prop('disabled', false);
          }
        }
      })
     });
    CKEDITOR.replace( 'isi' );
    $("#input-1").fileinput({
        browseClass: "btn btn-primary btn-block",
        showCaption: false,
        showRemove: false,
        showUpload: false
    });})

    
</script>