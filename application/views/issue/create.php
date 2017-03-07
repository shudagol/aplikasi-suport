

<div class="col-md-10">
<form class="form-horizontal" action="<?= base_url('issue/insert') ?>" method="POST">
 
    <div class="form-group">
      <label for="judul" class="col-lg-2 control-label">Judul</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="judul" name="judul" placeholder="masukan judul">
      </div>
    </div>

    <div class="form-group">
      <label for="judul" class="col-lg-2 control-label">Kategori</label>
      <div class="col-lg-6">
        <select type="text" class="form-control" id="kategori" name="kategori" placeholder="kategori">
          <option hidden  default selected value=""><p style="color:red">-- pilih kategori --</p></option>
          <?php foreach ($data as $key => $value) { ?>
            <option value="<?= $value->id_kategori ?>"><?= $value->judul_kategori ?></option>
              
          <?php } ?>
        </select>
      </div>
    </div>
    
    <div class="form-group">
      <label for="isi" class="col-lg-2 control-label">Konten</label>
      <div class="col-lg-10">
        <textarea class="form-control" rows="3" name="isi" id="summernote"></textarea>
        <span class="help-block">Masukan issue anda</span>
      </div>
    </div>
    
    
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  
</form>
</div>


<script type="text/javascript">
//   $(document).ready(function() {
//   $('#summernote').summernote({
//      height: 250,
//   });
// });

  
     var roxyFileman = '<?= base_url('assets') ?>/ckeditor/plugins/fileman/index.html';
    $(function () {
        CKEDITOR.replace('summernote', {filebrowserBrowseUrl: roxyFileman,
            filebrowserImageBrowseUrl: roxyFileman + '?type=image',
            removeDialogTabs: 'link:upload;image:upload'});
    });


</script>