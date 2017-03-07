<style type="text/css">
	*{
		text-align: justify;
    text-justify: inter-word;
	}
</style>

<?php 

	$issue_id   = $data[0]->issue_id;
	$judul      = $data[0]->judul;
	$isi 	      = $data[0]->isi;
	$status     = $data[0]->status;
	$username   = $data[0]->username;
	$tgl 	      = $data[0]->tgl;
	$time 		  = $data[0]->created_at;
	$status   	= $data[0]->status;
	$nama 		  = $data[0]->nama;
  $kategori   = $data[0]->judul_kategori;
  $email      = $data[0]->email;
  $image      = $data[0]->img;
 

	if ($status=='solved') {
		$label = "<span class='label label-success'>Solved</span>";
	}else{
		$label = "<span class='label label-danger'>Open</span>";
	}
 ?>

 <div id="flash-messages">
  <?php echo  $this->session->flashdata('alert_msg'); ?>
</div>

<div>
	<h3> <i class="glyphicon glyphicon-align-right"></i> <?= $judul ?></h3><?= $label ?>
	<?php 
		 echo "<span style='font-size:14px'>".waktu_lalu($time)." | ".nama_hari($tgl).' '. tgl_indo($tgl)."| kategori : ".$kategori."  | by <span style='color:#2525B8;'><b>".$username."</b></span></span> ";
	     echo "<br>";
	?>
	<hr>


    <div class="col-md-10">
        <section class="comment-list">
          <!-- First Comment -->
          <article class="row">
            <div class="col-md-2 col-sm-2 hidden-xs">
              <figure class="thumbnail">
              <?php if ($image == null) { ?>
                <img class="img-responsive" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg" />
                <?php }else{ ?>
                 <img class="img-responsive" src="<?= $image ?>"/>
                 <?php } ?>
                <figcaption class="text-center"><?= $username ?></figcaption>
              </figure>
            </div>
            <div class="col-md-10 col-sm-10">
              <div class="panel panel-default arrow left">
                <div class="panel-body">
                  <header class="text-left">
                    <div class="comment-user"><i class="fa fa-user">&nbsp&nbsp</i> <b><?= $nama ?></b></div>
                    <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i>&nbsp&nbsp<span style='font-size:13px'> <?=waktu_lalu($time).' | '. nama_hari($tgl).', '. tgl_indo($tgl)?></time></span>
                  </header>
                  <hr>
                  <div class="comment-post">
                    <?= $isi ?>
                  </div>
                  <?php if ($status=='open') {
                          if ($username==$this->session->userdata('username') | $this->session->userdata('username')=='admin' ) {
                    ?>
                  <p class="text-right"><a href="<?= base_url('issue/edit_issue/'.$issue_id) ?>" class="btn btn-info btn-sm" title="edit"><span class='glyphicon glyphicon-pencil'></span></a>&nbsp&nbsp<a href="#" class="btn btn-success btn-sm" data-title="solved" data-toggle="modal" data-target="#solved"><i class="fa fa-check-circle"></i> solved</a></p>
                  <?php } }?>
                </div>
              </div>
            </div>
          </article>
        </section>
    </div>


    <div class="col-md-10">
    	 <hr>
    	 <?php if ($comment != 0) {
        // echo "<pre>";
        // print_r ($comment);
        // echo "</pre>";
        // exit();
    	 	foreach ($comment as $key => $value) {?>
    	 		
    	 
    	 <!-- Second Comment Reply -->
          <article class="row">
            <div class="col-md-2 col-sm-2 col-md-offset-1 col-sm-offset-0 hidden-xs">
              <figure class="thumbnail">
                 <?php if ($value->img == null) { ?>
                <img class="img-responsive" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg" />
                <?php }else{ ?>
                 <img class="img-responsive" src="<?= $value->img ?>"/>
                 <?php } ?>
                <figcaption class="text-center"><?= $value->username; ?></figcaption>
              </figure>
            </div>
            <div class="col-md-9 col-sm-9">
              <div class="panel panel-default arrow left">
                <div class="panel-heading right">Reply</div>
                <div class="panel-body">
                  <header class="text-left">
                    <div class="comment-user"><i class="fa fa-user"></i>&nbsp&nbsp<b><?= $value->nama ?></b></div>
                    <span style='font-size:13px'><time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i>&nbsp&nbsp<?= waktu_lalu($value->created_at) ?> | <?= nama_hari($value->tgl)?>, <?= tgl_indo($value->tgl) ?></time></span>
                  </header>
                  <hr>
                  <div class="comment-post">
                    <?= $value->isi ?>
                  </div>
                  <?php if ($value->user_id == $this->session->userdata('user_id')) {?>
                  <p class="text-right"><button class="btn btn-edit btn-info btn-xs" data-id="<?= $value->comment_id; ?>" title="edit"><span class='glyphicon glyphicon-pencil'></span></button>
                 <button class="btn btn-delete btn-danger btn-xs" data-id="<?php echo $value->comment_id ?>" title="hapus" data-title="Delete" data-toggle="modal" ><span class='glyphicon glyphicon-trash'></span></button></p>
                 <?php } ?>
                </div>
              </div>
            </div>
          </article>
		<hr>
        <?php }
       } ?>

    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title custom_align" id="Heading">Hapus Comment</h4>
          </div>
          <div class="modal-body">

            <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Apakah anda yakin menghapus komentar anda?</div>

          </div>
          <div class="modal-footer ">
            <button id="btn-delete"  type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
          </div>
        </div>
        <!-- /.modal-content --> 
      </div>
    </div>
        

      
    	 <form id="" class="form-horizontal" action="<?= base_url('issue/insert_comment') ?>" method="POST">
		    <div class="form-group">
		      <label for="isi" class="col-lg-2 control-label">Comment</label>
		      <div class="col-lg-10">
		        <textarea class="form-control" rows="3" name="isi" id="summernote"></textarea>
		        <span class="help-block">Masukan komentar anda pada kolom dan tekan submit untuk melakukan komentar</span>
		      </div>
		    </div>

		    <input type="hidden" name="issue_id" value="<?= $issue_id ?>">
        <input type="hidden" name="judul" value="<?= $judul ?>">
        <input type="hidden" name="email" value="<?= $email ?>">
        <input type="hidden" name="username" value="<?= $username ?>">


		    
		    
		    <div class="form-group">
		      <div class="col-lg-10 col-lg-offset-2">
		        <button type="submit" class="btn btn-primary">Submit</button>
		      </div>
		    </div>
		 </form>
    </div>
   

