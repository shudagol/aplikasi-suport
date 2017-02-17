<style >
	.ongoing{
		color : maroon;
	}
	.solved{
		color : green;
	}
</style>


<div id="flash-messages">
  <?php echo  $this->session->flashdata('alert_msg'); ?>
</div>

<div class="pull-right">
	<a href="<?= base_url('issue/create_issue') ?>"><button class="btn btn-sm btn-success"><i class="glyphicon glyphicon-plus"></i>Tambah Issue</button></a>
	<div class="col-md-3 pull-right">
     <form action="<?=base_url()?>issue/cari" method=POST>
     <div class="input-group">
 
      <input type="text" name="key" class="form-control" style="height: 35px">
      <span class="input-group-btn">
        <button class="btn btn-default btn-sm" type="submit"><i class="glyphicon glyphicon-search"></i>  cari</button>
      </span>
    </div><!-- /input-group -->
 
      </form>
     </div>
	<p></p>
	<!-- <a  class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-plus"></i></a> -->
</div>
<div class="clearfix"></div>

<div class="panel panel-default">
  <div class="panel-heading"><b>Issue</b></div>
	<div class="panel-body">
		<table class="table table-hover table-striped" >
		<thead >
			<th class="default"></th>
		</thead>
		<tbody>
		<?php if (count($issue)== 0) {
			echo 'tidak ada data';
		} ?>

					<?php foreach ($issue as $key => $value) { 
						$id = $value->issue_id;
						$tgl = $value->tgl; 
						$time = $value->created_at;
						$status = $value->status;
						if ($status == 'solved') {
							$warna = 'solved';
							$icon = 'glyphicon glyphicon-ok';
						}else{
							$warna = 'ongoing';
							$icon = 'glyphicon glyphicon-time';
						}
					?>
			<tr>
				<td>	<i class=" <?php echo$icon." ".$warna; ?>"></i>
							<?= 
								"<label class='".$warna."' >".ucfirst($value->judul)."</label><br>"
							; ?>
							<?php 
								 echo "<span style='font-size:12px'>".waktu_lalu($time)." | ".nama_hari($tgl).' '. tgl_indo($tgl)."  | by <span style='color:#2525B8;'><b>".$value->username."</b></span></span> ";
						         echo "<br>";
							 ?>
				</td>
				<td>
							 <a href="<?= base_url()."issue/detail/".$id; ?>" class="btn btn-sm btn-primary pull-right">detail</a>
					
				</td>
					<?php } ?>
			</tr>
		</tbody>

		</table>

		<div class="panel-footer">
          <?=$this->pagination->create_links();?>
        </div>

     </div>
 </div>

 
<script type="text/javascript">
	$(document).ready(function() {
		$('#flash-messages').delay(5000).fadeOut(400);
	} );
</script>