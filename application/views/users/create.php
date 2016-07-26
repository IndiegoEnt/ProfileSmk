<form action="<?php echo base_url();?>/users/create_save" method="post">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" placeholder="username" name="username">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" placeholder="password" name="password">
  </div>
  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" class="form-control" id="nama" placeholder="nama" name="nama">
  </div>
  <div class="form-group">
    <label for="role">Role</label>  
    <select class="form-control" id="role" name="role">
        <option value="" >Pilih Role</option>
        <option value="ROLE_ADMIN" >Admin</option>
        <option value="ROLE_KAJUR" >Ketua Jurusan</option>
    </select>
  </div>
  <div class="form-group" id="jurusanContainer">
    <label for="jurusan">Jurusan</label> 
    <select class="form-control" id="jurusan" name="jurusan_id">
        <option value="" >Pilih Jurusan</option>
        <option value="ROLE_ADMIN" >Admin</option>
        <option value="ROLE_KAJUR" >Ketua Jurusan</option>
    </select>
  </div>
  <button type="submit" class="btn btn-default" id="button-submit">Submit</button>
</form>

<script>
    $('#role').change(function() {
        if($(this).val() != 'ROLE_KAJUR'){
            $('#jurusanContainer').hide();
        }else{
            $('#jurusanContainer').show();
        }
    })
    $('#role').change();
    $('#username').change(function(){
      $.ajax({
        url:'<?php echo base_url();?>/users/check_username/'+ $('#username').val(),
        success : function(data){
          if(JSON.parse(data).status == 1 ){
            $('#button-submit').hide();
          }else{
            $('#button-submit').show();
          }
        }
      })
    });
</script>