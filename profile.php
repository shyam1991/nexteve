<?php
  include_once('includes/header.php');
  include_once('connection.php');
  $con->next_result();
  $query = $con->query("CALL SP_organisation_details(1001)");
  $res = $query->fetch_array();
  ?>
<style type="text/css">
  .container{
  }
  .wrapper{
  }
  #header{
  border:1px solid #ddd;
  margin-bottom:20px;
  }
  .navbar{
  border-radius:0;
  margin-bottom:0;
  border:none;
  font-family: 'Open Sans Condensed', sans-serif, 
  sans-serif;
  } 
  .navbar-brand1{
  width:160px;
  height:160px;
  float:left;
  padding:0;
  margin-top:-130px;
  overflow:hidden;
  border:3px solid #eee;
  margin-left:15px;
  background:#333;
  text-align:center;
  line-height:160px;
  color:#fff !important;
  font-size:2em;
  -webkit-transition:  all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  -o-transition:  all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out ;
  }
  .site-name{
  color:#000;
  font-size: 42px;
  float:left;
  margin-top:-65px !important;
  margin-left:15px;
 } 
  .site-description{
  color:#fff;
  font-size:1.3em;
  float:left;
  margin-top:-30px !important;
  margin-left:15px;
  }
  .main-menu{
  position:absolute;
  left:190px;
  }
  .slider, .carousel{
  max-height:360px;
  overflow:hidden;
  }
  .carousel-control .fa-angle-left,
  .carousel-control .fa-angle-right {
  position: absolute;
  top: 50%;
  font-size:2em;
  z-index: 5;
  display: inline-block;
  }
  .carousel-control{
  background-color:transparent;
  background-image:none !important;
  }
  .carousel-control:hover,
  .carousel-control:focus {
  color: #fff;
  text-decoration: none;
  background-color:transparent !important;
  background-image:none !important;
  outline: 0;
  }
  @media (max-width: 768px) {
  .navbar-brand1{
  max-width: 100px;
  max-height:100px;
  float:left;
  margin-top:-65px;
  margin-left:15px;
  -webkit-transition:  all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  -o-transition:  all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out ;
  }
  .navbar{
  border-radius:0;
  margin-bottom:0;
  border:none;
  }
  .main-menu{
  left:0;
  position:relative;
  }
  }
  @media (max-width: 490px) {
  .site-name{
  color:#fff;
  font-size:1.5em;
  float:left;
  line-height:20px;
  margin-top:-100px !important;
  margin-left:125px;
  } 
  .site-description{
  color:#fff;
  font-size:1.3em;
  float:left;
  margin-top:-80px !important;
  margin-left:125px;
  }
    .site-name{
      font-size: 14px;
    }
  }
</style>
<div class="wrapper">
  <div class="container">
    <div class="row">
      <div class="">
        <header id="header">
          <div class="slider">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <img src="<?php echo $res['banner']?>" width="100%">
                </div>
              </div>
            </div>
          </div>
          <!--slider-->
          <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <a class="navbar-brand1" href="#"><img class="img-responsive" src="<?php echo $res['logo']?>"></a>
              <span class="sub-head site-name"><?php echo $res['orgname']?></span>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="mainNav" >
              <ul class="nav main-menu navbar-nav">
                <li><a href="<?php echo $res['website']?>"><i class="fa fa-globe"></i> <?php echo substr($res['website'], 7) ?></a></li>
              </ul>
              <ul class="nav  navbar-nav navbar-right">
                <li><a href="<?php echo $res['fb']?>"><i class="fa fa-facebook"></i></a></li>
                <li><a href="<?php echo $res['twitter']?>"><i class="fa fa-twitter"></i></a></li>
                <li><a href="<?php echo $res['gplus']?>"><i class="fa fa-google-plus"></i></a></li>
              </ul>
            </div>
            <!-- /.navbar-collapse -->
          </nav>
        </header>
      </div>
    </div>
  </div>
