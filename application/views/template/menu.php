<nav class="navbar navbar-default navbar-fixed-top" >
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">IT Suport</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?= base_url('admin') ?>">Home</a></li>
            <li><a href="<?= base_url('issue') ?>">Issue</a></li>
            <li><a href="<?= base_url('aktifitas') ?>">Aktifitas</a></li>
            <?php if ($this->session->userdata('level') == 'admin') {?>
            <li class="dropdown">
              <a  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?= base_url('post') ?>">Post</a></li>
                <li><a href="<?= base_url('kategori') ?>">Kategori</a></li>
                <li><a href="<?= base_url('user') ?>">User</a></li>
              </ul>
            </li>
            <?php } ?>
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown active">
              <a  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $this->session->userdata('username') ?> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?= base_url('profile') ?>">Profil</a></li>
                <li><a href="<?= base_url('user/ubah_password') ?>">Ubah Password</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="<?= base_url('login/logout') ?>">Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="clearfix"></div>
    <div class="container">
    <div class="konten">