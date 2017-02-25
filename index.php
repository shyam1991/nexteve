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
.banner{
  border:1px slow #fff;
  margin-top: -20px;
}
</style>




<div class="banner">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Carousel indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
            <li data-target="#myCarousel" data-slide-to="5"></li>
            <li data-target="#myCarousel" data-slide-to="6"></li>
            <li data-target="#myCarousel" data-slide-to="7"></li>
            <li data-target="#myCarousel" data-slide-to="8"></li>
            <li data-target="#myCarousel" data-slide-to="9"></li>
            <li data-target="#myCarousel" data-slide-to="10"></li>
        </ol>   
        <!-- Wrapper for carousel items -->
        <div class="carousel-inner">
            <?php 
                $con->next_result();
                $qry = $con->query("CALL SP_home_banners_list()");
                while($res = $qry->fetch_array()){
                    if($res['evposition'] == '1'){
                      $order = "active";
                    }else{
                      $order = "";
                    }
                echo '<div class="item '.$order.'">
                    <img src="'.$res['banner'].'" alt="First Slide" width="100%">
                </div>';  
                }
            ?>
        </div>
        <!-- Carousel controls -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</div>


<div class="first_page">
<section>
    <div class="" style="padding-left: 1%; padding-right: 1%;">
        <div class="row"> 
        <?php 
        $con->next_result();
        $query = $con->query("call SP_home_thumbnails();");
        while($res = $query->fetch_array()){
            echo '<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pad-25-tb">
                <div class="card">
                    <div class="card-image">
                        <img class="img-responsive" src="'.$res['thumimg'].'"></div>
                    
                    <div class="card-content">
                        <span class="card-title">'.$res['evname'].'</span><button type="button" id="'.$res['evid'].'" class="btn btn-custom pull-right" aria-label="Left Align">
                            <i class="fa fa-ellipsis-v"></i>
                        </button>
                    </div>
                    <div class="card-action">
                         <label></label>
                        <a href="#" class="text-center">'.$res['evcategory'].'</a>
                        <h6 class="text-hash"><i class="fa fa-calendar" aria-hidden="true"></i> '.$res['evdate'].'</h6><h1 class=""></h1>
                        <a href="events.php?event='.$res['evid'].'" class="btn btn-info btn-xs btn-block" style="color:#fff;">Learn More <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>                   
                    </div>
                    <div style="padding: 20px; position: absolute; background-color: #FFF; width: 100%; overflow-y: auto; left:0; bottom:0; height: 100%; z-index: 1; display: none;" id="'.$res['evid'].'cont">
                        ';



          ?>
          <script type="text/javascript">
                      $(function(){
                        $('#<?php echo $res[0];?>').on('click',function(){
                          $('#<?php echo $res[0]."cont"?>').slideToggle('slow');
                        });
                        $('#<?php echo $res['evid']."cont"?> .close').on('click',function(){
                          $('#<?php echo $res['evid']."cont"?>').slideToggle('slow');
                        });
                      });
                    </script>

              <?php 
                    echo'<span class="card-title">'.$res['evname'].'</span> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <p style="color: rgba(0, 0, 0, 0.71);margin:20px ;">'.$res['evdescp'].'</p>
                    </div><!-- card reveal -->
                    <div class="">
                    </div>
                </div>
            </div>';
        }
        ?>   

        </div>
    </div>
</section>
<section>
    <a href="search.php" class="col-md-12 btn-click-more" style="">- Click More -</a> 
</section>
</div>
<?php include_once('includes/footer.php');?>
 <script src="assets/js/index-script.js"></script>