</div>

<div class="modal fade" id="solved" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title custom_align" id="Heading">Closed issue</h4>
      </div>
      <div class="modal-body">

        <div class="alert alert-success"><span class="glyphicon glyphicon-warning-sign"></span> Apakah issue ini sudah selesai ?</div>

      </div>
      <div class="modal-footer ">
        <button id="btn-solved" data-id="<?php echo $issue_id ?>" type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
    </div>
    <!-- /.modal-content --> 
  </div>
</div> 

<div id="m-update"></div>




<script type="text/javascript">
   var roxyFileman = '<?= base_url('assets') ?>/ckeditor/plugins/fileman/index.html';
    $(function () {
        CKEDITOR.replace('summernote', {filebrowserBrowseUrl: roxyFileman,
            filebrowserImageBrowseUrl: roxyFileman + '?type=image',
            removeDialogTabs: 'link:upload;image:upload'});
    });


  $(function(){
	 $('#flash-messages').delay(5000).fadeOut(400);
	});

  $(document).on("click", "#btn-solved", function(e) {
   
        var dataid = $(this).attr('data-id');
    $.ajax({
        method : 'POST',
        url: '<?php echo base_url('issue/solved') ?>',
        data: {id: dataid}
    })
    .done(function(msg) {
       
        window.location.reload();
        console.log(msg);
    })

    e.preventDefault();
        
   
});

  $(document).on("click", ".btn-edit", function() {
    console.log('btn edit');
    var id = $(this).attr('data-id');
    console.log(id);
    $.get("<?php echo base_url(); ?>issue/edit_comment/"+id, function(msg){
        // alert(msg);

        $('#m-update').html(msg);
        $('#modalcomment').modal('show');
        
    });
});

  $(document).on("submit", "#form_comment", function(e) {

    var input = $(this).serialize();

    $.ajax({
        method : 'POST',
        url: '<?php echo base_url('issue/update_comment') ?>',
        data: input
    })
    .done(function(msg) {
        $('.myAlert').show();
        $('.myAlert').html('<div class="alert alert-success" role="alert">Berhasil</div>').delay( 5000 ).fadeOut( 400 );
        $('#editData').modal('hide');
        window.location.reload();
        console.log(msg);


    })
    console.log('tes');
    e.preventDefault();

});

  $(document).on("submit", "#form_insert_comment", function(e) {

    var input = $(this).serialize();

    $.ajax({
        method : 'POST',
        url: '<?php echo base_url('email/send_notif') ?>',
        data: input
    })
    .done(function(msg) {
        console.log(msg);
    })
    console.log('tes');
    e.preventDefault();

});

$(document).on("click", ".btn-delete", function(e) {
    // var tes = confirm('Are you sure you want to delete this item?');
    var id = $(this).attr('data-id');
      console.log(id);
    tes = $("#delete").modal('show').on("click","#btn-delete",function(e){
 
        $.get("<?php echo base_url(); ?>issue/hapus_comment/"+id, function(){
            $('#delete').modal('hide');
            window.location.reload();  
        });
        e.preventDefault();
    });
        e.preventDefault();
});

</script>

