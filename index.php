<?php 
include_once('includes/header.php');
include_once('connection.php');
?>
<link rel="stylesheet" href="assets/css/main-styles.css">
<link rel="stylesheet" href="assets/css/boxes.css">
<style type="text/css">
  section{
   padding-top : 25px;
   padding-bottom : 25px;
}
.pad-25-tb{
  padding-top: 25px;
  padding-bottom: 25px;
}
</style>
<div class="eventlist"></div>
<!-- div for search files -->
<div class="first_page">
   <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
         <div class="item active">
            <img src="data/event_images/1001_new_year_image1.jpg" class="full-width-slider">
            <div class="carousel-caption">
               <h1 class="banner-caption">ARMC NEW YEARE PARTY AT KOZHIKODE </h1>
               <p>16-01-2017 Monday</p>
            </div>
         </div>
         <!-- End Item -->
         <div class="item">
            <img src="data/event_images/1002_new-year_image1.jpg" class="full-width-slider">
            <div class="carousel-caption">
               <h1 class="banner-caption">FIRE LIGHT WITH DINNER PARTY</h1>
               <p>16-01-2017 Monday</p>
            </div>
         </div>
         <!-- End Item -->
         <div class="item">
            <img src="data/event_images/1003_new-year_image1.jpg" class="full-width-slider">
            <div class="carousel-caption">
               <h1 class="banner-caption">DJ PARTY AT KOZHIKODE </h1>
               <p>16-01-2017 Monday</p>
            </div>
         </div>
         <!-- End Item -->
         <div class="item">
            <img src="data/event_images/1004_confernece_image1.jpg" class="full-width-slider">
            <div class="carousel-caption">
               <h1 class="banner-caption">Facebook Annual Conference</h1>
               <p>16-01-2017 Monday</p>
            </div>
         </div>
         <!-- End Item -->
      </div>
      <!-- End Carousel Inner -->
      <ul class="nav nav-pills nav-justified">
         <li data-target="#myCarousel" data-slide-to="0" class="active"><a href="#">New Year Party<small>Le merdian Hotel Kochi</small></a></li>
         <li data-target="#myCarousel" data-slide-to="1"><a href="#">Fire Light With Dinner Party<small>Hi Lite Mall Kozhikode</small></a></li>
         <li data-target="#myCarousel" data-slide-to="2"><a href="#">DJ Party Ar Kozhikode<small>Lulu Mall Kochi</small></a></li>
         <li data-target="#myCarousel" data-slide-to="3"><a href="#">Facebook Conference<small>Marriot Hotel at kochi</small></a></li>
      </ul>
   </div>
   <!-- End Carousel -->
<section>
    <?php 
    $con->next_result();
    $query = $con->query("call SP_events_highlightsid_limited(11,2)");
    while($res = $query->fetch_array()){
       //print_r($res); die();
      ?>

          <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pad-25-tb">
            <div class="card">
                <div class="card-image">
                    <img class="img-responsive" src="data/home-img/6x4/car_show1.jpg">
                    
                </div><!-- card image -->
                
                <div class="card-content">
                    <span class="card-title">Car Show 2017</span>                    
                    <button type="button" id="<?php echo $res[0]."show"?>" class="btn btn-custom pull-right" aria-label="Left Align">
                        <i class="fa fa-ellipsis-v"></i>
                    </button>
                </div><!-- card content -->
                <div class="card-action">
                     <label></label>
                    <a href="#" target="new_blank">Beach Road Kozhikode</a>
                    <h4>01/01/17 - 22/01/17 <small>(10:00 Am to 05:00 PM)</small></h4>
                    <a href="events.php?event=<?php $res[0] ?>" class="btn btn-info btn-block" style="color:#fff;">Learn More <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>                   
                </div><!-- card actions -->
                <div style="padding: 20px; position: absolute; background-color: #FFF; width: 100%; overflow-y: auto; left:0; bottom:0; height: 100%; z-index: 1; display: none;" id="<?php echo $res[0]."cont"?>">

                <script type="text/javascript">
                  $(function(){
                    $('#<?php echo $res[0]."show"?>').on('click',function(){
                      $('#<?php echo $res[0]."cont"?>').slideToggle('slow');
                    });
                    $('#<?php echo $res[0]."cont"?> .close').on('click',function(){
                      $('#<?php echo $res[0]."cont"?>').slideToggle('slow');
                    });
                  });
                </script>

                <span class="card-title">Car Show</span> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <p style="color: rgba(0, 0, 0, 0.71);margin:20px ;">Something about event</p>
                </div><!-- card reveal -->
                <div class="">
                </div>
            </div>
        </div>

      <?php
    }
    ?>   
</section>

<section class="container">
 <button class="col-md-12 btn btn-default">MORE</button> 
</section>
</div>
<?php include_once('includes/footer.php');?>
 <script src="assets/js/index-script.js"></script>