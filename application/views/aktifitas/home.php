<style>
  .judul{
    color : black;
  }

</style>

<h3> <i class="glyphicon glyphicon-align-right"></i> Aktifitas Anda </h3>
  <hr>


  <div id="exTab2" class="container"> 
    <ul class="nav nav-tabs">
      <li class="active">
        <a  href="#1" data-toggle="tab">Posting</a>
      </li>
      <li><a href="#2" data-toggle="tab">Comment</a>
      </li>
      
    </ul>

    <div class="tab-content ">

      <div class="tab-pane active" id="1">
      
        <ul class="list-group activity-list" style="margin-top: 20px">
          <?php foreach ($post as $key => $value): ?>
            
          <li class="list-group-item">
            <span class="pull-right text-muted small time-line">
              <?php   echo tgl_indo($value->tgl)."&nbsp&nbsp&nbsp"; ?><span class="glyphicon glyphicon-time timestamp" data-toggle="tooltip" data-placement="bottom" title="Lundi 24 Avril 2014 à 18h25"></span> 
            </span> 

            <i class="glyphicon glyphicon-pencil"></i>&nbsp&nbsp&nbsp<a class="judul" href="<?php echo base_url('issue/detail/').$value->issue_id ?>"><?= $value->judul; ?></a>
          </li>

          <?php endforeach ?>
        </ul>

     
      </div>

   <!--    ////////////////////////////////////////////////////////////////////////////// -->


      <div class="tab-pane" id="2">

        <ul class="list-group activity-list" style="margin-top: 20px">
          <?php foreach ($comment as $key => $value): ?>
            
            <li class="list-group-item">
              <i class="glyphicon glyphicon-comment"></i> 

              <span class="pull-right text-muted small time-line">
               <?php   echo tgl_indo($value->tgl)."&nbsp&nbsp&nbsp"; ?> <span class="glyphicon glyphicon-time timestamp" data-toggle="tooltip" data-placement="bottom" title="Lundi 24 Avril 2014 à 18h25"></span> 
              </span> 

              Komentar pada post <b><a class="judul" href="<?php echo base_url('issue/detail/').$value->issue_id ?>">"<?= $value->judul; ?>"</a></b> by : <span style="color: green"><?= $value->username ?></span>

            </li>

          <?php endforeach ?>
        </ul>

      </div>
     
    </div>
  </div>




  

 <!--  <div class="container tab-content" style="margin-top: 20px" id="post" >
    <div class="row">
      <div class="col-md-10">
        <ul class="list-group activity-list">
     
          <li class="list-group-item">
            <i class="glyphicon glyphicon-comment"></i> 

            <span class="pull-right text-muted small time-line">
              il y a 1 heure <span class="glyphicon glyphicon-time timestamp" data-toggle="tooltip" data-placement="bottom" title="Lundi 24 Avril 2014 à 18h25"></span> 
            </span> 

            Iterruption de service pour mise à jour

          </li>
        </ul>
      </div>
          <li class="list-group-item">

            <span class="pull-right text-muted small time-line">
              il y a 12 jours <span class="glyphicon glyphicon-time timestamp" data-toggle="tooltip" data-placement="bottom" title="Lundi 24 Avril 2014 à 18h25"></span> 
            </span> 

            <i class="glyphicon glyphicon-pencil"></i> <a href="#">Bobby</a> a créé son compte
          </li>

        </ul>
      </div>
    </div>
  </div> -->