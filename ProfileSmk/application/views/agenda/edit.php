<form action="<?php echo base_url();?>agenda/edit_save" method="post">
  <div class="form-group">
    <label for="agenda_nama">Nama Agenda</label>
    <input type="text" class="form-control" id="nama" placeholder="Nama Agenda" value="<?php echo ($agendaModel->nama); ?>" name="nama">
    <input type="hidden" value="<?php echo ($agendaModel->id); ?>" name="id">
  </div>
  <div class="form-group">
    <label for="agenda_keterangan">Keterangan Agenda</label>
    <textarea class="form-control" id="keterangan" placeholder="Keterangan Kategori" name="keterangan" style="height:200px;"><?php echo ($agendaModel->keterangan); ?></textarea>
  </div>
  <div class="form-group">
    <label for="agenda_tanggal">Tanggal</label>
    <input type="date" class="form-control" value="<?php echo date("Y-m-d"); ?>" name="tanggal">
  </div>
  <button type="submit" class="btn btn-default" id="button-submit">Submit</button>
</form>

<script>
    CKEDITOR.replace( 'keterangan' );
</script>