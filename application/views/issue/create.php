<div class="col-md-10">
<form class="form-horizontal" action="<?= base_url('issue/insert') ?>" method="POST">
 
    <div class="form-group">
      <label for="judul" class="col-lg-2 control-label">Judul</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="judul" name="judul" placeholder="judul">
      </div>
    </div>
    
    <div class="form-group">
      <label for="isi" class="col-lg-2 control-label">Konten</label>
      <div class="col-lg-10">
        <textarea class="form-control" rows="3" name="isi" id="summernote"></textarea>
        <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
      </div>
    </div>
    
    
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
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