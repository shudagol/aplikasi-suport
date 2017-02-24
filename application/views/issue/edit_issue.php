
<div class="col-md-10">
<form class="form-horizontal" action="<?= base_url('issue/act_edit_issue') ?>" method="POST">
 
    <div class="form-group">
      <label for="judul" class="col-lg-2 control-label">Judul</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="judul" name="judul" placeholder="masukan judul" value="<?= $data[0]->judul ?>">
      </div>
    </div>

    <div class="form-group">
      <label for="judul" class="col-lg-2 control-label">Kategori</label>
      <div class="col-lg-6">
        <select type="text" class="form-control" id="kategori" name="kategori" placeholder="kategori">
          <option hidden  default selected value=""><p style="color:red">-- pilih kategori --</p></option>
          <?php foreach ($kategori as $key => $value) { ?>
            <option value="<?= $value->id_kategori ?>" 
            <?php if ($value->id_kategori==$data[0]->id_kategori) {
              echo "selected";
            } ?>

            ><?= $value->judul_kategori ?></option>
          <?php } ?>
        </select>
      </div>
    </div>
    
    <div class="form-group">
      <label for="isi" class="col-lg-2 control-label">Konten</label>
      <div class="col-lg-10">
        <textarea class="form-control" rows="3" name="isi" id="summernote"><?= $data[0]->isi ?></textarea>
        <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
      </div>
    </div>

    <input type="hidden" name="issue_id" value="<?= $data[0]->issue_id ?>">
    
    
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <a href="<?= base_url('issue/detail/'.$data[0]->issue_id) ?>" type="reset" class="btn btn-default">Cancel</a>
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