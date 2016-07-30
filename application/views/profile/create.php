<form action="<?php echo base_url();?>/profile/create_save" method="post">
  <div class="form-group">
    <label for="profile_type">Profile Type</label>
    <input type="text" class="form-control" id="profile_type" placeholder="Profile Type" name="profile_type" required>
  </div>
  <div class="form-group">
    <label for="isi">Content</label>
    <textarea class="form-control" id="isi" placeholder="Masukkan Profile..." name="isi" style="height:200px;" required></textarea>
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