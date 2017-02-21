<?php include_once('includes/header.php');
      include_once('connection.php');
 ?>
<div class="container events-banner">
  <div class="row pad-1per">
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
      <div id="myCarousel" class="carousel slide">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="" contenteditable="false"></li>
          <li data-target="#myCarousel" data-slide-to="1" class="active" contenteditable="false"></li>
          <li data-target="#myCarousel" data-slide-to="2" class="" contenteditable="false"></li>
        </ol>
        <div class="carousel-inner">
        <?php 
        $con->next_result();
        $qry = $con->query("call SP_events_banners(1001)");
        while($res = $qry->fetch_array()){
          echo '<div class="item '.$res['imgorder'].'" style="">
          <img src=" '.$res['banner'].'" alt="" class="">
          <div class="carousel-caption">
              <h4 class="">'.$res['caption'].'</h4>
              <p class="">'.$res['caption1'].'</p>
            </div>
            </div>';
          }
        ?>
        </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
      </div>
    </div>
    <?php 
    $con->next_result();
    $qry = $con->query("call SP_eventsdetails(1001)");
    $res = $qry->fetch_array();
    echo'   <div class="col-md-4 hidden-sm hidden-xs events-banhead-right">
      <h3 class="ename1">'.$res['evname'].'</h3>
      <h4 class="small-head"><b>Venue</b></h4>
      <div class="address">
        <h5>'.$res['vplace'].'</h5>
        <h5>'.$res['vcity'].' , '.$res['locfname'].'</h5>
      </div>
      <hr>
      <h4 class="small-head" ><b>Date & Time</b></h4>
      <div class="address">
        <h5><i class="fa fa-calendar mar-1per" aria-hidden="true"></i> '.$res['sdate'].' - '.$res['edate'].'</h5>
        <h5><i class="fa fa-clock-o mar-1per" aria-hidden="true"></i>   '.$res['stime'].' -  '.$res['etime'].'</h5>
      </div>
    </div>';
    ?>
  </div>
</div>
<div class="container bg-white">
<div class="col-md-8  bg-white br-dot-1r">
<h2 class="sub-head">Ticket </h2>
<div class="table-responsive">
<table class="table table-bordered table-inverse bg-hash">
  <thead style="" class="table-head bg-tb-head1 text-white">
    <tr>
      <th>#</th>
      <th>Category</th>
      <th>Price (Rs)</th>
      <th width="75px;">Remarks</th>
    </tr>
  </thead>
  <tbody>
  <?php 
$con->next_result();
$qry = $con->query("call SP_event_ticket_charges(1001)");
while($res = $qry->fetch_array()){
  echo'<tr>
      <th scope="row">#</th>
      <td>'.$res['ttype'].'</td>
      <td>'.$res['tcharge'].'</td>
      <td>'.$res['tic_rem'].'</td>
    </tr>';
}
  ?>
  </tbody>
</table>
</div>
<div class="col-md-12">
<h3 class="small-head">Event Description</h3>
<div class="">
<?php 
$con->next_result();
    $qry = $con->query("call SP_eventsdetails(1001)");
    $res = $qry->fetch_array();
echo'<p>'.$res['evname'].'</p>';
?>
</div>
</div>
</div>
<div class="col-md-4 bg-white br-dot-1l">
<h2 class="social-head">Connect to People</h2>
<button class="btn" style="display: block; width: 100%; background: #00c1db; ">Invite Friends</button>
<hr>
<?php 
echo'<h3 class="small-head">Contact Info</h3>
<div class="address">
<h5> <i class="fa fa-user-circle" aria-hidden="true"></i> '.$res['orgcpname'].'</h5>
<h5> <i class="fa fa-phone-square" aria-hidden="true"></i> <a href="tel:'.$res['orgcpphone'].'" id="no-style"> '.$res['orgcpphone'].'</a></h5>
<h5> <i class="fa fa-envelope" aria-hidden="true"></i> <a href="" id="no-style">'.$res['orgcpemail'].'</a></h5>
<h4>Organised By '.$res['orgname'].'</h4>
</div>
<button class="btn btn-info btn-sm">Click More</button>';
?>
<hr>
<h3 class="small-head">How to reach Venue ?</h3>
<div class="address">
<?php 
echo '<h4><b>'.$res['vplace'].'</b></h4>';
?>
<div class="hidden-lg hidden-md visible-sm visible-xs">
<h5>Opp New Bus stand |Jafarkan Colony road</h5>
<h5>Kozhikode </h5>
</div>
</div>
<div class="map">
<iframe width="100%" frameborder="0" style="border:0"src="<?php echo $res['map']?>" allowfullscreen></iframe> 
</div>
<hr>
<div class="" style="">
<h4 class="text-center small-head">Related Events</h4>
<div class="rel-events-frame">
<img class="card-img-top" src="http://www.sgbizinsure.com/wp-content/uploads/2012/09/event-liability-insurance-image.png" alt="Card image cap" width="35%"> Happy New Year Event 2017
</div>
<div class="rel-events-frame">
<img class="card-img-top" src="http://www.sgbizinsure.com/wp-content/uploads/2012/09/event-liability-insurance-image.png" alt="Card image cap" width="35%"> Happy New Year Event 2017
</div>
</div>
<div class="col-md-12 col-md-offset-4">
  <a href="" class="btn btn-lg">Click More</a>
</div>
</div>
</div>
<div class="container comments-frame">
  <hr>
  <h3>Comments..!</h3>
  <div class="user-comment">
    <div class="media-left media-middle">
      <a href="#">
      <img class="media-object" src="https://www.arcadia.edu/sites/default/files/default-user.png" width="50px;" alt="...">
      </a>
    </div>
    <div class="media-body">
      <h4 class="media-heading">Middle aligned media</h4>
      Nice event ljsdflsjadfl;kjasdl;fkjasdfl;
      sdf;lkasfl;kasjdfas
      sdfasdkljfas'[df
      ]
    </div>
  </div>
  <div class="col-md-1 col-sm-2 col-xs-2" style="">
    <img class="media-object" src="https://www.arcadia.edu/sites/default/files/default-user.png" width="100%" alt="..." style="">
  </div>
  <div class="col-md-11 col-sm-10 col-xs-10">
    <textarea class="form-control"></textarea>
    <br>
    <button class=" pull-right btn btn-success">Post</button>
  </div>
</div>
<script type="text/javascript">jssor_1_slider_init();</script>
<?php include_once('includes/footer.php') ?>