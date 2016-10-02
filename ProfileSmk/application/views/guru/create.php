<form action="<?php echo base_url();?>/guru/create_save" method="post">
  <div class="form-group">
    <label for="nip">NIP</label>
    <input type="text" class="form-control" id="nip" placeholder="NIP" name="nip" required>
    <label id="nip-duplicate-error" class="error-1" style="display:none" for="username-1">NIP Has Ben Taken.</label>
  </div>
  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" required>
  </div>
  <div class="form-group">
    <label for="pelajaran">Pelajaran</label>
    <input type="text" class="form-control" id="pelajaran" placeholder="pelajaran" name="pelajaran" required>
  </div>
  <div class="form-group">
    <label for="jabatan">jabatan</label>
    <input type="text" class="form-control" id="jabatan" placeholder="jabatan" name="jabatan" required>
  </div>
  <button type="submit" class="btn btn-default" id="button-submit">Submit</button>
</form>

<script>
    $('#nip').change(function(){
      $.ajax({
        url:'<?php echo base_url();?>/Guru/check_nip/'+ $('#nip').val(),
        success : function(data){
          if(JSON.parse(data).status == 1 ){
            $('#nip-duplicate-error').show();
            $('#button-submit').prop('disabled', true);
          }else{
            $('#nip-duplicate-error').hide();
            $('#button-submit').prop('disabled', false);
          }
        }
      })
    });
</script>