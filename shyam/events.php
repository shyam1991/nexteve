<?php 
    require_once('includes/header.php');
    require_once('connection.php');
    require_once('functions.php');
    $event_id = $_GET['event'];
    global $link;
    $query = "SELECT 
    Fk_ai_int_eid AS eid,
    vchr_title AS event_title,
    LEFT(ltext_events_details, 100) AS event_details,
    vchr_org_name AS org_name,
    vchr_org_place AS event_place,
    vchr_org_city AS event_city,
    CONCAT(date_events_start_date,
            ' ',
            date_events_start_time,
            ' ',
            DATE_FORMAT(date_events_start_date, '%W'),
            ' to ',
            date_events_end_date,
            ' ',
            date_events_end_time,
            ' ',
            DATE_FORMAT(date_events_end_date, '%W')) AS event_time,
    CONCAT('data/event_images/', vchr_eimage_1) AS eimg1,
    CONCAT('data/event_images/', vchr_eimage_2) AS eimg2,
    CONCAT('data/event_images/', vchr_eimage_3) AS eimg3,
    CONCAT('data/event_images/', vchr_eimage_4) AS eimg4,
    CONCAT('data/event_images/', vchr_eimage_5) AS eimg5
FROM
    tb_event_titles ti
        LEFT JOIN
    tb_organiser_details od ON ti.Fk_ai_int_eid = od.Fk_int_orgid
        LEFT JOIN
    tb_event_images i ON ti.Fk_ai_int_eid = i.Fk_int_eid
        LEFT JOIN
    tb_event_details ed ON ti.Fk_ai_int_eid = ed.Fk_int_eid
        LEFT JOIN
    tb_events_timing tm ON ti.Fk_ai_int_eid = tm.Fk_int_eid
    WHERE `Fk_ai_int_eid` = '$event_id'";

      $result = mysqli_query($link,$query);
      $row = mysqli_fetch_assoc($result);
     //print_r($row);
    ?>
  
    <div class="container" style="margin-top:-25px;">
      <div class="jumbotron" style="background: url(https://rajkumar3010.files.wordpress.com/2016/03/cropped-rti-15-web-banner-background.gif);">
        <h2><?php echo $row['event_title']; ?></h2>
        <h4><?php echo $row['event_place'], $row['event_city']; ?></h4>
        <h5><a href="">Organiser Name</a></h5>
        <h5><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:04952724101">04952724101</a></h5>
        <h5><i class="fa fa-envelope-open" aria-hidden="true"></i> <a href="email:info@armcivf.com">info@armcivf.com</a></h5>
        <h5><i class="fa fa-globe" aria-hidden="true"></i> <a href="www.armcivf.com">www.armcivf.com</a></h5>
      </div>

      <div class="col-md-9" style="background: #ccc;">
        <div class="row">
          <div class="col-md-12">
            <h2>Details</h2>
            <h4>Event sub heading</h4>
            <p>About Event </p>
          </div>
        </div>
        <div class="col-md-12">
          <div class="col-md-2">
            <div class="image-responsive">
              <img  class="image-rounded" src="https://static.pexels.com/photos/5156/people-eiffel-tower-lights-night.jpg" width="100%;">
            </div>
          </div>
          <div class="col-md-2">
            <div class="image-responsive">
              <img  class="image-rounded" src="https://static.pexels.com/photos/5156/people-eiffel-tower-lights-night.jpg" width="100%;">
            </div>
          </div>
          <div class="col-md-2">
            <div class="image-responsive">
              <img  class="image-rounded" src="https://static.pexels.com/photos/5156/people-eiffel-tower-lights-night.jpg" width="100%;">
            </div>
          </div>
          <div class="col-md-2">
            <div class="image-responsive">
              <img  class="image-rounded" src="https://static.pexels.com/photos/5156/people-eiffel-tower-lights-night.jpg" width="100%;">
            </div>
          </div>
          <div class="col-md-2  ">
            <div class="image-responsive">
              <img  class="image-rounded" src="https://static.pexels.com/photos/5156/people-eiffel-tower-lights-night.jpg" width="100%;">
            </div>
          </div>
        </div>

        <div class="col-md-12 table-responsive">
          <table class="table table-borderd" style="background: #f9f9f9;">
            <h2 class="text-center">Ticket Charges</h2>
            <thead>
              <th>Slno</th>
              <th>Ticket Category </th>
              <th>Charge/Head</th>
              <th>Promocode</th>
              <th>Details</th>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Platinum</td>
                <td>150.00</td>
                <td><button class="btn btn-prmary btn-xs">#cdefc</button></td>
                <td>Balcony</td>
              </tr>
              <tr>
                <td>2</td>
                <td>Gold</td>
                <td>100.00</td>
                <td><button class="btn btn-prmary btn-xs">#cdefc</button></td>
                <td>Balcony</td>
              </tr>
              <tr>
                <td>1</td>
                <td>Silver</td>
                <td>50.00</td>
                <td><button class="btn btn-prmary btn-xs">#cdefc</button></td>
                <td>Balcony</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-md-3" style="background: #fafafa; padding: 5px;">
        <h4 class="text-center">Advertising Area</h4>
        <div class="col-md-4">
          <div class = "thumbnail">
            <img src = "http://innovativeprofessionaloffices.com/wp-content/uploads/2014/07/seo-for-small-business.jpg" alt = "Generic placeholder thumbnail">
          </div>
          <div class = "caption">
            <h6>Thumbna..</h6>
          </div>
        </div>
        <h4>dflsdjkflasdf</h4>
        <h5>dflsdjkflasdf</h5>
        <div class="col-md-12">
        </div>
      </div>
      
      
    </div>
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
