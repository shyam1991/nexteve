<?php
require_once('connection.php');


$link= $con;
function eventdisplay($event_id)
{
global $link;

// print_r($event_id);

$event_id = join("','",$event_id);   
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
    WHERE `Fk_ai_int_eid` IN ('$event_id')";
//  SELECT * FROM `tb_event_titles` LEFT JOIN `tb_organiser_details` ON tb_event_titles.Fk_ai_int_eid = tb_organiser_details.Fk_int_orgid WHERE `Fk_ai_int_eid` IN ('1001','1002','1003')


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
					$output.='<a href=events.php?event='.$row['eid'].'><div class="col-sm-4 col-md-3 col-lg-3 col-xs-12">
          <input type="hidden" value="'.$row['eid'].'" name="event"></input>
      <div class="thumbnail">
        <img src="'.$row['eimg1'].'" alt="Bootstrap Thumbnail: Beautiful Bootstrap Thumbnail like Material Design Cards">
        <div class="caption">
          <h5 class="ename1 text-navy text-center"><strong>'.$row['event_title'].'</strong></h5>
          <h6 class=" social-head text-center text-hash">'.$row['event_city'].'</h6>
          <h6 class="text-center text-hash"><i class="fa fa-calendar" aria-hidden="true"></i> 27<small>th</small> Jan 2017 -- 29<small>th</small> Jan 2017</h6>
        </div>
      </div>
    </div></a>';
						}

					$output.= '</div>
									</div>
								</div>';
					return $output;
				}


				


?>










