<form action="<?php echo base_url();?>/users/create_save" method="post">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" placeholder="username" name="username" required>
    <label id="username-duplicate-error" class="error-1" style="display:nonde" for="username-1">Username Has Ben Taken.</label>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" placeholder="password" name="password" required>
  </div>
  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" class="form-control" id="nama" placeholder="nama" name="nama" required>
  </div>
  <div class="form-group">
    <label for="role">Role</label>  
    <select class="form-control" id="role" name="role" required>
        <option value="" >Pilih Role</option>
        <option value="ROLE_ADMIN" >Admin</option>
        <option value="ROLE_KAJUR" >Ketua Jurusan</option>
    </select>
  </div>
  <div class="form-group" id="jurusanContainer" required>
    <label for="jurusan">Jurusan</label> 
    <select class="form-control" id="jurusan" name="jurusan_id">
        <option value="" >Pilih Jurusan</option>
        
        <?php foreach($jurusans as $key => $val) { ?>
          <option value="<?php echo $val->id; ?>" ><?php echo $val->nama; ?></option>
        <?php } ?>
    </select>
  </div>
  <button type="submit" class="btn btn-default" id="button-submit">Submit</button>
</form>

<script>
    $("form").validate();
    $('#role').change(function() {
        if($(this).val() != 'ROLE_KAJUR'){
            $('#jurusanContainer').hide();
            $('#jurusan').prop('required' , false)
        }else{
            $('#jurusanContainer').show();
            $('#jurusan').prop('required' , true)
        }
    })
    $('#role').change();
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
</script>