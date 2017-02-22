<?php
require_once('connection.php');


$link= $con;
function eventdisplay($event_id)
{
global $link;

// print_r($event_id);

$event_id = join("','",$event_id);   
$query = "SELECT 
    ei.Fk_int_eid AS evid,
    CONCAT('data/event_images/thumbnail/', vchr_img) AS thumimg,
    vchr_title AS evname,
    CONCAT(vchr_event_category) AS evcategory,
    CONCAT(DATE_FORMAT(date_events_start_date, '%d %b %Y'),
            ' - ',
            DATE_FORMAT(date_events_end_date, '%d %b %Y')) AS evdate,
    SUBSTRING(`ltext_events_details`,
        1,
        100) AS evdescp
FROM
    db_nexteves_admin.tb_events_img ei
        LEFT JOIN
    tb_event_highlight_settings ehs ON ei.Fk_int_eid = ehs.Fk_int_eid
        LEFT JOIN
    tb_event_titles et ON ei.Fk_int_eid = et.Fk_ai_int_eid
        LEFT JOIN
    tb_events_timing evt ON ei.Fk_int_eid = evt.Fk_int_eid
        LEFT JOIN
    tb_event_details ed ON ei.Fk_int_eid = ed.Fk_int_eid
        LEFT JOIN
    tb_event_categories ec ON ed.int_event_categoryid = ec.Fk_int_ecid
WHERE
    chr_img_type = 'T'
        AND ei.chr_status = 'Y'
        AND ei.chr_status = 'Y'
        AND ei.Fk_int_eid IN ('$event_id')";

$result = mysqli_query($link,$query);
//print_r($result);die();

// if($result){
// $data=mysqli_fetch_row($result);



// //print_r($data);die();

// // print_r($data);die();
// }
// else
// {	pri
// 	echo "error";
// }


$output='<div class="container">
<div class="col-md-12">
  <div class="col-lg-2 col-md-2 hidden-sm hidden-xs" style="border-right: 1px solid #ccc; margin-left: -25px; width:225px;">
    <div class="btn-group full-width">
      <button type="button" class="btn btn-sm home full-width font-14"><i class="fa fa-home pull-left" aria-hidden="true"></i> HOME</button>
      <hr>
      <p class="font-14 text-hash text-uppercase">Category</p>
      <button class="btn btn-sm btn-category full-width pull-left"><i class="fa fa-camera-retro" aria-hidden="true"></i> Entertainment <span class="badge pull-right">10</span></button>
      <button class="btn btn-sm btn-category full-width pull-left"><i class="fa fa-camera-retro" aria-hidden="true"></i> Sports <span class="badge pull-right">10</span></button>
      <button class="btn btn-sm btn-category full-width"><i class="fa fa-camera-retro" aria-hidden="true"></i> Conferences <span class="badge pull-right">10</span></button>
      <button class="btn btn-sm btn-category full-width"><i class="fa fa-camera-retro" aria-hidden="true"></i> Inagurations <span class="badge pull-right">10</span></button>
      <button class="btn btn-sm btn-category full-width"><i class="fa fa-camera-retro" aria-hidden="true"></i> Offers Zone <span class="badge pull-right">10</span></button>
      <hr>
    </div>
  </div>
  <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">	';
				while($row = mysqli_fetch_assoc($result)){	
          //print_r($row);
					$output.='<form action="test.php" id="event" method="post"> 
          <a href="javascript: submitForm();">
          <input type="hidden" value="'.$row['evid'].'" name="event"></input>
          <div class="col-sm-4 col-md-3 col-lg-3 col-xs-12">
            <div class="thumbnail">
              <img src="'.$row['thumimg'].'" alt="Error load image">
              <div class="caption">
          <h5 class="ename1 text-navy text-center"><strong>'.$row['evname'].'</strong></h5>
          <h6 class=" social-head text-center text-hash">'.$row['evcategory'].'</h6>
          <h6 class="text-center text-hash"><i class="fa fa-calendar" aria-hidden="true"></i> '.$row['evdate'].'</h6><h1 class="text-center"></h1>
        </div>
        </div>
    </div>   
      </a></form>';
						}

					$output.= '</div>
									</div>
								</div>';
					return $output;
				}

?>
				<script>
function submitForm(){
    $('#event').submit();
}
</script>













