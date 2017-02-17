 <div id="flash-messages">
  <?php echo  $this->session->flashdata('alert_msg'); ?>
</div>

<div class="col-md-6">
	<h3>Ubah Password</h3>
</div>
<div class="clearfix"></div>

<hr>

<form class="form-horizontal" action="<?= base_url('user/act_password') ?>" method="POST">
 <div class="col-md-6">	
    <div class="form-group">
      <label for="judul" class="col-lg-4 control-label">Password Lama</label>
      <div class="col-lg-8">
        <input type="Password" class="form-control" id="passlama" name="passlama" placeholder="masukan password lama"
        data-validation="length" 
		data-validation-length="min3"
		data-validation-error-msg="pasword harus di isi minimal 3 karakter">
      </div>
    </div>


    <div class="form-group">
      <label for="judul" class="col-lg-4 control-label">Password Baru</label>
      <div class="col-lg-8">
        <input type="Password" class="form-control" id="passbaru" name="passbaru" placeholder="masukan password lama" 
        data-validation="length" 
		data-validation-length="min3"
		data-validation-error-msg="pasword harus di isi minimal 3 karakter">
      </div>
    </div>
 
 
    <div class="form-group">
      <label for="judul" class="col-lg-4 control-label">Ketik Ulang Password</label>
      <div class="col-lg-8">
        <input type="Password" class="form-control" id="password" name="password" placeholder="masukan kembali password baru" 
        data-validation="length" 
		data-validation-length="min3"
		data-validation-error-msg="pasword harus di isi minimal 3 karakter">
        <p style='color :green' id="valid" hidden>Password valid</p>
		<p style='color :red' id="invalid" hidden>Password invalid</p>
      </div>
    </div>


    
    
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2 ">
        <input type="submit" class="btn btn-primary pull-right" value="submit">
      </div>
    </div>
 </div>
    
  
</form>


<script type="text/javascript">
	$(function(){
	 $('#flash-messages').delay(5000).fadeOut(400);
	});


	$(document).ready(function() {
		$('#valid').hide();
		$('#invalid').hide();

	  	$("#password").keyup(validate_pass);
	});

function validate_pass() {
  var password1 = $("#passbaru").val();
  var password2 = $("#password").val();
 
 if (password1 != '') {
    if(password1 == password2) {
        $('#invalid').hide();

        $('#valid').show();
     
    }
    else {
        $('#valid').hide();

        $('#invalid').show();
    }
}
    
}

$.validate();

</script>