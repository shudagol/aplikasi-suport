
  <?php echo form_open_multipart('profile/upload', array('class' => 'form-horizontal')); ?>
  
  <div class="row">
    <!-- left column -->
    <div class="col-md-12 col-sm-6 col-xs-12 ">
      <div class="">
        <img src="<?= $user[0]->img ?>" class="avatar img-circle img-thumbnail" alt="photo" style="height: 200px;width: 200px">
        <h6>Upload foto lain...</h6>
        <h6>Rekomendasi photo adalah 400 x 400 pixels</h6>
        <h6>Maksimal besar photo adalah 4mb</h6>

        <input type="file" name="image" class="well well-sm" value="">
      </div>
    </div>
    <!-- edit form column -->
    <div class="col-md-12 col-sm-6 col-xs-12 personal-info">
    
        <div class="form-group">
          <div class="col-lg-6">
            <input name="nama" class="form-control" value="<?= $user[0]->nama ?>" type="text" placeholder="nama">
          </div>
        </div>
      
        <div class="form-group">
          <div class="col-lg-6">
            <input class="form-control" name="email" value="<?= $user[0]->email ?>" type="email" placeholder="email">
          </div>
        </div>
        <input type="hidden" name="id" value="<?= $user[0]->id ?>" >
        <div class="form-group">
          <div class="col-md-8">
            <button class="btn btn-primary"  type="submit">Simpan Perubahan</button>
            <span></span>
            <input class="btn btn-default" value="Cancel" type="reset">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>