</div>
<!--/#HEADER-->
<div class="container">
  <div class="row" style="background: #fff;">
    <div class="col-lg-4 col-md-4 col-sm-12" style="background:#6d6a64;">
      <div class="address">
      <h3 class="text-white"><?php echo $res['orgname']?></h3>
      <h4 class="text-white"><?php echo $res['place']?> | <?php echo $res['city']?></h4>
      <h4 class="text-white"><?php echo $res['location']?></h4>
      <h5 class="text-white"><i class="fa fa-phone" aria-hidden="true"></i><a href="" class="text-white"> <?php echo $res['phone1']?> </a> |  <a href="" class="text-white"><?php echo $res['phone2']?></a></h5>
      <h5 class="text-white"><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="" class="text-white"><?php echo $res['pemail1']?></a><br></h5>
      <h5 class="text-white">
      <i class="fa fa-globe" aria-hidden="true"></i> <a href="" class="text-white"><?php echo $res['website']?></a>
      </div>
      <hr>
      <div style="max-height: 200px; overflow-x: hidden;overflow-y: auto;">
        <iframe width="100%" frameborder="0" style="border:0"
          src="<?php echo $res['map']?>" allowfullscreen></iframe>
      </div>
      <hr>
      <h4 class="text-center" style="color: #fff;">Previous Events</h4>
      <div class="" style="width: 100%; padding:1%; background: #616263;">
        <img src="http://technext.github.io/Evento/images/demo/bg-slide-01.jpg" width="32.5%;" style="border:2px solid #fff; cursor: pointer;" data-toggle="tooltip" data-placement="top" title="New Year Celibration">
        <img src="http://technext.github.io/Evento/images/demo/bg-slide-01.jpg" width="32.5%;" style="border:2px solid #fff; cursor: pointer;" data-toggle="tooltip" data-placement="top" title="New Year Celibration">
        <img src="http://technext.github.io/Evento/images/demo/bg-slide-01.jpg" width="32.5%;" style="border:2px solid #fff; cursor: pointer;" data-toggle="tooltip" data-placement="top" title="New Year Celibration">
      </div>
    </div>
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" style="border:1px solid #ccc; padding: 2%; max-height: 550px; overflow-y:auto; overflow-x: hidden; ">
      <h3>About US</h3>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12" style="max-height: 150px; overflow-y:auto; overflow-x: hidden;">
          <p><?php echo $res['about']?></p>
        </div>
      </div>
      <hr>
      <h3>Upcoming Events</h3>
      <br>
      <?php 
      $con->next_result();
      $query = $con->query("CALL SP_organiser_upcoming_events(1001)");
      while($res = $query->fetch_array()){
        ?>
     <a href="#">
        <div class="container sresult_box ">
          <div class="col-md-4 col-xs-12">
            <img src="<?php echo $res['eimg2'];?>" class="zoom-img-4" width="100%" >
          </div>
          <div class="col-md-8 col-xs-12">
            <h4><b><?php echo $res['event_title'];?></b></h4>
            <h6><?php echo $res['event_details'];?></h6>
            <p><i class="fa fa-map-marker" aria-hidden="true"></i>
      <a href=""><?php echo $res['event_place'];?></a> | <a href=""><?php echo $res['event_city'];?></a>
      </p>
      <p style="color:#9f9fa0;"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $res['event_time'];?>
      </p>
      </div>
      </div>
      </a>
        <?php
      }
      ?>
      </div>
      </div>
      </a>
    </div>
  </div>
</div>
<?php
  include_once('includes/footer.php');
  ?>
<script type="text/javascript">
  $(document).ready( function() {
  $('#myCarousel').carousel({
  interval:   4000
  });
  var clickEvent = false;
  $('#myCarousel').on('click', '.nav a', function() {
  clickEvent = true;
  $('.nav li').removeClass('active');
  $(this).parent().addClass('active');
  }).on('slid.bs.carousel', function(e) {
  if(!clickEvent) {
  var count = $('.nav').children().length -1;
  var current = $('.nav li.active');
  current.removeClass('active').next().addClass('active');
  var id = parseInt(current.data('slide-to'));
  if(count == id) {
  $('.nav li').first().addClass('active');
  }
  }
  clickEvent = false;
  });
  });
</script>
</body>
</html>