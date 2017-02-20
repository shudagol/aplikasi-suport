<style type="text/css">
	a{
		
	 }
</style>
<div id="flash-messages">
  <?php echo  $this->session->flashdata('alert_msg'); ?>
</div>
<div class="col-md-6">
<h3>Daftar Issue</h3>
</div>

<div class="clearfix"></div>


<hr>

<div class="col-md-12">
	<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>#</th>
				<th>Judul</th>
				<th>Kategori</th>
				<th>User</th>
				<th>Tanggal</th>
				<th>Status</th>
				<th>Delete</th>
			</tr>
		</thead>

		<tbody>
		<?php $no = 1; foreach ($post as $key => $value) { 
			$id = $value->issue_id; 
			$status = $value->status;
			if ($status=='solved') {
				$label = "<span class='label label-success'>Solved</span>";
			}else{
				$label = "<span class='label label-danger'>Open</span>";
			}
		?>


			<tr>
				<td><?= $no ?></td>
				<td><b><a style="text-decoration:none" href="<?= base_url('issue/detail/'.$id) ?>"><?= $value->judul ?></a></b></td>
				<td><?= $value->judul_kategori ?></td>
				<td><?= $value->username ?></td>
				<td><?= tgl_indo($value->tgl) ?></td>
				<td><?= $label; ?></td>

				<td><button class="btn btn-delete btn-danger btn-xs" data-id="<?= $id ?>" id="delete-show" data-title="Delete" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span></button></p></td>
			</tr>
		<?php $no++; } ?> 

		</tbody>
	</table>

	
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
				<button id="btn-delete" type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
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


var params = { width:1680, height:1050 };
var str = jQuery.param( params );
$( "#results" ).text( str );


// $(document).on("click", "#delete-show", function(e) {
// 	var id = $(this).attr('data-id');
// 	var params = { data-id:id };
// 	var str = jQuery.param( params ); 
// 	$( "#btn-delete" ).text( str );
// 	$("#delete").modal('show');
//     console.log(id);
// 	e.preventDefault();
// 	});


// $(document).on("click", "#btn-delete", function(e) {
   
//         var id = $(this).attr('data-id');

//         console.log(id);

//         // $.get("<?php echo base_url(); ?>post/hapus/"+id, function(){
//         // 	$('.myAlert').show();
//         // $('.myAlert').html('<div class="alert alert-success" role="alert">Data Berhasil di hapus</div>').delay( 5000 ).fadeOut( 400 );
//         //        $('#delete').modal('hide');
//         // window.location.reload();


//         // });
//         e.preventDefault();
   
// });

$(document).on("click", ".btn-delete", function(e) {
    // var tes = confirm('Are you sure you want to delete this item?');
    var id = $(this).attr('data-id');
    	console.log(id);
    tes = $("#delete").modal('show').on("click","#btn-delete",function(e){
 
        $.get("<?php echo base_url(); ?>post/hapus/"+id, function(){
            $('#delete').modal('hide');
            window.location.reload();  
        });
        e.preventDefault();
    });
        e.preventDefault();
});

</script>    