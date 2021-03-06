<form action="<?php echo base_url();?>/users/edit_save" method="post">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" placeholder="username" value="<?php echo ($userModel->username); ?>" name="username" readonly>
    <input type="hidden" value="<?php echo ($userModel->id); ?>" name="id">
  </div>
  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" class="form-control" id="nama" placeholder="name"  value="<?php echo ($userModel->nama); ?>" name="nama" required>
  </div>
  <div class="form-group">
    <label for="role">Role</label>  
    <select class="form-control" id="role" name="role"  value="" required>
        <option value="" >Pilih Role</option>
        <option value="ROLE_ADMIN" >Admin</option>
        <option value="ROLE_KAJUR" >Ketua Jurusan</option>
    </select>
  </div>
  <div class="form-group" id="jurusanContainer">
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
    $('#role').val('<?php echo ($userModel->role); ?>');
    $('#jurusan').val('<?php echo ($userModel->jurusan_id); ?>');
    
</script>