<div id="flash-messages">
  <?php echo  $this->session->flashdata('alert_msg'); ?>
</div>
<div class="col-md-6">
<h3>Data User</h3>
</div>
<div class="col-md-6">
<button data-title="Delete" data-toggle="modal" data-target="#tambahData" class="btn btn-primary btn-sm pull-right center" style="margin-top: 20px">Tambah user</button>
</div>
<div class="clearfix"></div>


<hr>

<div class="col-md-12">
	<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Username</th>
				<th>Nama</th>
				<th>level</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>

		<tbody>
		<?php foreach ($user as $key => $value) { ?>

			<tr>
				<td><?= $value->username ?></td>
				<td><?= $value->nama ?></td>
				<td><?= $value->level ?></td>

				<td><button class="btn btn-primary btn-xs btn-edit" data-id="<?php echo $value->id ?>"   ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
				<td><button class="btn btn-danger btn-xs"  data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
			</tr>
		<?php } ?> 

		</tbody>
	</table>

	
</div>

<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		<form id="formTambahData" method="POST">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title custom_align" id="Heading">Tambah data</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<input class="form-control " type="text" placeholder="username" name="username" 		
						data-validation="length alphanumeric" 
		 				data-validation-length="3-12" 
		 				data-validation-error-msg="User name hanya bisa di isi (angka,huruf) (3-12 karakter)">
				</div>
				<div class="form-group">
					<input class="form-control " type="text" placeholder="nama" name="nama" 
						data-validation="length" 
		 				data-validation-length="3-12"
		 				data-validation-error-msg="Gunakan nama yang valid">
				</div>
				<div class="form-group">

					<input class="form-control " type="password" placeholder="masukan pasword" id="password1" 	  data-validation="length" 
		 				data-validation-length="min3"
		 				data-validation-error-msg="pasword harus di isi minimal 3 karakter">
				</div>
				<div class="form-group">

					<input class="form-control " type="password" placeholder="masukan kembali password" id="password2" name="password" 
						data-validation="length" 
		 				data-validation-length="min3"
		 				data-validation-error-msg="pasword harus di isi minimal 3 karakter">
				</div>
				<p style='color :green' id="valid">Password valid</p>
				<p style='color :red' id="invalid">Password invalid</p>


				<div class="form-group">

					<select class="form-control" name="level" 
						data-validation="required"
		 				data-validation-error-msg="pilih salah satu pilihan"
					>
						<option hidden  default selected value="">level</option>
						<option value="admin">admin</option>
						<option value="member">member</option>
					</select>

				</div>
			</div>
			<div class="modal-footer ">
				<button type="submit" class="btn btn-success btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span>Simpan</button>
			</div>
		</form>
		</div>
		<!-- /.modal-content --> 
	</div>
	<!-- /.modal-dialog --> 
</div>


<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
			</div>
			<div class="modal-body">

				<div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>

			</div>
			<div class="modal-footer ">
				<button id="btn-delete" data-id="<?php echo $value->id ?>" type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
				<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
			</div>
		</div>
		<!-- /.modal-content --> 
	</div>
</div> 

<div id="m-update"></div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#datatable').dataTable();

		$("[data-toggle=tooltip]").tooltip();

		$('#flash-messages').delay(5000).fadeOut(400);
	} );


	$('#formTambahData').submit(function(e) {
    var input = $(this).serialize();
    $.ajax({
        method : 'POST',
        url: '<?php echo base_url('user/act_save') ?>',
        data: input
    })
    .done(function(msg) {
        $('.myAlert').show();
        $('.myAlert').html('<div class="alert alert-success" role="alert">Berhasil</div>').delay( 5000 ).fadeOut( 400 );
        $('#tambahData').modal('hide');
        // table.destroy();

        // tampil();
        window.location.reload();
        //
    })

    e.preventDefault();
    
});
	$(document).on("submit", "#form2", function(e) {

    var input = $(this).serialize();

    $.ajax({
        method : 'POST',
        url: '<?php echo base_url('user/act_edit') ?>',
        data: input
    })
    .done(function(msg) {
        $('.myAlert').show();
        $('.myAlert').html('<div class="alert alert-success" role="alert">Berhasil</div>').delay( 5000 ).fadeOut( 400 );
        $('#editData').modal('hide');
        window.location.reload();


    })

    e.preventDefault();

});

	

	$(document).ready(function() {
	$('#valid').hide();
	$('#invalid').hide();

  	$("#password2").keyup(validate_pass);
});


function validate_pass() {
  var password1 = $("#password1").val();
  var password2 = $("#password2").val();
 
    if(password1 == password2) {
        $('#invalid').hide();

        $('#valid').show();
     
    }
    else {
        $('#valid').hide();

        $('#invalid').show();
    }
    
}


$(document).on("click", ".btn-edit", function() {
    var id = $(this).attr('data-id');
    $.get("<?php echo base_url(); ?>user/edit/"+id, function(msg){
        // alert(msg);
        $('#m-update').html(msg);
        $('#editData').modal('show');
        
    });
});

$(document).on("click", "#btn-delete", function(e) {
   
        var id = $(this).attr('data-id');
        $.get("<?php echo base_url(); ?>user/hapus/"+id, function(){
        	$('.myAlert').show();
        $('.myAlert').html('<div class="alert alert-success" role="alert">Data Berhasil di hapus</div>').delay( 5000 ).fadeOut( 400 );
               $('#delete').modal('hide');
        window.location.reload();


        });
        e.preventDefault();
   
});

$.validate({
    modules : 'location, date, security, file',
    onModulesLoaded : function() {
      $('#country').suggestCountry();
      $('input[name="pass_confirmation"]').displayPasswordStrength();

    }
  });


  // Restrict presentation length
  $('#presentation').restrictLength( $('#pres-max-length') );
</script>    