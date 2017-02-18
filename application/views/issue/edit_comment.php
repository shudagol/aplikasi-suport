

<div class="modal fade" id="modalcomment" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		
			<form id="form_comment" >
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title custom_align" id="Heading">Edit Komentar</h4>
				</div>

				<div class="modal-body">
					
					<div class="form-group">

						<textarea class="form-control" name="isi" id="editform"><?= $data[0]->isi ?></textarea>
					</div>

                    <input type="hidden" value="<?= $data[0]->comment_id ?>" name="id_comment"/> 


			</form>
				</div>
				<div class="modal-footer ">
				<button type="submit" class="btn btn-success btn-lg" form="form_comment" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span>Simpan</button>
				</div>
		</div>
		<!-- /.modal-content --> 
	</div>
	<!-- /.modal-dialog --> 
</div>

<script type="text/javascript">
	// $.validate({
 //    modules : 'location, date, security, file',
 //    onModulesLoaded : function() {
 //      $('#country').suggestCountry();
 //      $('input[name="pass_confirmation"]').displayPasswordStrength();

 //    }
 //  });

	var roxyFileman = '<?= base_url('assets') ?>/ckeditor/plugins/fileman/index.html';
    $(function () {
        CKEDITOR.replace('editform', {filebrowserBrowseUrl: roxyFileman,
            filebrowserImageBrowseUrl: roxyFileman + '?type=image',
            removeDialogTabs: 'link:upload;image:upload'});
    });
</script>