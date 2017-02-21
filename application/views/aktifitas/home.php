<script src="<?php echo base_url('assets/') ?>list.min.js"></script>
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

        <div id="post-list" style="margin-top: 20px">

          <input type="text" class="search form-control pull-right" style="height: 35px;width: 300px"  />

          <span class="input-group-btn pull-right" style="margin-right: 27px">
            <button class="btn btn-default btn-sm" ><i class="glyphicon glyphicon-search"></i></button>
          </span>
          <div class="clearfix"></div>
          
            <ul class="list-group activity-list list" style="margin-top: 20px">
              <?php foreach ($post as $key => $value): ?>
                
              <li class="list-group-item" id="post" >
                <span class="pull-right text-muted small time-line">
                  <?php   echo tgl_indo($value->tgl)."&nbsp&nbsp&nbsp"; ?><span class="glyphicon glyphicon-time timestamp" data-toggle="tooltip" data-placement="bottom" title="Lundi 24 Avril 2014 à 18h25"></span> 
                </span> 

                <i class="glyphicon glyphicon-pencil"></i>&nbsp&nbsp&nbsp<a class="judul" href="<?php echo base_url('issue/detail/').$value->issue_id ?>"><span class="name"><?= $value->judul; ?></span></a>
              </li>

              <?php endforeach ?>
            </ul>

            <ul class="pagination pull-right pagination-sm"></ul>
          </div>     
      </div>

   <!--    ////////////////////////////////////////////////////////////////////////////// -->


      <div class="tab-pane" id="2">
        <div id="comment-list" style="margin-top: 20px">

        <input type="text" class="search form-control pull-right" style="height: 35px;width: 300px"  />

          <span class="input-group-btn pull-right" style="margin-right: 27px">
            <button class="btn btn-default btn-sm" ><i class="glyphicon glyphicon-search"></i></button>
          </span>
          <div class="clearfix"></div>


        <ul class="list-group activity-list list" style="margin-top: 20px">
          <?php foreach ($comment as $key => $value): ?>
            
            <li class="list-group-item">
              <i class="glyphicon glyphicon-comment"></i> 

              <span class="pull-right text-muted small time-line">
               <?php   echo tgl_indo($value->tgl)."&nbsp&nbsp&nbsp"; ?> <span class="glyphicon glyphicon-time timestamp" data-toggle="tooltip" data-placement="bottom" title="Lundi 24 Avril 2014 à 18h25"></span> 
              </span> 

              Komentar pada post<span class="komen"><b><a class="judul" href="<?php echo base_url('issue/detail/').$value->issue_id ?>">"<?= $value->judul; ?>"</a></b></span> by : <span style="color: green"><?= $value->username ?></span>

            </li>

          <?php endforeach ?>
        </ul>
        <ul class="pagination pull-right pagination-sm"></ul>
          </div> 

      </div>
     
    </div>
  </div>

<script type="text/javascript">
var monkeyList = new List('post-list', {
  valueNames: ['name'],
  page: 7,
  pagination: true
});

var commentList = new List('comment-list', {
  valueNames: ['komen'],
  page: 7,
  pagination: true
});
 

</script>




