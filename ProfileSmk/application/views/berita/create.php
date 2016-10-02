<form action="<?php echo base_url();?>/berita/create_save" method="post"  enctype="multipart/form-data">
  <?php if($role == 'ROLE_ADMIN') { ?>
  <div class="form-group">
    <label for="berita_type">Jenis Berita</label>
    <select class="form-control" id="berita_type" name="berita_type" required>
        <option value="" >Pilih Jenis Berita</option>
        <option value="BERITA_SEKOLAH" >Sekolah</option>
        <option value="BERITA_JURUSAN" >Jurusan</option>
        <option value="BERITA_PPDB" >PPDB</option>
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
    <label for="judul">Judul</label>
    <input type="text" class="form-control" id="judul" placeholder="judul" name="judul" required>
  </div>
  <div class="form-group">
    <label for="isi">Isi</label>
    <textarea type="text" class="form-control" id="isi" placeholder="isi" name="isi" required></textarea>
  </div>
  <div class="form-group" style="max-width: 300px;">
    <label class="control-label">Cover</label>
    <input id="input-1" type="file" class="file" name="image">
  </div>
  <div class="form-group">
    <label class="control-label">Kategori</label>
    <br>
    <select multiple data-role="tagsinput" id="kategoris" name="kategoris" class="form-control">
      
    </select>
    <input type="hidden" name="kategoris" id="kategori_container" />
  </div>
  </br>
  </br>

  
  

  <button type="submit" class="btn btn-default" id="button-submit">Submit</button>
</form>

<script>
    $("form").validate();
    $('#berita_type').change(function() {
        if($(this).val() != 'BERITA_JURUSAN'){
            $('#jurusanContainer').hide();
            $('#jurusan').prop('required' , false);
            if($(this).val() == 'BERITA_PPDB'){
                var det = new Date();
                var str_ppdb = "PPDB " + det.getFullYear();
                $('#kategoris').tagsinput('add', str_ppdb);
                $('#kategori_container').val(str_ppdb);
                $('#jurusan').prop('required' , true)
            }
        }else{
            $('#jurusanContainer').show();
            $('#jurusan').prop('required' , true);
        }
    })
    $('#berita_type').change();
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
    CKEDITOR.replace( 'isi' );
    $("#input-1").fileinput({
        browseClass: "btn btn-primary btn-block",
        showCaption: false,
        showRemove: false,
        showUpload: false
    });
    $('#kategoris').on('itemAdded', function(event) {
      $('#kategori_container').val($(this).val())
    }).on('itemRemoved', function(event) {
      $('#kategori_container').val($(this).val())
    }).on('itemChanged',function(event) {
      $('#kategori_container').val($(this).val())
    });
    
</script>