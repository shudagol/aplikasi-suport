

<div class="modal fade" id="editData" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="form2" method="POST">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title custom_align" id="Heading">Edit data</h4>
				</div>

				<div class="modal-body">
					<div class="form-group">
						<input class="form-control " type="text" placeholder="username" name="username" required="" value="<?= $data[0]->username ?>" 
						data-validation="required"
		 				data-validation-error-msg="tidak boleh kosong"
						>
					</div>
					<div class="form-group">

						<input class="form-control " type="text" placeholder="nama" name="nama" value="<?= $data[0]->nama ?>" data-validation="required"
		 				data-validation-error-msg="tidak boleh kosong">
					</div>
					<div class="form-group">
					<input class="form-control " type="email" placeholder="email" name="email" value="<?= $data[0]->email ?>" 
						data-validation="email" 
		 				data-validation-error-msg="Masukan alamat email">
					</div>


					<div class="form-group">

						<select class="form-control" name="level" data-validation="required"
		 				data-validation-error-msg="tidak boleh kosong">
							<option hidden value="">level</option>
							<option value="admin" <?php if ($data[0]->level=='admin') {
								echo 'selected';
							} ?>>admin</option>
							<option value="member" <?php if ($data[0]->level=='member') {
								echo 'selected';
							} ?>>member</option>
						</select>
					</div>
                    <input type="hidden" value="<?php echo $data[0]->id ?>" name="id"/> 


			</form>
				</div>
				<div class="modal-footer ">
				<button type="submit" class="btn btn-success btn-lg" form="form2" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span>Simpan</button>
				</div>
		</div>
		<!-- /.modal-content --> 
	</div>
	<!-- /.modal-dialog --> 
</div>

<script type="text/javascript">
	$.validate({
    modules : '',
    onModulesLoaded : function() {
      $('#country').suggestCountry();
      $('input[name="pass_confirmation"]').displayPasswordStrength();

    }
  });
</script>