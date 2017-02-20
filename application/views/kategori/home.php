<div id="flash-messages">
  <?php echo  $this->session->flashdata('alert_msg'); ?>
</div>
<div class="col-md-6">
<h3>Data Kategori</h3>
</div>
<div class="col-md-6">
<button data-title="Tambah Kategori" data-toggle="modal" data-target="#tambahData" class="btn btn-primary btn-sm pull-right center" style="margin-top: 20px">Tambah kategori</button>
</div>
<div class="clearfix"></div>


<hr>

<div class="col-md-12">
	<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Username</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>

		<tbody>
		<?php foreach ($kategori as $key => $value) { ?>

			<tr>
				<td><?= $value->judul_kategori ?></td>
			
				<td><button class="btn btn-primary btn-xs btn-edit" data-id="<?php echo $value->id_kategori ?>"   ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
				<td><button class="btn btn-danger btn-xs btn-delete"  data-title="Delete" data-id="<?php echo $value->id_kategori ?>" data-toggle="modal" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
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
				<h4 class="modal-title custom_align" id="Heading">Tambah data kategori</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<input class="form-control " type="text" placeholder="masukan kategori" name="judul_kategori" 
						data-validation="required" 
		 				data-validation-length="3-12" 
		 				data-validation-error-msg="User name hanya bisa di isi (angka,huruf) (3-12 karakter)">
				</div>
			</div>
			<div class="modal-footer ">
				<button type="submit" class="btn btn-success btn-sm" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span>Simpan</button>
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
				<button id="btn-delete"  type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
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
        url: '<?php echo base_url('kategori/act_save') ?>',
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
        url: '<?php echo base_url('kategori/act_edit') ?>',
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




$(document).on("click", ".btn-edit", function() {
    var id = $(this).attr('data-id');
    $.get("<?php echo base_url(); ?>kategori/edit/"+id, function(msg){
        // alert(msg);
        $('#m-update').html(msg);
        $('#editData').modal('show');
        
    });
});

$(document).on("click", ".btn-delete", function(e) {
    // var tes = confirm('Are you sure you want to delete this item?');
    var id = $(this).attr('data-id');
    	console.log(id);
    tes = $("#delete").modal('show').on("click","#btn-delete",function(e){
 
        $.get("<?php echo base_url(); ?>kategori/hapus/"+id, function(){
            $('#delete').modal('hide');
            window.location.reload();  
        });
        e.preventDefault();
    });
        e.preventDefault();
});

$.validate({
    modules : '',
    onModulesLoaded : function() {
      $('#country').suggestCountry();
      $('input[name="pass_confirmation"]').displayPasswordStrength();

    }
  });

  // Restrict presentation length
  // $('#presentation').restrictLength( $('#pres-max-length') );
</script>    